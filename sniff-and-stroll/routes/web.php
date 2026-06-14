<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DogController;
use App\Http\Controllers\WalkSessionController;
use App\Http\Controllers\WalkerController;
use App\Http\Controllers\OwnerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact',function() {
    return view('contact');
})->name('contact');

/*
|--------------------------------------------------------------------------
| Admin Dashboard
|--------------------------------------------------------------------------
*/
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

/*
|--------------------------------------------------------------------------
| Owner Dashboard
|--------------------------------------------------------------------------
*/
Route::get('/owner/dashboard', [OwnerController::class, 'dashboard'])
    ->middleware(['auth', 'role:owner,admin'])
    ->name('owner.dashboard');

/*
|--------------------------------------------------------------------------
| Walker Dashboard
|--------------------------------------------------------------------------
*/
Route::get('/walker/dashboard', [WalkerController::class, 'dashboard'])
    ->middleware(['auth', 'role:walker,admin'])
    ->name('walker.dashboard');

/*
|--------------------------------------------------------------------------
| Walker Listing (public page)
|--------------------------------------------------------------------------
*/
Route::get('/walker', function () {

    $walkers = \App\Models\User::where('role', 'walker')->get();

    return view('walker.index', compact('walkers'));
});

/*
|--------------------------------------------------------------------------
| Authenticated routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dogs
    Route::resource('dogs', DogController::class);

    // Walk sessions
    Route::resource('walk-sessions', WalkSessionController::class);

    // Walker actions
    Route::patch('/walk-sessions/{walkSession}/accept', [WalkerController::class, 'accept'])->name('walk-sessions.accept');
    Route::patch('/walk-sessions/{walkSession}/start', [WalkerController::class, 'start'])->name('walk-sessions.start');
    Route::patch('/walk-sessions/{walkSession}/complete', [WalkerController::class, 'complete'])->name('walk-sessions.complete');
    Route::patch('/walk-sessions/{walkSession}/decline', [WalkerController::class, 'decline'])->name('walk-sessions.decline');

});

/*
|--------------------------------------------------------------------------
| Auth routes (Breeze)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
