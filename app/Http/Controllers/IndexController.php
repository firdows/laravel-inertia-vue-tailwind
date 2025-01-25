<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $countPerson = User::count();
        $countListing = Listing::count();


        return inertia('Index/Index', [
            'message' => 'Index',
            'countPerson' => $countPerson,
            'countListing' => $countListing,
        ]);
    }

    public function show()
    {
        return inertia('Index/Index', [
            'message' => 'Show',
        ]);
    }
}
