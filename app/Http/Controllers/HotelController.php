<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;       // Hotel model
use App\Models\HotelRoom;  //HotelRoom model

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

        /*// Check if check-in and check-out dates are provided
        if ($request->has('check_in') && $request->has('check_out')) {
            // Ensure that check-in and check-out dates are in correct format (optional)
            $check_in = $request->check_in;
            $check_out = $request->check_out;

            // Filter hotels based on available dates (assumes checkin_date and checkout_date are in the database)
            $query->where(function($query) use ($check_in, $check_out) {
                $query->where('checkin_date', '<=', $check_out)
                      ->where('checkout_date', '>=', $check_in);
            });
        }

        // Execute the query and apply pagination
        $hotels = $query->with('rooms')->paginate(10);

        // Optionally, filter out hotels without rooms
        $hotels = $hotels->filter(function ($hotel) {
            return $hotel->rooms->isNotEmpty();
        });*/

        $hotels = $query->paginate(10);

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
        $room = HotelRoom::findOrFail($id);

        // Logic to handle booking (e.g., reduce available rooms, create booking record, etc.)
        // For simplicity, let's assume we just mark the room as unavailable
        $room->available = false;
        $room->save();

        return redirect()->route('hotelRoom', $room->hotel_id)->with('success', 'Room booked successfully!');
    }

    public function search(Request $request)
    {
        //Retrieve form data
        /*$destination = $request->input('destination');
        $check_in = $request->input('check_in');
        $check_out = $request->input('check_out');
        $adults = $request->input('adults');
        $children = $request->input('children');


        $hotels = Hotel::where('destination', 'like', '%' . $destination . '%')->paginate(10);
        return view('hotel', ['hotel' => $hotels]);*/

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
        $hotels = $query->with('rooms')->paginate(10);

        /*// Optionally, filter out hotels without rooms
        $hotels = $hotels->filter(function ($hotel) {
            return $hotel->rooms->isNotEmpty();
        });*/

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

