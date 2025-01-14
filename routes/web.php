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
use App\Http\Controllers\VehicleController;

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

Route::get('/contact', function () {
    return view('contact');
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
Route::post('/hotel', [HotelController::class, 'search'])->name('search_hotel');  // Display available hotels
Route::get('/payment_hotel', [PaymentController::class, 'showHotel'])->name('payment_hotel'); // Book a hotel
Route::post('/payment_hotel/process', [PaymentController::class, 'processHotel'])->name('payment.processHotel');


//Rental
Route::get('/rental', function () {
    return view('rental');
})->name('rental');
Route::post('/rental', [RentalController::class, 'store'])->name('rental');
Route::get('/rental', [RentalController::class, 'showVehicles'])->name('rental');
Route::get('/vehicles', [RentalController::class, 'showVehicles'])->name('vehicles');

Route::post('/process-rental-search', [RentalController::class, 'processRentalSearch'])->name('processRentalSearch');
Route::post('/process-rental-payment', [RentalController::class, 'processRentalPayment'])->name('processRentalPayment');
Route::post('/process-rental-search', [RentalController::class, 'processRentalSearch'])->name('processRentalSearch');
Route::get('/rental', [RentalController::class, 'rental'])->name('rental');
Route::get('/rentalpayment', [RentalController::class, 'rentalPayment'])->name('rentalpayment');
Route::post('/rentalpayment/submit', [RentalController::class, 'processRentalPayment'])->name('rentalpayment.submit');
Route::post('/book-vehicle/{vehicleId}', [RentalController::class, 'bookVehicle'])->name('bookVehicle');
Route::post('/rentalpayment/submit', [RentalController::class, 'storeRental'])->name('rentalpayment.submit');

Route::get('/rental-success', function () {
    return view('rental_success');
})->name('rental.success');

Route::post('/', function () {
    return view('homepage');  // Homepage route pointing to homepage.blade.php
})->name('homepage');


/*=============================================================================================================*/


//admin dashboard and CRUD
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/admin', function () {
        if (Auth::check() && Auth::user()->email === 'admin@admin.com') {
            return view('admin');
        }
        return redirect('/');
    })->name('admin');

    Route::group(['middleware' => function ($request, $next) {
        if (Auth::check() && Auth::user()->email === 'admin@admin.com') {
            return $next($request);
        }
        return redirect('/');
    }], function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin');

        Route::resource('/admin/hotels', HotelController::class);
        Route::resource('/admin/vehicles', VehicleController::class);
        Route::resource('/admin/flights', FlightController::class);
        Route::resource('/admin/tours', TourController::class);
        Route::resource('/admin/attractions', AttractionController::class);
    });
});

//admin CRUD
//hotel
Route::get('/hotels/create', [HotelController::class, 'create'])->name('hotels.create');
Route::post('/hotels', [HotelController::class, 'store'])->name('hotels.store');
Route::get('/hotels/{hotel}/edit', [HotelController::class, 'edit'])->name('hotels.edit');
Route::put('/hotels/{hotel}', [HotelController::class, 'update'])->name('hotels.update');
Route::delete('/hotels/{hotel}', [HotelController::class, 'destroy'])->name('hotels.destroy');

//vehicle
Route::get('/vehicles/create', [VehicleController::class, 'create'])->name('vehicles.create');
Route::post('/vehicles', [VehicleController::class, 'store'])->name('vehicles.store');
Route::get('/vehicles/{vehicle}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');
Route::put('/vehicles/{vehicle}', [VehicleController::class, 'update'])->name('vehicles.update');
Route::delete('/vehicles/{vehicle}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');

//flight
Route::get('/flights/create', [FlightController::class, 'create'])->name('flights.create');
Route::post('/flights', [FlightController::class, 'store'])->name('flights.store');
Route::get('/flights/{flight}/edit', [FlightController::class, 'edit'])->name('flights.edit');
Route::put('/flights/{flight}', [FlightController::class, 'update'])->name('flights.update');
Route::delete('/flights/{flight}', [FlightController::class, 'destroy'])->name('flights.destroy');

//tour
Route::get('/tours/create', [TourController::class, 'create'])->name('tours.create');
Route::post('/tours', [TourController::class, 'store'])->name('tours.store');
Route::get('/tours/{tour}/edit', [TourController::class, 'edit'])->name('tours.edit');
Route::put('/tours/{tour}', [TourController::class, 'update'])->name('tours.update');
Route::delete('/tours/{tour}', [TourController::class, 'destroy'])->name('tours.destroy');

//attraction

Route::get('/attractions/create', [AttractionController::class, 'create'])->name('attractions.create');
Route::post('/attractions', [AttractionController::class, 'store'])->name('attractions.store');
Route::get('/attractions/{attraction}/edit', [AttractionController::class, 'edit'])->name('attractions.edit');
Route::put('/attractions/{attraction}', [AttractionController::class, 'update'])->name('attractions.update');
Route::delete('/attractions/{attraction}', [AttractionController::class, 'destroy'])->name('attractions.destroy');
