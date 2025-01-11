<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel; // Hotel model

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)  // to display available hotels
    {

        /*$hotels = Hotel::with('rooms')->get();
        return view('hotel', compact('hotels'));*/

        // Fetch all hotels from the database
        //$hotels = Hotel::all();

        // Initialize the query builder for the Hotel model
        $query = Hotel::query();

        if ($request->has('destination') && $request->destination != '') {
            $query->where('location', 'like', '%' . $request->destination . '%');
        }

        // Filter hotels based on availability of rooms
        /*$query->whereHas('rooms', function ($query) use ($request) {
            $query->where('available', true);
        });*/

        $hotels = $query->with('rooms')->get();

        // To display the lowest room price for each hotel
        foreach ($hotels as $hotel) {
            $hotel->lowest_price = $hotel->rooms->min('price');
        }

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
     * Display the specified resource.
     */
    public function show(string $id)  //to show hotel details
    {
        $hotel = Hotel::findOrFail($id); // Fetch the hotel by its ID or return a 404 error
        return view('hotelRoom', compact('hotelRoom')); // Return the view with hotel details*/
    }

    /**
     * Handle room booking.
     */
    public function booking(Request $request, $id)
    {
        $room = HotelRoom::findOrFail($id);
        $num_rooms = $request->input('num_rooms');

        // Logic to handle booking (e.g., reduce available rooms, create booking record, etc.)

        return redirect()->route('hotel.show', $room->hotel_id)->with('success', 'Room booked successfully!');
    }

    public function search(Request $request)
    {
        //Retrieve form data
        $destination = $request->input('destination');
        $check_in = $request->input('check_in');
        $check_out = $request->input('check_out');
        $adults = $request->input('adults');
        $children = $request->input('children');


        $hotels = Hotel::where('destination', 'like', '%' . $destination . '%')->paginate(10);
        return view('hotel', ['hotel' => $hotels]);
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

