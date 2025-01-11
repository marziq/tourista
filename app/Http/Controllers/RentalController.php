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

    // Show the payment form
    public function showPaymentForm(Request $request)
    {
    // Retrieve the vehicle details using the ID passed in the request
    $vehicle = Vehicle::findOrFail($request->vehicle_id);

    // Pass the vehicle details to the view
    return view('rentalpayment', compact('vehicle'));
    }


    public function processPayment(Request $request)
    {
        // Validate the form input
        $request->validate([
            'pickup_date' => 'required|date|after:today',
            'return_date' => 'required|date|after:pickup_date',
            'vehicle_id' => 'required|string',
        ]);

        // Calculate the number of days between pick-up and return dates
        $pickupDate = $request->pickup_date;
        $returnDate = $request->return_date;
        $vehicleId = $request->vehicle_id;

         // Check if the vehicle is available
         if (!Booking::isAvailable($vehicleId, $pickupDate, $returnDate)) {
            return redirect()->back()->withErrors(['error' => 'The selected vehicle is not available for the chosen dates.']);
        }

        $diffTime = abs(strtotime($return_date) - strtotime($pickup_date));
        $diffDays = ceil($diffTime / (60 * 60 * 24)); // Calculate number of days


        $vehicle = \App\Models\Vehicle::find($vehicleId);
        $pricePerDay = $vehicle->price_per_day;

        // Calculate the total payment
        $total_payment = $diffDays * $price_per_day;

        Rental::create([
            'vehicle_id' => $vehicle_id,
            'pickup_date' => $pickup_date,
            'return_date' => $return_date,
            'price_per_day' => $price_per_day,
            'number_of_days' => $diffDays,
            'total_payment' => $total_payment,
        ]);
         // Optionally, save the booking details into your database

        // Redirect to a confirmation or payment success page
        return redirect()->route('booking.success')->with('total_payment', $total_payment);
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
