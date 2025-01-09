<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function search(Request $request)
    {
        // Retrieve form data
        $destination = $request->input('destination');
        $checkIn = $request->input('check_in');
        $checkOut = $request->input('check_out');
        $adults = $request->input('adults');
        $children = $request->input('children');

        // Perform search query (example)
        $tourPackages = TourPackage::where('destination', 'like', '%' . $destination . '%')
            ->where('check_in', '>=', $checkIn)
            ->where('check_out', '<=', $checkOut)
            ->where('adults', '>=', $adults)
            ->where('children', '>=', $children)
            ->get();

        // Return a view with the search results
        return view('search_results', compact('tourPackages'));
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
