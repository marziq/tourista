<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Rental;
use Illuminate\Http\Request;
use Carbon\Carbon;
class RentalController extends Controller
{

    public function showVehicles()
{
    $vehicles = Vehicle::all();  // Fetch vehicles from the database
    return view('rental', compact('vehicles'));
}

public function processRentalSearch(Request $request)
{
    $request->validate([
        'location' => 'required|string',
        'pickup_date' => 'required|date|after_or_equal:today',
        'return_date' => 'required|date|after:pickup_date',  // Ensure return_date is after pickup_date
    ]);


    $pickupDate = \Carbon\Carbon::parse($request->pickup_date);
    $returnDate = \Carbon\Carbon::parse($request->return_date);

    // Ensure return_date is greater than pickup_date
    if ($returnDate->lt($pickupDate)) {
        return redirect()->back()->withErrors('Return date must be after pickup date.');
    }


    $numberOfDays = $returnDate->diffInDays($pickupDate);

    $vehicle = Vehicle::find(session('vehicle_id'));
    $pricePerDay = $vehicle->price_per_day;

    $totalPayment = $numberOfDays * $pricePerDay;

    session(['vehicle_id' => $request->vehicle_id]);

    session([
        'location' => $request->location,
        'pickup_date' => $request->pickup_date,
        'return_date' => $request->return_date,
        'total_payment' => $totalPayment,
    ]);

    // Debugging session storage
    \Log::info('Session Data: ', session()->all());

    return redirect()->route('rentalpayment');
}



public function rental()
{
    $location = session('location');
    $pickupDate = session('pickup_date');
    $returnDate = session('return_date');

    // Fetch all vehicles (or apply filters based on the session data if required)
    $vehicles = Vehicle::all();

    // Pass data to the view
    return view('rental', compact('location', 'pickupDate', 'returnDate', 'vehicles'));
}


public function processRentalPayment(Request $request)
{
    // Validate the request data
    $request->validate([
        'vehicle_id' => 'required|exists:vehicles,id',
        'username' => 'required|string|max:255',
        'card_number' => 'required|digits:16',
        'expiration_date' => 'required|date_format:m/y',
        'cvv' => 'required|digits:3',
        'card_holder_name' => 'required|string|max:255',
    ]);

    // Retrieve vehicle and session data
    $vehicle = Vehicle::findOrFail($request->vehicle_id);
    $totalPayment = session('total_payment');

    // Example logic to process payment (replace with actual implementation)
    // e.g., integrate with a payment gateway API

    // Save the rental details in the database
    Rental::create([
        'vehicle_id' => $vehicle->id,
        'brand' => $vehicle->brand,
        'model' => $vehicle->model,
        'pickup_date' => session('pickup_date'),
        'return_date' => session('return_date'),
        'price_per_day' => $vehicle->price_per_day,
        'number_of_days' => (new \Carbon\Carbon(session('return_date')))
            ->diffInDays(new \Carbon\Carbon(session('pickup_date'))),
        'total_payment' => $totalPayment,
        'location' => session('location'),
        'username' => $request->username,
        'card_number' => $request->card_number,
    ]);

    // Clear the session
    session()->forget(['location', 'pickup_date', 'return_date', 'total_payment']);

    // Redirect to a success page
    return redirect()->route('rentalpayment.success')->with('success', 'Payment successful!');
}

public function rentalPayment()
{
    // Retrieve the vehicle ID from the session
    $vehicleId = session('vehicle_id');

    if (!$vehicleId) {
        return redirect()->route('rental')->with('error', 'No vehicle selected for payment.');
    }

    // Retrieve the vehicle from the database
    $vehicle = Vehicle::find($vehicleId);

    if (!$vehicle) {
        return redirect()->route('rental')->with('error', 'Vehicle not found.');
    }

    // Pass the vehicle to the view
    return view('rentalpayment', compact('vehicle'));
}
public function bookVehicle(Request $request, $vehicleId)
{
    $vehicle = Vehicle::findOrFail($vehicleId);

    // Store vehicle ID in session
    session(['vehicle_id' => $vehicle->id]);

    return redirect()->route('rentalpayment');
}

public function storeRental(Request $request)
    {
        // Assuming 'vehicle_id' is stored in the session when selecting a vehicle for booking
        $vehicle = Vehicle::findOrFail(session('vehicle_id'));

        // Calculate the number of days for the rental
        $pickupDate = Carbon::parse($request->pickup_date);
        $returnDate = Carbon::parse($request->return_date);
        $numberOfDays = $pickupDate->diffInDays($returnDate);

        // Calculate the total payment
        $totalPayment = $vehicle->price_per_day * $numberOfDays;

        // Create a new rental record
        $rental = new Rental();  // Using the imported Rental model
        $rental->vehicle_id = $vehicle->id;
        $rental->brand = $vehicle->brand;
        $rental->model = $vehicle->model;
        $rental->pickup_date = $request->pickup_date;
        $rental->return_date = $request->return_date;
        $rental->price_per_day = $vehicle->price_per_day;
        $rental->number_of_days = $numberOfDays;
        $rental->total_payment = $totalPayment;
        $rental->location = $request->location;
        $rental->username = $request->username;
        $rental->card_number = $request->card_number;
        $rental->save();

        // Redirect to a success page or confirmation page
        return redirect()->route('rental.success');
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
