<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;

class FlightController extends Controller
{
    // Display a listing of all flights
    public function index()
    {
        // Fetch all flights
        $flights = Flight::all();
        // Return the view with flights
        return view('flightresults', compact('flights'));
    }

    // Handle flight search
    public function search(Request $request)
{
    // Retrieve form data
    $departure = $request->input('departure');
    $destination = $request->input('destination');
    $travel_date = $request->input('travel_date');
    $passengers = (int) $request->input('passenger');

    // Perform search query
    $query = Flight::query();

    if ($departure) {
        $query->where('departure', 'like', '%' . $departure . '%');
    }
    if ($destination) {
        $query->where('arrival', 'like', '%' . $destination . '%');
    }
    if ($travel_date) {
        $query->whereDate('travel_date', '=', $travel_date);
    }
    if ($passengers) {
        $query->where('passenger_count', '>=', $passengers);
    }

    // Get the filtered results
    $flights = $query->get();

    // Return the results view with relevant data
    return view('flightresults', compact('flights', 'passengers'));
}


}
