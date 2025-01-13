<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class RentalController extends Controller
{

    public function showVehicles()
{
    $vehicles = Vehicle::all();  // Fetch vehicles from the database
    return view('vehicle-list', compact('vehicles'));
}

public function showPaymentForm(Request $request)
{
    // Retrieve the vehicle details using the ID passed in the request
    $vehicle = Vehicle::findOrFail($request->vehicle_id);

    // Store pickup and return dates into the session
    session(['pickup_date' => $request->pickup_date]);
    session(['return_date' => $request->return_date]);

    // Pass the vehicle details to the view
    return view('rentalpayment', compact('vehicle'));
}



public function processPayment(Request $request)
{
    // Validate the input
    $request->validate([
        'pickup_date' => 'required|date|after:today',
        'return_date' => 'required|date|after:pickup_date',
        'vehicle_id' => 'required|exists:vehicles,id',
    ]);

    $pickupDate = $request->pickup_date;
    $returnDate = $request->return_date;
    $vehicleId = $request->vehicle_id;

    // Retrieve the vehicle details using the ID passed in the request
    $vehicle = Vehicle::findOrFail($vehicleId);
    $pricePerDay = $vehicle->price_per_day;

    // Calculate the number of rental days
    $diffDays = (strtotime($returnDate) - strtotime($pickupDate)) / (60 * 60 * 24); // Number of days

    // Calculate the total payment
    $totalPayment = $diffDays * $pricePerDay;

    // Store the total payment in session
    session(['total_payment' => $totalPayment]);

    // Check if the vehicle is available
    if (!Rental::isAvailable($vehicleId, $pickupDate, $returnDate)) {
        return redirect()->back()->withErrors(['error' => 'The selected vehicle is not available for the chosen dates.']);
    }

    // Save rental details to the database
    Rental::create([
        'vehicle_id' => $vehicleId,
        'pickup_date' => $pickupDate,
        'return_date' => $returnDate,
        'price_per_day' => $pricePerDay,
        'number_of_days' => $diffDays,
        'total_payment' => $totalPayment,
    ]);

    // Redirect to the payment form with total payment
    return view('rentalpayment', ['vehicle' => $vehicle, 'totalPayment' => $totalPayment]);
}






    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
