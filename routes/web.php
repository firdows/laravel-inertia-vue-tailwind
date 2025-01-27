<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\RealtorListingController;
use App\Http\Controllers\RealtorListingImageController;
use App\Http\Controllers\UserAccountController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return inertia('Index/Index');
// });

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/hello', [IndexController::class, 'show']);

Route::middleware('guest')->group(function () {
    /** Login */
    Route::get('login', [AuthController::class, 'create'])->name("login");
    Route::post('login', [AuthController::class, 'store'])->name("login.store");

    /** Register */
    Route::get('register', [UserAccountController::class, 'create'])->name("user-account.create");
    Route::post('store', [UserAccountController::class, 'store'])->name("user-account.store");
});

Route::middleware('auth')->group(function () {
    /** Listing */
    Route::resource('listing', ListingController::class)->except(['destroy']);
    // ->only(['index', 'show', 'create', 'store','edit','update'])

    /** Realtor */
    Route::prefix('realtor')->name('realtor.')->group(function () {
        Route::name('listing.restore')
            ->put(
                'listing/{listing}/restore',
                [RealtorListingController::class, 'restore']
            )->withTrashed();
            
        Route::resource('listing', RealtorListingController::class)
            ->only(['index', 'destroy', 'edit', 'update', 'create', 'store'])
            ->withTrashed();

        Route::resource('listing.image',RealtorListingImageController::class)
            ->only(['create','store']);
    });



    /** Logut */
    Route::delete('logout', [AuthController::class, 'detroy'])->name("logout");
});
