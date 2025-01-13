<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;       // Hotel model

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)  // to display hotels
    {

        // Initialize the query builder for the Hotel model
        $query = Hotel::query();

        // Check if destination filter is applied
        if ($request->has('destination') && $request->destination != '') {
            $query->where('location', 'like', '%' . $request->destination . '%');
        }

        // Check if check-in and check-out dates are provided
        if ($request->has('check_in') && $request->has('check_out')) {
            $checkinDate = $request->input('check_in');
            $checkoutDate = $request->input('check_out');

            $query->where(function($query) use ($checkinDate, $checkoutDate) {
                // Filter hotels based on available dates
                $query->whereNull('check_in') // No booking exists
                  ->orWhere(function ($subQuery) use ($checkinDate, $checkoutDate) {
                      $subQuery->where('check_in', '>', $checkoutDate)
                               ->orWhere('check_out', '<', $checkinDate);
                  });
            });
        }

        // Fetch hotels with rooms and paginate results
        $hotels = $query->with('rooms')->paginate(5);

        // Pass the hotels data to the view
        return view('hotel', compact('hotels'));
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
    public function store(Request $request)  //to create a new booking
    {
        //
    }

    /**
     * Display the available rooms for a specific hotel.
     */
    public function show($id, Request $request)
    {
        //
    }

    /**
     * Handle room booking.
     */
    public function book(Request $request, $id)
    {
        //
    }

    public function search(Request $request)
    {
        // Initialize the query builder for the Hotel model
        $query = Hotel::query();

        // Apply the search filters for destination, check-in, and check-out dates
        if ($request->has('destination') && $request->destination != '') {
            $query->where('location', 'like', '%' . $request->destination . '%');
        }

        if ($request->has('check_in') && $request->has('check_out')) {
            $checkinDate = $request->input('check_in');
            $checkoutDate = $request->input('check_out');

            $query->whereHas('rooms', function ($roomQuery) use ($checkinDate, $checkoutDate) {
                // Filter rooms based on the checkin_date and checkout_date
                $roomQuery->where('checkin_date', '<=', $checkoutDate)
                          ->where('checkout_date', '>=', $checkinDate);
            });
        }

        // Execute the query to fetch hotels
        $hotels = $query->with('rooms')->paginate(5);

        // Return the filtered results to the view
        return view('hotel', compact('hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)  //to edit a booking
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)  //to update a booking
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)  //to delete a booking
    {
        //
    }
}

