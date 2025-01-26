<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RealtorListingController extends Controller
{
    public function index(){
        return inertia("Realtor/Index",[
            'listings'=> Auth::user()->listings()->paginate()
        ]);
    }


    public function destroy(Listing $listing){

        if (Auth::user()->can('delete', $listing)) {
            abort(403);
        }

        $listing->deleteOrFail();
       

        
        return redirect()->back()->with("success","Listing was deteted!");

    }
}
