<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    // public function __construct()
    // {
    //     $this->authorizeResource(Listing::class, 'listing');
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia("Listing/Index", [
            "listings" => Listing::orderByDesc('created_at')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia('Listing/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /** 1. */
        // $fiels = $request->validate([
        //     'beds' => "required|integer|min:0|max:20",
        //     'baths' => "required|integer|min:0|max:20",
        //     'area' => ["required"],
        //     'city' => ["required"],
        //     'code' => ["required"],
        //     'street' => ["required"],
        //     'street_nr' => ["required"],
        //     'price' => ["required"],
        // ]);
        // $model = new Listing($fiels);
        // $model->save();

        /** 2 */
        $fiels = $request->validate([
            'beds' => "required|integer|min:0|max:20",
            'baths' => "required|integer|min:0|max:20",
            'area' => ["required"],
            'city' => ["required"],
            'code' => ["required"],
            'street' => ["required"],
            'street_nr' => ["required"],
            'price' => ["required"],
        ]);
        $request->user()->listings()->create($fiels);


        return redirect()->route('listing.index')->with("success", "Listing was created!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        /** 1. Use policy */
        if(Auth::user()->can('view',$listing)){
            abort(403);
        }

        /** 2. authorize */
        // $this->authorize('view',$listing);

        /** 3. research */
        // if ($listing->owner->can('view', $listing)) {
        //     abort(403);
        // }


        return inertia(
            'Listing/Show',
            [
                'listing' => $listing
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        if(Auth::user()->can('before',$listing)){
            abort(403);
        }

        return inertia(
            'Listing/Edit',
            [
                'listing' => $listing
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        $fiels = $request->validate([
            'beds' => "required|integer|min:0|max:20",
            'baths' => "required|integer|min:0|max:20",
            'area' => ["required"],
            'city' => ["required"],
            'code' => ["required"],
            'street' => ["required"],
            'street_nr' => ["required"],
            'price' => ["required"],
            //  'area', 'city', 'code', 'street', 'street_nr', 'price'
        ]);

        $listing->update($fiels);

        return redirect()->route('listing.show', $listing)->with("success", "Listing was updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        $listing->delete();
        return redirect()->back()->with("success", "Listing was deleted!");
    }
}
