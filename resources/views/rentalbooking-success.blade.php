@extends('master.layout')

@section('content')

<div class="container">
    <h2>Booking Successful</h2>
    <p>Your rental booking has been confirmed. Thank you!</p>

    <!-- Booking Details -->
    <div class="booking-details">
        <p>Location: {{ session('location') }}</p>
        <p>Pickup Date: {{ session('pickup_date') }}</p>
        <p>Return Date: {{ session('return_date') }}</p>
        <p>Total Payment: RM {{ session('total_payment') }}</p>
    </div>

    <!-- Vehicle Details -->
    <div class="vehicle-details">
        <h3>Vehicle Details:</h3>
        <img src="{{ session('vehicle_image') }}" alt="{{ session('vehicle_brand') }} {{ session('vehicle_model') }}" style="width: 200px;">
        <p>Brand: {{ session('brand') }}</p>
        <p>Model: {{ session('model') }}</p>
    </div>
</div>

@endsection

