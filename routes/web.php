<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\AttractionController;

Route::get('/', function () {
    return view('mainpage');
});

Route::get('/', [MainPageController::class, 'index']);

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
    Route::get('/flights/search', [FlightController::class, 'search'])->name('flights.search');
    Route::get('/flight-booking', [FlightController::class, 'showFlightBooking'])->name('flight.booking');

});

//Attraction
Route::get('/', [AttractionController::class, 'mainPage'])->name('main.page');
Route::get('/attractions', [AttractionController::class, 'index'])->name('attractions.index');
Route::get('/attractions/search', [AttractionController::class, 'search'])->name('attractions.search');

//payment
Route::get('/payment', [PaymentController::class, 'show'])->name('payment.show'); // Displays payment form
Route::post('/payment/process', [PaymentController::class, 'process'])->name('payment.process'); // Processes the paymentt

//Tour Controller
Route::post('/search', [TourController::class, 'search'])->name('search');

//Hotel Controller
Route::post('/hotel', [HotelController::class, 'index'])->name('hotel');
Route::post('/hotelRoom', [HotelController::class, 'show'])->name('hotelRoom');
//Route::post('/hotelBooking', [HotelController::class, 'booking'])->name('hotelBooking');

//Rental
Route::get('/rental', function () {
    return view('rental');
})->name('rental');
Route::post('/rental', [RentalController::class, 'store'])->name('rental');
Route::get('/rental', [RentalController::class, 'showVehicles'])->name('rental');
Route::get('/vehicles', [RentalController::class, 'showVehicles'])->name('vehicles');

// web.php
Route::get('/rental-payment', [RentalController::class, 'showPaymentForm'])->name('rentalpayment');// Route for navigating to the rental payment form
Route::post('/rental-payment', [RentalController::class, 'processPayment'])->name('rentalpayment.submit');// Route to handle the payment form submission
// Route for success confirmation after booking
Route::get('/rentalbooking-success', function () {
    return view('rentalbooking-success');
})->name('rentalbooking.success');
Route::get('/rentalpayment', [RentalController::class, 'showPaymentForm'])->name('rentalpayment');




