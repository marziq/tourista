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

        $hotel = Hotel::all();
        return view('hotel', compact('hotel'));
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
       $hotelData = [
            'hotel_id' => $request->hotel_id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'guests' => $request->guests,
        ];

        return view('HotelBook', compact('hotelData'));

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
        };

        $hotel = $query->get();

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

