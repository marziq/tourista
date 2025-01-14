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
        return view('hotel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)  //to create a new booking
    {
        $hotel = new Hotel();
        $hotel->name = $request->name;
        $hotel->location = $request->location;
        $hotel->price = $request->price;
        $hotel->description = $request->description;
        $hotel->check_in = $request->check_in;
        $hotel->check_out = $request->check_out;
        $hotel->save();

        return redirect()->route('admin')->with('success', 'Hotel created successfully.');
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
    /*public function book(Request $request, $id)
    {
       $hotelData = [
            'hotel_id' => $request->hotel_id,
            'check_in_date' => $request->check_in,
            'check_out_date' => $request->check_out,
            'guests' => $request->guests,
        ];

        return view('payment_hotel', compact('hotelData'));

    }*/

    public function search(Request $request)
    {
        /*
        $request->validate([
            'destination' => 'required|string',
            'check_in' => 'required|date|after:today',
            'check_out' => 'required|date|after:check_in',
            'pax' => 'required|integer|min:1',
        ]);

        $destination = $request->input('destination');
        $checkIn = $request->input('check_in');
        $checkOut = $request->input('check_out');

        // Fetch hotels that match the criteria and do not have overlapping dates
        $hotel = Hotel::where('location', $destination)
            ->where(function ($query) use ($checkIn, $checkOut) {
                $query->whereNull('check_in') // Include hotels with no bookings
                      ->orWhere(function ($subQuery) use ($checkIn, $checkOut) {
                          $subQuery->where('check_out', '<=', $checkIn) // Ensure no overlap
                                   ->orWhere('check_in', '>=', $checkOut);
                      });
            })
            ->get();

        return view('hotel', compact('hotel'));*/
       //Initialize the query builder for the Hotel model
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
        return view('hotel', compact('hotel', 'checkinDate', 'checkoutDate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)  //to edit a booking
    {
        return view('hotel.edit', compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)  //to update a booking
    {
        $hotel = Hotel::findOrFail($id); // Retrieve the hotel instance by ID

        $hotel->name = $request->name;
        $hotel->location = $request->location;
        $hotel->price = $request->price;
        $hotel->description = $request->description;
        $hotel->check_in = $request->check_in;
        $hotel->check_out = $request->check_out;
        $hotel->save();

        return redirect()->route('admin')->with('success', 'Hotel updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)  //to delete a booking
    {
        $hotel = Hotel::findOrFail($id); // Retrieve the hotel instance by ID
        $hotel->delete(); // Delete the hotel

        return redirect()->route('admin')->with('success', 'Hotel deleted successfully.');
    }
}

