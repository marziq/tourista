<?php
namespace App\Http\Controllers;
use App\Models\Payment;
use App\Models\PaymentHistory;
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
            'total_price' => $request->total_price,
        ];


        return view('payment', compact('purchaseData'));
    }




    public function process(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'card_number' => 'required|string|regex:/^\d{4}\s?\d{4}\s?\d{4}\s?\d{4}$/',
            'expiration_date' => 'required|string|regex:/^\d{2}\/\d{2}$/',
            'cvv' => 'required|string|size:3',
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
        return redirect()->route('profile.show')->with('success', 'Payment Successful! Your transaction has been processed.');
    }
    public function profile()
    {
        $payments = PaymentHistory::all(); // Fetch all payment history records
        return view('profile', compact('payments')); // Pass $payments to the profile view
    }


    public function destroy($id)
{
    $payment = PaymentHistory::find($id); // Use PaymentHistory instead of Payment


    if ($payment) {
        $payment->delete();
        return response()->json(['success' => true]);
    } else {
        return response()->json(['success' => false, 'message' => 'Payment not found']);
    }
}
public function update(Request $request, $id)
{
    $payment = PaymentHistory::find($id);




    if ($payment) {
        $payment->username = $request->username;
        $payment->quantity = $request->quantity;
        $payment->total_price = $request->total_price;
        $payment->payment_method = $request->payment_method;
        $payment->save();


        return response()->json(['success' => true]);
    }


    return response()->json(['success' => false], 404);
}


}



