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
 // Flight Routes
Route::get('/', [FlightController::class, 'mainPage'])->name('main.page');

// Display all available flights
Route::get('/flights', [FlightController::class, 'index'])->name('flights.index');

// Search flights (no authentication needed)
Route::get('/flights/search', [FlightController::class, 'search'])->name('flights.search')->withoutMiddleware('auth');


// Book a flight (no authentication needed)
Route::get('/flights/book/{id}', [FlightController::class, 'book'])->name('flights.book');

// Create a new flight (authentication might be needed if you want to restrict access)
Route::post('/flights', [FlightController::class, 'store'])->name('flights.store');



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
Route::post('/hotel', [HotelController::class, 'index'])->name('hotel');  //display available hotels
Route::post('/hotelBook', [HotelController::class, 'book'])->name('hotelBook'); // Book a room

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




