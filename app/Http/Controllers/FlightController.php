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

     public function create()
    {
        return view('flights.create');
    }

    public function store(Request $request)
    {
        $flight = new Flight();
        $flight->departure = $request->departure;
        $flight->arrival = $request->arrival;
        $flight->travel_date = $request->travel_date;
        $flight->passenger_count = $request->passenger_count;
        $flight->price = $request->price;
        $flight->airline = $request->airline;
        $flight->save();

        return redirect()->route('admin')->with('success', 'Flight created successfully.');
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

    public function edit(Flight $flight)
    {
         return view('flights.edit', compact('flight'));
    }

    public function update(Request $request, Flight $flight)
    {
        $flight->departure = $request->departure;
        $flight->arrival = $request->arrival;
        $flight->travel_date = $request->travel_date;
        $flight->passenger_count = $request->passenger_count;
        $flight->price = $request->price;
        $flight->airline = $request->airline;
        $flight->save();

        return redirect()->route('admin')->with('success', 'Flight updated successfully.');
    }

    public function destroy(Flight $flight)
    {
        $flight->delete();

        return redirect()->route('admin')->with('success', 'Flight deleted successfully.');
    }

}
