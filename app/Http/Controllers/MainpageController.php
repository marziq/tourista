<?php

namespace App\Http\Controllers;

use App\Models\TourPackage;
use Illuminate\Http\Request;

class MainpageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch tour packages
        $tourPackages = TourPackage::all();

        // Pass tour packages to the view
        return view('mainpage', compact('tourPackages'));
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
