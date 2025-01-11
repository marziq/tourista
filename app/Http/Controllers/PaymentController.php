<?php
namespace App\Http\Controllers;
use App\Models\PaymentHistory;

use Illuminate\Http\Request;
use App\Models\Attraction;
use App\Models\Flight;
use App\Models\Hotel;
use App\Models\TourPackage;
use App\Models\Rental;
use App\Models\PaymentHistory;
class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchaseData = [
            'attraction_name' => $request->attraction_name,
            'location' => $request->location,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'total_price' => $request->total_price
        ];

        return view('payment', compact('purchaseData'));
    }
    // public function success()
    // {
    //     return view('payment-success');
    // }
    public function process(Request $request)
    {
        // Validate the payment form
        $request->validate([
            'card_number' => 'required|string|size:19',
            'expiration_date' => 'required|string|size:5',
            'cvv' => 'required|string|size:3',
            'card_holder_name' => 'required|string'
        ]);


        // Process payment logic here


        // Redirect to success page or show error
        return redirect()->route('payment.success');
    }

}
