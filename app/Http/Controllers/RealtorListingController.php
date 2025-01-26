<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RealtorListingController extends Controller
{
    public function index(Request $request){

        $query = Auth::user()->listings();
        $query->when($request->is_draft,function($q){
            // $q->where('det')
        });
        $query->when($request->is_deleted,function($q){
             $q->withTrashed();
        });
        
        return inertia("Realtor/Index",[
            'listings'=> $query->paginate()
        ]);
    }


    public function destroy(Listing $listing){

        // $listing->user()->
        // if (!Gate::allows('delete', $listing)) {
        //     abort(403);
        // }

        // if (!Auth::user()->can('delete', $listing)) {
        //     abort(403);
        // }

        $listing->deleteOrFail();
       

        
        return redirect()->back()->with("success","Listing was deteted!");

    }
}
