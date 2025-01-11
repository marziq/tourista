<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attraction;
use App\Models\Flight;
use App\Models\Hotel;
use App\Models\TourPackage;
use App\Models\Rental;
use App\Models\PaymentHistory;
class PaymentController extends Controller
{
    public function show(Request $request)
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
        // dd($request->all());
        $request->validate([
            'username' => 'required|string|max:255',
            'card_number' => 'required|string|max:16',
            'expiration_date' => 'required|string|max:5',
            'cvv' => 'required|string|max:3',
            'card_holder_name' => 'required|string|max:255',
        ]);

        // Assuming the payment method is always 'Visa'
        $paymentMethod = 'Visa';

        // Create a new payment history record
        $paymentHistory = new PaymentHistory();
        $paymentHistory->username = $request->username;
        $paymentHistory->quantity = $request->input('quantity'); // Assuming quantity is passed in the request
        $paymentHistory->total_price = $request->input('total_price'); // Assuming total_price is passed in the request
        $paymentHistory->payment_method = $paymentMethod;
        $paymentHistory->save();

        // Return success response (can redirect to a success page or return a success message)
        return response()->json([
            'message' => 'Payment Successful! Your transaction has been processed.',
       ]);
    }


}
