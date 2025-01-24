<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return inertia('Index/Index');
// });

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/hello', [IndexController::class, 'show']);

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'create'])->name("login");
    Route::post('login', [AuthController::class, 'store'])->name("login.store");
});

Route::middleware('auth')->group(function () {
    
    /** Listing */
    Route::resource('listing', ListingController::class); 
    // ->only(['index', 'show', 'create', 'store','edit','update'])
    // ->except(['destroy']);   


    Route::delete('logout', [AuthController::class, 'detroy'])->name("logout");
});



