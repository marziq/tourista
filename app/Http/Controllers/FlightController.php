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
        return view('flight', compact('flights'));
    }

    // Handle flight search
    public function search(Request $request)

    {

        $query = Flight::query(); // Start with the base query

        // Apply filters based on the request data
        if ($request->filled('departure')) {
            $query->where('departure', 'like', '%' . $request->departure . '%');
        }

        if ($request->filled('arrival')) {
            $query->where('arrival', 'like', '%' . $request->arrival . '%');
        }

        if ($request->filled('travel_date')) {
            $query->whereDate('travel_date', $request->travel_date);
        }

        if ($request->filled('passenger_count')) {
            $query->where('passenger_count', '>=', $request->passenger_count);
        }

        $flights = $query->get(); // Execute the query and get the results

        return view('flightresults', compact('flights')); // Return the results view
    }

    // Optional booking method
    public function book($id)
    {
        $flight = Flight::find($id);

        if ($flight) {
            // Add booking logic here
            return redirect()->route('flights.search')->with('success', 'Flight booked successfully!');
        } else {
            return redirect()->route('flights.search')->with('error', 'Flight not found!');
        }
    }
}
