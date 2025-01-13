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
        /*$validated = $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date|after:today',
            'check_out' => 'required|date|after:check_in',
            'guests' => 'required|integer|min:1'
        ]);

        Booking::create($validated);
        return redirect()->route('hotels.index')->with('success', 'Booking successfully created!');*/
    }

    /**
     * Display the available rooms for a specific hotel.
     */
    public function show($id, Request $request)
    {
        /*$hotel = Hotel::findOrFail($id); // Fetch the hotel by its ID or return a 404 error
        return view('hotelRoom', compact('hotelRoom')); // Return the view with hotel details*/

        // Retrieve the hotel and its associated rooms by ID
        $hotel = Hotel::with('rooms')->findOrFail($id);

        // Pass the hotel data to the view
        return view('hotelRoom', compact('hotel'));
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
        /*$booking = Booking::findOrFail($id);
        $rooms = Room::where('hotel_id', $booking->hotel_id)->get();
        return view('bookings.edit', compact('booking', 'rooms'));*/
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)  //to update a booking
    {
        /*$booking = Booking::findOrFail($id);
        $validated = $request->validate([
            'check_in' => 'required|date|after:today',
            'check_out' => 'required|date|after:check_in',
            'room_id' => 'required|exists:rooms,id',
            'guests' => 'required|integer|min:1'
        ]);

        $booking->update($validated);
        return redirect()->route('hotels.index')->with('success', 'Booking successfully updated!');*/
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)  //to delete a booking
    {
        /*$booking = Booking::findOrFail($id);
        $booking->delete();
        return redirect()->route('hotels.index')->with('success', 'Booking successfully cancelled!');*/
    }
}

