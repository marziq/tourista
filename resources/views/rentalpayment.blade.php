@extends('master.layout')

@section('content')

<div class="container">
    <h2 class="text-center" style="margin-bottom: 30px;">Rental Payment</h2>

    <div class="rental-payment-container" style="display: flex; flex-wrap: wrap; gap: 30px;">
        <!-- Rental Details Section -->
        <div class="rental-details" style="flex: 1; padding: 20px; background: #f9fafb; border-radius: 10px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
            <h3 style="margin-bottom: 20px; color: #34495e;">Rental Details</h3>
            <div class="vehicle-details">
                <img src="{{ asset($vehicles->image) }}" alt="{{ $vehicles->brand }} {{ $vehicles->model }}" style="width: 100%; border-radius: 10px; margin-bottom: 20px;">
                <h4>{{ $vehicles->brand }} {{ $vehicles->model }}</h4>
                <p><strong>Price per Day:</strong> RM {{ number_format($vehicles->price_per_day, 2) }}</p>
                <p><strong>Total Payment:</strong> RM {{ number_format(session('total_payment'), 2) }}</p>
                <p><strong>Pickup Date:</strong> {{ session('pickup_date') }}</p>
                <p><strong>Return Date:</strong> {{ session('return_date') }}</p>
            </div>
        </div>

        <!-- Payment Form Section -->
        <div class="payment-form-section" style="flex: 1; padding: 20px; background: #ffffff; border-radius: 10px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
            <h3 style="margin-bottom: 20px; color: #34495e;">Payment Form</h3>
            <form action="{{ route('rentalpayment.submit') }}" method="POST" style="display: flex; flex-direction: column; gap: 20px;">
                @csrf
                <!-- Hidden Fields -->
                <input type="hidden" name="vehicle_id" value="{{ $vehicles->id }}">
                <input type="hidden" name="brand" value="{{ $vehicles->brand }}">
                <input type="hidden" name="model" value="{{ $vehicles->model }}">
                <input type="hidden" name="price_per_day" value="{{ $vehicles->price_per_day }}">

                <!-- Customer Name -->
                <div class="form-group">
                    <label for="customer_name" style="color: #34495e;">Customer Name</label>
                    <input type="text" id="customer_name" name="customer_name" class="form-control" placeholder="Enter your name" required>
                </div>

                <!-- Bank Card Details -->
                <div class="form-group">
                    <label for="bank_details" style="color: #34495e;">Bank Card Details</label>
                    <input type="text" id="bank_details" name="bank_details" class="form-control" placeholder="Enter your card details" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary" style="width: 100%; padding: 10px 20px;">Proceed to Payment</button>
            </form>
        </div>
    </div>
</div>

@endsection
