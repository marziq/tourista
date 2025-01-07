<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\AttractionController;

Route::get('/', function () {
    return view('mainpage');
});

Route::get('/about', function () {
    return view('about');
});

// Flight booking routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Add flight routes here
    Route::get('/flights', [FlightController::class, 'index'])->name('flights.index'); // Search & display available flights
    Route::post('/flights', [FlightController::class, 'store'])->name('flights.store'); // Book a flight
    Route::get('/flights/{id}/edit', [FlightController::class, 'edit'])->name('flights.edit'); // Edit booking
    Route::put('/flights/{id}', [FlightController::class, 'update'])->name('flights.update'); // Update booking
    Route::delete('/flights/{id}', [FlightController::class, 'destroy'])->name('flights.destroy'); // Cancel booking
});
route::get('/attractions', [AttractionController::class, 'index'])->name('attractions.index');
