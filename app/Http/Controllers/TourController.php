<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TourPackage;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $package = TourPackage::all();
        return view('tourpackage_result', compact('package'));
    }
   public function search(Request $request)
{
    // Retrieve form data
    $departure = $request->input('departure');
    $destination = $request->input('destination');
    $travel_date = $request->input('travel_date');
    $passengers = $request->input('passenger');

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
    return view('flightresults', compact('flights', 'departure', 'destination', 'travel_date', 'passengers'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
