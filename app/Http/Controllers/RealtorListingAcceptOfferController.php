<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class RealtorListingAcceptOfferController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Offer $offer)
    {
        # Reset All
        $offer->listing->offers()->update(['accepted_at' => null, 'rejected_at' => null]);

        // Appect selected offer
        $offer->update(['accepted_at' => now()]);

        // Update sold
        $offer->listing->sold_at = now();
        $offer->listing->save();

        // Reject all other offers
        $offer->listing->offers()->except($offer)->update(['rejected_at' => now()]);

        return redirect()->back()
            ->with(
                'success',
                "Offer #{$offer->id} accepted, other offers rejected"
            );
    }
}
