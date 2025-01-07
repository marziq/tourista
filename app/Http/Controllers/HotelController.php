<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()  // to display available hotels
    {
        $hotels = Hotel::with('rooms')->get();
        return view('hotels.index', compact('hotels'));
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
        $validated = $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date|after:today',
            'check_out' => 'required|date|after:check_in',
            'guests' => 'required|integer|min:1'
        ]);

        Booking::create($validated);
        return redirect()->route('hotels.index')->with('success', 'Booking successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)  //to show hotel details
    {
        $hotel = Hotel::with('rooms')->findOrFail($id);
        return view('hotels.show', compact('hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)  //to edit a booking
    {
        $booking = Booking::findOrFail($id);
        $rooms = Room::where('hotel_id', $booking->hotel_id)->get();
        return view('bookings.edit', compact('booking', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)  //to update a booking
    {
        $booking = Booking::findOrFail($id);
        $validated = $request->validate([
            'check_in' => 'required|date|after:today',
            'check_out' => 'required|date|after:check_in',
            'room_id' => 'required|exists:rooms,id',
            'guests' => 'required|integer|min:1'
        ]);

        $booking->update($validated);
        return redirect()->route('hotels.index')->with('success', 'Booking successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)  //to delete a booking
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return redirect()->route('hotels.index')->with('success', 'Booking successfully cancelled!');
    }
}

