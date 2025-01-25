<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\RealtorListingController;
use App\Http\Controllers\UserAccountController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return inertia('Index/Index');
// });

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/hello', [IndexController::class, 'show']);

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'create'])->name("login");
    Route::post('login', [AuthController::class, 'store'])->name("login.store");


    Route::get('register', [UserAccountController::class, 'create'])->name("user-account.create");
    Route::post('store', [UserAccountController::class, 'store'])->name("user-account.store");
});

Route::middleware('auth')->group(function () {
    
    /** Listing */
    Route::resource('listing', ListingController::class); 
    // ->only(['index', 'show', 'create', 'store','edit','update'])
    // ->except(['destroy']);   

    /** Realtor */
    Route::prefix('realtor')->name('realtor.')->group(function(){
        Route::resource('listing',RealtorListingController::class);
    });


    /** Logut */
    Route::delete('logout', [AuthController::class, 'detroy'])->name("logout");
});



