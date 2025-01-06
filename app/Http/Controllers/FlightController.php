<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    // Show search form
    public function index(Request $request)
    {
        if ($request->has(['departure', 'arrival', 'travel_date'])) {
            $flights = Flight::where('departure', $request->departure)
                ->where('arrival', $request->arrival)
                ->where('travel_date', $request->travel_date)
                ->get();
            return view('flights.results', compact('flights'));
        }
        return view('flights.search');
    }

    // Store a new flight booking
    public function store(Request $request)
    {
        $validated = $request->validate([
            'departure' => 'required',
            'arrival' => 'required',
            'travel_date' => 'required|date',
            'passenger_count' => 'required|integer|min:1',
        ]);

        Flight::create($validated);

        return redirect()->route('flights.index')->with('success', 'Flight booked successfully!');
    }

    // Edit booking form
    public function edit($id)
    {
        $flight = Flight::findOrFail($id);
        return view('flights.edit', compact('flight'));
    }

    // Update booking
    public function update(Request $request, $id)
    {
        $flight = Flight::findOrFail($id);

        $validated = $request->validate([
            'travel_date' => 'required|date',
            'passenger_count' => 'required|integer|min:1',
        ]);

        $flight->update($validated);

        return redirect()->route('flights.index')->with('success', 'Booking updated successfully!');
    }

    // Delete booking
    public function destroy($id)
    {
        $flight = Flight::findOrFail($id);
        $flight->delete();

        return redirect()->route('flights.index')->with('success', 'Booking canceled successfully!');
    }
}


