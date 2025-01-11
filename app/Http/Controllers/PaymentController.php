<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
