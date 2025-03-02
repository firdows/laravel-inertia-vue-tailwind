<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RealtorListingController extends Controller
{
    public function index(Request $request)
    {

        $filters = [
            // 'is_draft' => $request->boolean('is_draft'),
            'is_deleted' => $request->boolean('is_deleted'),
            ...$request->only(['by','order'])
        ];
        
        return inertia("Realtor/Index", [
            'filters'=>$filters,
            'listings' => Auth::user()
                ->listings()
                // ->mostRecent()
                ->filters($filters)
                ->withCount('images')
                ->withCount('offers')
                ->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->authorize('create', Listing::class);
        return inertia('Realtor/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user()->listings()->create(
            $request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:20',
                'area' => 'required|integer|min:15|max:1500',
                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_nr' => 'required|min:1|max:1000',
                'price' => 'required|integer|min:1|max:20000000',
            ])
        );

        return redirect()->route('realtor.listing.index')
            ->with('success', 'Listing was created!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {      
    
        // $offers = $listing->offers()->get();
        return inertia(
            'Realtor/Show',
            [
                'listing' => $listing,
                'offers' => $listing->load(['offers','offers.bidder','images'])
            ]
        );
    }

    public function edit(Listing $listing)
    {
        return inertia(
            'Realtor/Edit',
            [
                'listing' => $listing
            ]
        );
    }

    public function update(Request $request, Listing $listing)
    {
        $listing->update(
            $request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:20',
                'area' => 'required|integer|min:15|max:1500',
                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_nr' => 'required|min:1|max:1000',
                'price' => 'required|integer|min:1|max:20000000',
            ])
        );

        return redirect()->route('realtor.listing.index')
            ->with('success', 'Listing was changed!');
    }
    


    public function destroy(Listing $listing)
    {

        // $listing->user()->
        // if (!Gate::allows('delete', $listing)) {
        //     abort(403);
        // }

        // if (!Auth::user()->can('delete', $listing)) {
        //     abort(403);
        // }

        $listing->deleteOrFail();



        return redirect()->back()->with("success", "Listing was deteted!");
    }

    public function restore(Listing $listing)
    {       

        $listing->restore();
        
        return redirect()->back()->with("success", "Listing was restore!");
    }
}
