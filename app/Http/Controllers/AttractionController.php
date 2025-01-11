<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attraction;

class AttractionController extends Controller
{

    public function index()
    {
        // Add this line to debug
        $attractions = Attraction::all();


        return view('attraction', compact('attractions'));
    }


    public function search(Request $request)
    {
        $query = Attraction::query();

        // Filter by destination (location)
        if ($request->filled('destination')) {
            $query->where('location', 'like', '%' . $request->destination . '%');
        }


        $attractions = $query->get();

        return view('attraction', compact('attractions'));
    }
    public function mainPage()
    {
        return view('mainpage');
    }


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
