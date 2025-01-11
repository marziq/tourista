<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attraction;
use App\Models\Flight;
use App\Models\Hotel;
use App\Models\TourPackage;
use App\Models\Rental;

class PaymentController extends Controller
{
    public function show(Request $request, $type, $id)
    {
        // Fetch the relevant data based on the type and id
        switch ($type) {
            case 'attraction':
                $purchaseData = Attraction::find($id);
                break;
            case 'flight':
                $purchaseData = Flight::find($id);
                break;
            case 'hotel':
                $purchaseData = Hotel::find($id);
                break;
            case 'tour-package':
                $purchaseData = TourPackage::find($id);
                break;
            case 'rental':
                $purchaseData = Rental::find($id);
                break;
            default:
                abort(404);
        }

        // Pass the purchase data to the view
        return view('payment', compact('purchaseData', 'type'));
    }

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

    public function success()
    {
        return view('payment-success');
    }
}
