@extends('master.layout')

@section('content')
<!-- Payment Success Modal -->
@if(session('payment_success'))
<div id="paymentSuccessModal" class="modal">
    <div class="modal-content">
        <h2>Payment Successful!</h2>
        <p>Thank you for your payment. Your flight booking has been processed successfully.</p>
        <button id="closeModal" class="btn btn-primary">Close</button>
    </div>
</div>
@endif

<style>
    .payment-container {
        max-width: 800px;
        margin: 40px auto;
        padding: 20px;
        font-family: 'Roboto', sans-serif;
        margin-top: 170px; /* Adjusted value */
    }

    .payment-content {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
    }

    .payment-summary {
        flex: 1;
        background-color: #ffffff;
        padding: 30px;
        border-radius: 15px;
        color: #333;
    }

    /* Modal Styles */
    .modal {
        display: flex;
        justify-content: center;
        align-items: center;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        max-width: 400px;
        width: 100%;
    }

    .modal-content h2 {
        color: #28a745;
    }
</style>

<div class="payment-container">
    <div class="payment-content">
        <div class="payment-summary">
            <h2>Payment Summary</h2>
            <p>Flight: {{ $flightData['departure'] }} → {{ $flightData['arrival'] }}</p>
            <p>Date: {{ $flightData['travel_date'] }}</p>
            <p>Airline: {{ $flightData['airline'] }}</p>
            <p>Total Passenger: {{ $flightData['passenger'] }}</p>
            <p>Total Price: RM {{ number_format((float) $flightData['total_price'], 2) }}</p>
        </div>
        <div class="payment-form">
            <h2>Payment Details</h2>
            <form action="{{ route('payment.processFlight') }}" method="POST">
                @csrf
                <input type="hidden" name="flight_id" value="{{ $flightData['flight_id'] }}">
                <input type="hidden" name="total_price" value="{{ $flightData['total_price'] }}">
                <input type="hidden" name="passenger" value="{{ $flightData['passenger'] }}">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="card_number">Card Number</label>
                    <input type="text" id="card_number" name="card_number" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="expiration_date">Expiration Date</label>
                    <input type="text" id="expiration_date" name="expiration_date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="card_holder_name">Card Holder Name</label>
                    <input type="text" id="card_holder_name" name="card_holder_name" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Pay Now</button>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('paymentSuccessModal');
    const closeModal = document.getElementById('closeModal');

    if (modal) {
        closeModal.addEventListener('click', function () {
            modal.style.display = 'none';
            window.location.href = "/"; // Redirect to mainpage
        });
    }
});
</script>
@endsection
