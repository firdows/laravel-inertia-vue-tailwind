<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ListingOfferController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\NotificationSeenController;
use App\Http\Controllers\RealtorListingAcceptOfferController;
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

/** Listing */
Route::resource('listing', ListingController::class)->only(['index', 'show']);

Route::middleware('auth')->group(function () {


    /** Realtor */
    Route::prefix('realtor')->name('realtor.')->group(function () {
        Route::name('listing.restore')
            ->put(
                'listing/{listing}/restore',
                [RealtorListingController::class, 'restore']
            )->withTrashed();

        Route::resource('listing', RealtorListingController::class)
            // ->only(['index', 'destroy', 'edit', 'update', 'create', 'store'])
            ->withTrashed();

        Route::resource('listing.image', RealtorListingImageController::class)
            ->only(['create', 'store', 'destroy']);

        Route::name('offer.accept')
            ->put(
                'offer/{offer}/accept',
                RealtorListingAcceptOfferController::class
            );
    });

    /** Offer */
    Route::resource('listing.offer', ListingOfferController::class)->only(['store']);


    /** Notification */
    Route::resource('notification', NotificationController::class)->only(['index']);
    Route::put(
        'notification/{notification}/seen',
        NotificationSeenController::class
    )->name('notification.seen');



    /** Logut */
    Route::delete('logout', [AuthController::class, 'detroy'])->name("logout");
});

Route::get('test/multicomponent', function () {
    return inertia("Test/MultiComponent");
})->name('test.multicomponent');
