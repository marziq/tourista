@extends('master.layout')

@section('content')

<div class="container">
    <h2>Rental Payment</h2>

    <div class="vehicle-details">
        <img src="{{ asset($vehicles->image) }}" alt="{{ $vehicles->brand }} {{ $vehicles->model }}">
        <h3>{{ $vehicles->brand }} {{ $vehicles->model }}</h3>
        <p>Price per Day: RM {{ number_format($vehicles->price_per_day, 2) }}</p>
        <p>Total Payment: RM {{ number_format(session('total_payment'), 2) }}</p> <!-- Use session('total_payment') to display the total payment -->
    </div>

    <form action="{{ route('rentalpayment.submit') }}" method="POST">
        @csrf
        <input type="hidden" name="vehicle_id" value="{{ $vehicles->id }}">
        <input type="hidden" name="brand" value="{{ $vehicles->brand }}">
        <input type="hidden" name="model" value="{{ $vehicles->model }}">
        <input type="hidden" name="price_per_day" value="{{ $vehicles->price_per_day }}">

        <p>Pickup Date: {{ session('pickup_date') }}</p>
        <p>Return Date: {{ session('return_date') }}</p>

        <div class="customer-detail">
        <div class="form-group">
            <label for="customer_name">Customer Name</label>
            <input type="text" id="customer_name" name="customer_name" required>
        </div>

        <div class="form-group">
            <label for="bank_details">Bank Card Details</label>
            <input type="text" id="bank_details" name="bank_details" required>
        </div>
        </div>


        <button type="submit" class="btn">Proceed to Payment</button>
    </form>
</div>

@endsection
