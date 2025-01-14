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

    public function mainPage()
    {
        return view('mainpage');
    }

    public function search(Request $request)
    {
        $query = Attraction::query();

        if ($request->filled('destination')) {
            $query->where('location', 'like', '%' . $request->destination . '%');
        }

        if ($request->filled('category') && $request->category !== 'anything') {
            $query->where('description', 'like', '%' . $request->category . '%');
        }

        $attractions = $query->get();
        return view('attraction', compact('attractions'));
    }

    public function create()
    {
        return view('attractions.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attraction = new Attraction();
        $attraction->name = $request->name;
        $attraction->location = $request->location;
        $attraction->description = $request->description;
        $attraction->price = $request->price;
        $attraction->save();

        return redirect()->route('admin')->with('success', 'Attraction created successfully.');
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
    public function edit(Attraction $attraction)
    {
        return view('attractions.edit', compact('attraction'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attraction $attraction)
    {
        $attraction->name = $request->name;
        $attraction->location = $request->location;
        $attraction->description = $request->description;
        $attraction->price = $request->price;
        $attraction->save();

        return redirect()->route('admin')->with('success', 'Attraction updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attraction $attraction)
    {
     $attraction->delete();

     return redirect()->route('admin')->with('success', 'Attraction deleted successfully.');
    }

}
