<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpotifyController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// spotify routes
Route::get('/connect-spotify', [SpotifyController::class, 'redirectToSpotify'])->middleware(['auth']);
Route::get('/spotify/callback', [SpotifyController::class, 'handleSpotifyCallback'])->middleware(['auth']);
Route::get('/top-tracks', [SpotifyController::class, 'getTopTracks'])->middleware(['auth']);

require __DIR__.'/auth.php';
