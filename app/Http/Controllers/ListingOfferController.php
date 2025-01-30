<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Offer;
use App\Notifications\OfferMade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingOfferController extends Controller
{
    public function store(Request $request, Listing $listing)
    {
        // $this->authorize('view', $listing);
        // dd($request);
        $fields = $request->validate([
            'amount' => 'required|integer|min:1|max:20000000'
        ]);

        $offer = $listing->offers()->save(
            Offer::make($fields)
                ->bidder()
                ->associate($request->user())
        );

        /** Send Notifi*/
        $listing->owner->notify(
            new OfferMade($offer)
        );

        return redirect()->back()->with('success', 'Offer as made!');
    }
}
