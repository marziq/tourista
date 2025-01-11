<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\AttractionController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RentalController;

Route::get('/', function () {
    return view('mainpage');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/offers', function () {
    return view('offers');
});

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

Route::get('/', [AttractionController::class, 'mainPage'])->name('main.page');
Route::get('/attractions', [AttractionController::class, 'index'])->name('attractions.index');
Route::get('/attractions/search', [AttractionController::class, 'search'])->name('attractions.search');


//Tour Controller
Route::post('/search', [TourController::class, 'search'])->name('search');

//Hotel Controller
Route::post('/hotel', [HotelController::class, 'index'])->name('hotel');  //display available hotels
Route::post('/hotelBook', [HotelController::class, 'book'])->name('hotelBook'); // Book a room

//Rental
Route::get('/rental', function () {
    return view('rental');
})->name('rental');

Route::post('/rental', [RentalController::class, 'store'])->name('rental');
// web.php

// Route for navigating to the rental payment form
Route::get('/rental-payment', [RentalController::class, 'showPaymentForm'])->name('rentalpayment');

// Route to handle the payment form submission
Route::post('/rental-payment', [RentalController::class, 'processPayment'])->name('rentalpayment.submit');
Route::get('/rentalbooking-success', function () {
    return view('rentalbooking-success');
})->name('rentalbooking.success');


