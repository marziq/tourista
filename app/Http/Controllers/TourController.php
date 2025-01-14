<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TourPackage;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $package = TourPackage::all();
        return view('tourpackage_result', compact('package'));
    }
   public function search(Request $request)
{
    // Retrieve form data
    $package = $request->input('package');
    $minPrice = $request->input('min_price');
    $maxPrice = $request->input('max_price');
    $pax = $request->input('Pax');

    // Perform search query
    $query = TourPackage::query();

    if ($package) {
        $query->where('package_name', 'like', '%' . $package . '%');
    }
    if ($minPrice) {
        $query->where('price', '>=', $minPrice);
    }
    if ($maxPrice) {
        $query->where('price', '<=', $maxPrice);
    }


    $tourPackages = $query->get();

    // Return a view with the search results
    return view('tourpackage_result', compact('tourPackages'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tour.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tour = new TourPackage();
        $tour->package_name = $request->name;
        $tour->description = $request->description;
        $tour->price = $request->price;
        $tour->save();

        return redirect()->route('admin')->with('success', 'Tour created successfully.');
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
    public function edit(TourPackage $tour)
    {
        return view('tour.edit', compact('tour'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TourPackage $tour)
    {
        $tour->package_name = $request->name;
        $tour->description = $request->description;
        $tour->price = $request->price;
        $tour->save();

        return redirect()->route('admin')->with('success', 'Tour updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TourPackage $tour)
    {
        $tour->delete();

        return redirect()->route('admin')->with('success', 'Tour deleted successfully.');
    }
}
