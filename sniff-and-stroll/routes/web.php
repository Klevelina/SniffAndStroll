<?php

use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DogController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WalkSessionController;
use App\Http\Controllers\WalkerController;
use App\Http\Controllers\OwnerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact',function() {
    return view('contact');
})->name('contact');

Route::get('/language/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'lv'])) {
        Session::put('locale', $locale);
    }

    return Redirect::back();
})->name('language.switch');


/*
|--------------------------------------------------------------------------
| Admin Dashboard
|--------------------------------------------------------------------------
*/
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::prefix('admin')
    ->middleware(['auth', 'role:admin'])
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index']);

        Route::get('/users', [AdminUserController::class, 'index']);
        Route::delete('/users/{user}', [AdminUserController::class, 'destroy']);

        Route::get('/walks', [AdminWalkController::class, 'index']);
        Route::patch('/walks/{walkSession}/status', [AdminWalkController::class, 'updateStatus']);
    });
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

Route::get('/walkers', [WalkerController::class, 'index'])
    ->middleware(['auth', 'role:owner'])
    ->name('walker.index');

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

    //Availability
    Route::resource('availabilities', AvailabilityController::class);

    // Reviews
    Route::resource('reviews', ReviewController::class)->only(['store', 'index', 'destroy']);
});



/*
|--------------------------------------------------------------------------
| Auth routes (Breeze)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';

