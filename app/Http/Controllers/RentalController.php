<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RentalController extends Controller
{

    // Show the payment form
    public function showPaymentForm(Request $request)
    {
        // Retrieve the vehicle ID and pass it to the view
        $vehicle_id = $request->query('vehicle_id');
        return view('rentalpayment', compact('vehicle_id'));
    }

    public function processPayment(Request $request)
    {
        // Validate the form input
        $request->validate([
            'pickup_date' => 'required|date|after:today',
            'return_date' => 'required|date|after:pickup_date',
            'vehicle_id' => 'required|string'
        ]);

        // Calculate the number of days between pick-up and return dates
        $pickup_date = $request->pickup_date;
        $return_date = $request->return_date;

        $diffTime = abs(strtotime($return_date) - strtotime($pickup_date));
        $diffDays = ceil($diffTime / (60 * 60 * 24)); // Calculate number of days

        // Find the price per day based on the vehicle_id passed from the form
        $vehicle_id = $request->vehicle_id;
        $vehicles = [
            'Toyota Corolla' => 130,
            'Ford Mustang' => 160,
            'BMW X5' => 100,
            'Honda Civic' => 140,
            'Audi A4' => 170,
            'Nissan Altima' => 150,
            'Kia Sportage' => 145,
            'Mazda CX-5' => 155,
        ];

        $price_per_day = $vehicles[$vehicle_id] ?? 0;

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
