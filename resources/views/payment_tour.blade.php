@extends('master.layout')

@section('content')
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
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        border: 1px solid #dcdcdc;
        animation: fadeIn 0.5s ease-in-out;
    }

    .payment-form-container {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .purchase-details-header {
        text-align: center;
        margin-bottom: 30px;
        padding-bottom: 15px;
        border-bottom: 3px solid #007bff;
    }

    .purchase-details-header h4 {
        color: #2c3e50;
        font-size: 1.8rem;
        font-weight: 700;
        margin: 0;
    }

    .purchase-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding: 15px 20px;
        background-color: #f9fafb;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .purchase-row:hover {
        transform: translateX(10px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
    }

    .purchase-label {
        font-weight: 600;
        color: #34495e;
        font-size: 1.2rem;
    }

    .purchase-value {
        color: #34495e;
        font-size: 1.2rem;
        font-weight: 500;
    }

    .details-divider {
        height: 2px;
        background: linear-gradient(to right, #ffffff, #007bff, #ffffff);
        margin: 20px 0;
    }

    .payment-methods {
        display: flex;
        justify-content: space-around;
        margin: 20px 0;
    }

    .payment-method {
        padding: 10px;
        cursor: pointer;
        border: 2px solid transparent;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .payment-method img {
        height: 40px;
    }

    .payment-method:hover,
    .payment-method.selected {
        border: 2px solid #007bff;
        background-color: #f1f9ff;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        border-radius: 8px;
        padding: 10px 20px;
        font-size: 1.2rem;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
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
        <!-- Payment Summary -->
        <div class="payment-summary">
            <div class="purchase-details-header">
                <h4>Payment Summary</h4>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="purchase-row">
                        <span class="purchase-label">
                            <i class="fas fa-ticket-alt me-2"></i>Package
                        </span>
                        <span class="purchase-value">{{ $tourData['package_name'] }}</span>
                    </div>
                    {{-- <div class="purchase-row">
                        <span class="purchase-label">
                            <i class="fas fa-map-marker-alt me-2"></i>Description
                        </span>
                        <span class="purchase-value" id="tourDescriptionShort">
                            {{ Str::limit($tourData['description'], 100) }} <!-- Show only the first 100 characters -->
                            <a href="javascript:void(0);" id="toggleDescription" style="color: #007bff; font-weight: bold;">(Click to view full)</a>
                        </span>
                        <span id="tourDescriptionFull" style="display: none;">
                            {{ $tourData['description'] }} <!-- Full description -->
                        </span>
                    </div> --}}
                    <div class="purchase-row">
                        <span class="purchase-label">
                            <i class="fas fa-users me-2"></i>Pax
                        </span>
                        <span class="purchase-value">{{ $tourData['pax'] }} people</span>
                    </div>
                    <div class="details-divider"></div>
                    <div class="total-price-container">
                        <div class="total-price">
                            <span class="purchase-label">Total Price</span>
                            <span class="purchase-value">RM {{ number_format((float) $tourData['total_price'], 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Form -->
        <div class="payment-form-container">
            <h4 style="color: #34495e;">Payment Method</h4>
            <div class="payment-methods">
                <div class="payment-method selected">
                    <img src="{{ asset('images/visa.png') }}" alt="Visa">
                </div>
            </div>
            <form action="{{ route('payment.processTour') }}" method="POST" class="payment-form">
                @csrf
                <input type="hidden" name="package_id" value="{{ $tourData['package_id'] }}">
                <input type="hidden" name="pax" value="{{ $tourData['pax'] }}">
                <input type="hidden" name="total_price" value="{{ $tourData['total_price'] }}">

                <div class="form-group">
                    <label for="username" style="color: #34495e;">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                </div>
                <div class="form-group">
                    <label for="card_number" style="color: #34495e;">Card Number</label>
                    <input type="text" class="form-control" id="card_number" name="card_number"
                           placeholder="XXXX XXXX XXXX XXXX" required>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="expiration_date" style="color: #34495e;">Expiration Date</label>
                            <input type="text" class="form-control" id="expiration_date" name="expiration_date"
                                   placeholder="MM/YY" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cvv" style="color: #34495e;">CVV</label>
                            <input type="text" class="form-control" id="cvv" name="cvv"
                                   placeholder="XXX" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="card_holder_name" style="color: #34495e;">Card Holder Name</label>
                    <input type="text" class="form-control" id="card_holder_name" name="card_holder_name"
                           placeholder="John Doe" required>
                </div>

                <button type="submit" id="confirmPayment" class="btn btn-primary btn-block">Confirm Payment</button>
            </form>
        </div>
    </div>
</div>

<!-- Payment Success Modal -->
@if(session('payment_success'))
<div id="paymentSuccessModal" class="modal">
    <div class="modal-content">
        <h2>Payment Successful!</h2>
        <p>Thank you for your payment. Your transaction has been processed successfully.</p>
        <button id="closeModal" class="btn btn-primary">Close</button>
    </div>
</div>
@endif

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
