<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DogController;
use App\Http\Controllers\WalkSessionController;
use App\Http\Controllers\WalkerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/walker', function () {

    $walkers = \App\Models\User::where('role', 'walker')
        ->get();

    return view('walker.index', compact('walkers'));
});

Route::get('/walker/dashboard', function () {

    $walks = auth()->user()
        ->walkingSessions()
        ->with('dog', 'owner')
        ->get();

    return view(
        'walker.dashboard',
        compact('walks')
    );
});

Route::middleware('auth')->group(function () {
    Route::get('/walker/dashboard', [WalkerController::class, 'dashboard'])->name('walker.dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('dogs', DogController::class);
    Route::resource('walk-sessions', WalkSessionController::class);
    Route::patch('/walk-sessions/{walkSession}/accept', [WalkerController::class, 'accept'])->name('walk-sessions.accept');
});

Route::get('/about',function() {
    return view('about');
})->name('about');


require __DIR__.'/auth.php';
