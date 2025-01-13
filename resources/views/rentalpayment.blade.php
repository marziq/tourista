@extends('master.layout')

@section('content')

<div class="container" style="display: flex; justify-content: center; align-items: center;  margin-top: 200px; min-height: 100vh; padding: 5px;">
    <div class="rental-payment-container" style="width: 100%; max-width: 600px; background: #f9fafb; border-radius: 10px; padding: 10px;">

        <div class="d-flex flex-wrap gap-4">
            <!-- Rental Details Section -->
            <div class="rental-details" style="flex: 1; padding: 15px; background: #ffffff; border-radius: 10px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
                <h3 style="margin-bottom: 20px; color: #34495e;">Rental Details</h3>
                <div class="vehicle-details text-center">
                    <img src="{{ asset($vehicles->image) }}" alt="{{ $vehicles->brand }} {{ $vehicles->model }}" style="width: 100%; max-width: 200px; border-radius: 10px; margin-bottom: 20px;">
                    <h4>{{ $vehicles->brand }} {{ $vehicles->model }}</h4>
                    <p><strong>Price per Day:</strong> RM {{ number_format($vehicles->price_per_day, 2) }}</p>
                    <p><strong>Total Payment:</strong> RM {{ number_format(session('total_payment'), 2) }}</p>
                    <p><strong>Pickup Date:</strong> {{ session('pickup_date') }}</p>
                    <p><strong>Return Date:</strong> {{ session('return_date') }}</p>
                </div>
            </div>

            <!-- Payment Form Section -->
            <div class="payment-form-section" style="flex: 1; padding: 15px; background: #ffffff; border-radius: 10px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
                <h5 style="margin-bottom: 20px; color: #34495e;">Payment Method</h>
                <div class="text-center mb-4">
                    <img src="{{ asset('images/visa.png') }}" alt="Visa" style="width: 70px;">
                </div>

                <form action="{{ route('rentalpayment.submit') }}" method="POST" style="display: flex; flex-direction: column; gap: 5px;">
                    @csrf
                    <!-- Hidden Fields -->
                    <input type="hidden" name="vehicle_id" value="{{ $vehicles->id }}">
                    <input type="hidden" name="brand" value="{{ $vehicles->brand }}">
                    <input type="hidden" name="model" value="{{ $vehicles->model }}">
                    <input type="hidden" name="price_per_day" value="{{ $vehicles->price_per_day }}">

                    <div class="form-group">
                        <label for="username" style="color: #34495e;">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                    </div>
                    <div class="form-group">
                        <label for="card_number" style="color: #34495e;">Card Number</label>
                        <input type="text" class="form-control" id="card_number" name="card_number" placeholder="XXXX XXXX XXXX XXXX" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="expiration_date" style="color: #34495e;">Expiration Date</label>
                                <input type="text" class="form-control" id="expiration_date" name="expiration_date" placeholder="MM/YY" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cvv" style="color: #34495e;">CVV</label>
                                <input type="text" class="form-control" id="cvv" name="cvv" placeholder="XXX" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="card_holder_name" style="color: #34495e;">Card Holder Name</label>
                        <input type="text" class="form-control" id="card_holder_name" name="card_holder_name" placeholder="John Doe" required>
                    </div>
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary" style="width: 100%; padding: 10px 8px;">Confirm Payment</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
