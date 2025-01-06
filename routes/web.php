<?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AttractionController;

// Route::get('/', function () {
//     return view('mainpage');
// });

// Route::get('/about', function () {
//     return view('about');
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

// Route::get('/attractions', [AttractionController::class, 'index'])->name('attractions.index');
// Route::get('/attractions/search', [AttractionController::class, 'search'])->name('attractions.search');
// Route::post('/attractions/store', [AttractionController::class, 'store'])->name('attractions.store');

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttractionController;


// Default route
Route::get('/', function () {
    return view('mainpage');
});

// About page route
Route::get('/about', function () {
    return view('about');
});

// Attractions Routes
Route::get('/attractions', [AttractionController::class, 'index'])->name('attractions.index');

// Store route for creating a new attraction (matches the controller's store method)
Route::post('/attractions/store', [AttractionController::class, 'store'])->name('attractions.store');


// Default route
// Route::get('/', function () {
//     return view('mainpage');
// });

// // About page route
// Route::get('/about', function () {
//     return view('about');
// });

// // Attractions Routes
// Route::get('/attractions', [AttractionController::class, 'index'])->name('attractions.index');

// // Search route for attractions (matches the controller's search method)
// Route::get('/attractions/index', [AttractionController::class, 'index'])->name('attractions.index');

// // Store route for creating a new attraction (matches the controller's store method)
// Route::post('/attractions/store', [AttractionController::class, 'store'])->name('attractions.store');


// Optional: If you want to handle specific methods like creating or editing an attraction,
// you can also define routes like so (if needed):
// Route::get('/attractions/create', [AttractionController::class, 'create'])->name('attractions.create');
// Route::get('/attractions/{id}', [AttractionController::class, 'show'])->name('attractions.show');
// Route::get('/attractions/{id}/edit', [AttractionController::class, 'edit'])->name('attractions.edit');
// Route::put('/attractions/{id}', [AttractionController::class, 'update'])->name('attractions.update');
// Route::delete('/attractions/{id}', [AttractionController::class, 'destroy'])->name('attractions.destroy');

