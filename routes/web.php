<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\AttractionController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\AdminController;

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
});
    // Add flight routes here
 // Flight Routes
Route::get('/', [FlightController::class, 'mainPage'])->name('main.page');

// Display all available flights
Route::get('/flights', [FlightController::class, 'index'])->name('flights.index');

// Search flights (no authentication needed)
Route::get('/flights/search', [FlightController::class, 'search'])->name('flights.search');


// Book a flight (no authentication needed)
Route::get('/flights/payment', [PaymentController::class, 'showFlight'])->name('flights.showFlight');
Route::post('/payment/processFlight', [PaymentController::class, 'processFlight'])->name('payment.processFlight'); // Processes the payment

// Create a new flight (authentication might be needed if you want to restrict access)
//Route::post('/flights', [FlightController::class, 'store'])->name('flights.store');

//Attraction
Route::get('/', [AttractionController::class, 'mainPage'])->name('main.page');
Route::get('/attractions', [AttractionController::class, 'index'])->name('attractions.index');
Route::get('/attractions/search', [AttractionController::class, 'search'])->name('attractions.search');

//payment for attraction
Route::get('/payment', [PaymentController::class, 'show'])->name('payment.show'); // Displays payment form
Route::post('/payment/process', [PaymentController::class, 'process'])->name('payment.process'); // Processes the paymentt
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show'); // Displays the profile page
Route::get('/profile', [PaymentController::class, 'profile'])->name('profile.show');
Route::delete('/payments/{id}', [PaymentController::class, 'destroy'])->name('payments.destroy');
Route::put('/payments/{id}', [PaymentController::class, 'update'])->name('payments.update');

//Tour Controller
Route::post('/search', [TourController::class, 'search'])->name('search');
Route::get('/payment_tour', [PaymentController::class, 'showTour'])->name('payment_tour');
Route::post('/paymentTour/process', [PaymentController::class, 'processTour'])->name('payment.processTour');


//Hotel Controller
Route::post('/hotel', [HotelController::class, 'search'])->name('hotel');  // Display available hotels
Route::post('/hotelBook', [HotelController::class, 'book'])->name('hotelBook'); // Book a room

//Rental
Route::get('/rental', function () {
    return view('rental');
})->name('rental');
Route::post('/rental', [RentalController::class, 'store'])->name('rental');
Route::get('/rental', [RentalController::class, 'showVehicles'])->name('rental');
Route::get('/vehicles', [RentalController::class, 'showVehicles'])->name('vehicles');

// web.php
Route::get('/rental-payment', [RentalController::class, 'showPaymentForm'])->name('rentalpayment');  // Route for navigating to the rental payment form
Route::post('/rental-payment', [RentalController::class, 'processPayment'])->name('rentalpayment.submit');  // Route to handle the payment form submission

// Route for success confirmation after booking
Route::get('/rentalbooking-success', function () {
    return view('rentalbooking-success');
})->name('rentalbooking.success');



//admin dashboard
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/admin', function () {
        if (Auth::check() && Auth::user()->email === 'admin@admin.com') {
            return view('admin');
        }
        return redirect('/');
    })->name('admin');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    Route::resource('/admin/hotels', HotelController::class);
    Route::resource('/admin/rentals', RentalController::class);
    Route::resource('/admin/flights', FlightController::class);
    Route::resource('/admin/tours', TourController::class);
    Route::resource('/admin/attractions', AttractionController::class);
});

