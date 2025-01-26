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
                ->paginate(10)->withQueryString()
        ]);
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
}
