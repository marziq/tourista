<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;

class FlightController extends Controller
{
    // Method for handling the flight search
    public function search(Request $request)
    {
        // Start with the base query
        $query = Flight::query();

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

        // Execute the query and get the results
        $flights = $query->get();

        // Return the view with the flights data
        return view('flightresults', compact('flights'));
    }

    // Method for handling booking (optional)
    public function book($id)
    {
        $flight = Flight::find($id);

        if ($flight) {
            // Handle booking logic here (could be saving to a booking table or session)
            return redirect()->route('flights.search')->with('success', 'Flight booked successfully!');
        } else {
            return redirect()->route('flights.search')->with('error', 'Flight not found!');
        }
    }
}
