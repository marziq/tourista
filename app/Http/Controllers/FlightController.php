<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;

class FlightController extends Controller
{
    public function index()
    {
        $flights = Flight::all();
        return view('flights.index', compact('flights'));
    }

    public function search(Request $request)
    {
        $query = Flight::query();

        // Filter by departure
        if ($request->filled('departure')) {
            $query->where('departure', 'like', '%' . $request->departure . '%');
        }

        // Filter by arrival
        if ($request->filled('arrival')) {
            $query->where('arrival', 'like', '%' . $request->arrival . '%');
        }

        // Filter by travel date
        if ($request->filled('travel_date')) {
            $query->whereDate('travel_date', $request->travel_date);
        }

        // Filter by passenger count
        if ($request->filled('passenger_count')) {
            $query->where('passenger_count', '>=', $request->passenger_count);
        }

        $flights = $query->get();

        return view('flights.index', compact('flights'));
    }

    public function mainPage()
    {
        return view('mainpage');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
