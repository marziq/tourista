<?php
namespace App\Http\Controllers;

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

    public function showTour(Request $request)
    {
        $tourData = [
            'package_id' => $request->package_id,
            'package_name' => $request->package_name,
            'description' => $request->description,
            'pax' => $request->pax,
            'price' => $request->price,
            'total_price' => (float) $request->total_price, // Cast to float
        ];

        return view('payment_tour', compact('tourData'));
    }

    public function showFlight(Request $request)
    {
        $flightData = [
            'flight_id' => $request->input('flight_id'),      // Flight ID
            'departure' => $request->input('departure'),     // Departure location
            'arrival' => $request->input('arrival'),         // Arrival location
            'travel_date' => $request->input('travel_date'), // Travel date
            'airline' => $request->input('airline'),         // Airline name
            'passenger' => (int)$request->passengers,
            'price' => $request->price,
            'total_price' => (float) $request->input('total_price'), // Total flight price
        ];

        return view('payment_flight', compact('flightData'));
    }
    public function showHotel(Request $request)
    {
        $hotelData = [
            'hotel_id' => $request->input('hotel_id'),       // Hotel ID
            'hotel_name' => $request->input('hotel_name'),   // Hotel Name
            'check_in' => $request->input('check_in'),       // Check In Date
            'check_out' => $request->input('check_out'),     // Check Out Date
            'pax' => (int)$request->pax,                     //pax
            'price' => $request->price,
            'total_price' => (float) $request->input('total_price'), // Total price
        ];

        return view('payment_hotel', compact('hotelData'));
    }
    // public function success()
    // {
    //     return view('payment-success');
    // }

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
        return redirect()->route('payment_tour')->with('payment_success', true);
    }

    public function processTour(Request $request)
    {
        // Validate the request
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
        $paymentHistory->quantity = $request->input('pax'); // Assuming quantity is passed in the request
        $paymentHistory->total_price = $request->input('total_price'); // Assuming total_price is passed in the request
        $paymentHistory->payment_method = $paymentMethod;
        $paymentHistory->save();

        // Set the session variable for payment success
        return redirect()->route('payment_tour')->with('payment_success', true);
    }

    public function processFlight(Request $request)
    {
        // Validate the request
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
        $paymentHistory->quantity =  (int) $request->input('passengers');
        $paymentHistory->total_price = (float) $request->input('total_price');
        $paymentHistory->payment_method = $paymentMethod;
        $paymentHistory->save();

        // Set the session variable for payment success
        return redirect()->route('payment_tour')->with('payment_success', true);

    }

    public function processHotel(Request $request)
    {
        // Validate the request
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
        $paymentHistory->quantity =  (int) $request->input('pax');
        $paymentHistory->total_price = (float) $request->input('total_price');
        $paymentHistory->payment_method = $paymentMethod;
        $paymentHistory->save();

        session()->flash('payment_success', true);
        // Set the session variable for payment success
        return redirect()->route('payment_hotel')->with('payment_success', true);
    }

    //crud
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

