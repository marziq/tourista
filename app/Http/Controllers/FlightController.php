<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    // Show search form
   public function index(Request $request)
    {
        // Start with all flights
        $query = Flight::query();

        // Apply filters if search criteria are present
        if ($request->has('departure') && $request->departure != '') {
            $query->where('departure', 'like', '%' . $request->departure . '%');
        }

        if ($request->has('arrival') && $request->arrival != '') {
            $query->where('arrival', 'like', '%' . $request->arrival . '%');
        }

        if ($request->has('travel_date') && $request->travel_date != '') {
            $query->whereDate('travel_date', $request->travel_date);
        }

        if ($request->has('passenger_count') && $request->passenger_count != '') {
            $query->where('passenger_count', '>=', $request->passenger_count);
        }

        // Execute the query to fetch filtered flights
        $flights = $query->get();

        // Return the search results view with the filtered flights
        return view('flights.index', compact('flights'));
    }

    public function store(Request $request)
    {
        // Validate and create a new flight
        $validated = $request->validate([
            'departure' => 'required|string',
            'arrival' => 'required|string',
            'travel_date' => 'required',
            'price' => 'required|numeric',
            'airline' => 'nullable|string',
            'image' => 'nullable|string',
            'passenger_count' => 'nullable|integer', // Ensure passenger count is optional for now
        ]);

        Flight::create($validated);

        return redirect()->route('flights.index')->with('success', 'Flight created successfully!');
    }
}


