<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingOfferController extends Controller
{
    public function store(Request $request, Listing $listing)
    {
        // dd($request);
        $fields = $request->validate([
            'amount' => 'required|integer|min:1|max:20000000'
        ]);

        $listing->offers()->save(
            Offer::make($fields)
                ->bidder()
                ->associate($request->user())
        );

        return redirect()->back()->with('success', 'Offer as made!');
    }
}
