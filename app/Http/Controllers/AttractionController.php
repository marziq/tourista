<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attraction;

class AttractionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)

    {
        // Static attractions data
        $attractions = [
            [
                'place' => 'Berjaya Times Square',
                'description' => 'An adventurous trek with beautiful views.',
                'price' => '50.00',
                'rating' => 4.5,
                'image' => 'images/BerjayaTimesSquare.jpg',
            ],
            [
                'place' => 'Kidzania',
                'description' => 'A serene beach with golden sand.',
                'price' => '30.00',
                'rating' => 4.0,
                'image' => 'images/Kidzania.jpg',
            ],
            [
                'place' => 'Skyline Luge',
                'description' => 'A serene beach with golden sand.',
                'price' => '30.00',
                'rating' => 4.0,
                'image' => 'images/Skyline.jpg',
            ],
            [
                'place' => 'Genting Skyworlds Theme Park',
                'description' => 'A serene beach with golden sand.',
                'price' => '30.00',
                'rating' => 4.0,
                'image' => 'images/Genting.jpg',
            ],
            [
                'place' => 'Sunway Lagoon Theme Park',
                'description' => 'A serene beach with golden sand.',
                'price' => '30.00',
                'rating' => 4.0,
                'image' => 'images/sunwayy.jpg',
            ],
            [
                'place' => 'District 21',
                'description' => 'A serene beach with golden sand.',
                'price' => '30.00',
                'rating' => 4.0,
                'image' => 'images/District.jpg',
            ],
            [
                'place' => 'Cultural Heritage Museum',
                'description' => 'Explore the rich cultural history.',
                'price' => '20.00',
                'rating' => 4.7,
                'image' => 'images/BerjayaTimesSquare.jpg',
            ],
        ];

        // Retrieve category from the request
        $category = $request->input('category'); // e.g., 'adventure', 'beach'

        // Filter attractions based on category
        if ($category) {
            if ($category === 'themes park') {
                $attractions = array_filter($attractions, function ($attraction) {
                    return stripos($attraction['place'], 'Berjaya') !== false ||
                           stripos($attraction['place'], 'Kidzania') !== false ||
                           stripos($attraction['place'], 'Skyline') !== false||
                           stripos($attraction['place'], 'Genting') !== false ||
                           stripos($attraction['place'], 'Sunway') !== false ||
                           stripos($attraction['place'], 'District') !== false ;
                });
            } elseif ($category === 'museum') {
                $attractions = array_filter($attractions, function ($attraction) {
                    return stripos($attraction['place'], 'Pantai') !== false;
                });
            }
        }

        // Convert the filtered results to a collection
        $attractions = collect($attractions);

        // Pass the data to the view
        return view('attraction', compact('attractions'));
    }
public function bookingAttraction(Request $request)
{
    $details = [
        'place' => $request->input('place'),
        'description' => $request->input('description'),
        'price' => $request->input('price'),
        'rating' => $request->input('rating'),
        'quantity' => $request->input('quantity'),
        'image' => $request->input('image'), // Ensure this is passed
        'total_price' => $request->input('price') * $request->input('quantity')
    ];

    return view('bookingattraction', compact('details'));
}



public function paymentBooking(Request $request)
{
    $paymentDetails = [
        'place' => $request->input('place'),
        'description' => $request->input('description'),
        'price' => $request->input('price'),
        'quantity' => $request->input('quantity'),
        'total_price' => $request->input('total_price'),
    ];

    return view('paymentbooking', compact('paymentDetails'));
}
public function completePayment(Request $request)
{
    // Logic to store payment details or process payment
    // Example: Store in database

    Attraction::create([

        'place' => $request->input('place'),
        'quantity' => $request->input('quantity'),
        'total_price' => $request->input('total_price'),
    ]);

    return redirect()->route('attractions.index')->with('success', 'Payment completed successfully!');
}

    /**
     * Store a new attraction
     */
    public function store(Request $request)
    {
        $request->validate([
            'place' => 'required|string|max:255',
            'quantity_ticket' => 'required|integer|min:1',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'rating' => 'required|numeric|min:0|max:5',
        ]);

        Attraction::create($request->all());

        return redirect()->route('attractions.index')->with('success', 'Attraction added successfully!');
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
    public function storeNew(Request $request)
    {
        // Logic for storing new attraction, if needed.
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
}
