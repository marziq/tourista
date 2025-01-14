<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Rental;
use App\Models\Flight;
use App\Models\TourPackage;
use App\Models\Attraction;

class AdminController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
        $rentals = Rental::all();
        $flights = Flight::all();
        $tours = TourPackage::all();
        $attractions = Attraction::all();

        return view('admin', compact('hotels', 'rentals', 'flights', 'tours', 'attractions'));
    }
}
