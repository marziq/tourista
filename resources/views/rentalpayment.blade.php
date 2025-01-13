@extends('master.layout')

@section('content')

<div class="container">
    <h2>Rental Payment</h2>

    <form action="{{ route('rentalpayment.submit') }}" method="POST">
        @csrf
        <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">

        <div class="form-group">
            <label for="pickup_date">Pick-up Date</label>
            <input type="date" id="pickup_date" name="pickup_date" required>
        </div>

        <div class="form-group">
            <label for="return_date">Return Date</label>
            <input type="date" id="return_date" name="return_date" required>
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" id="location" name="location" required>
        </div>

        <button type="submit" class="btn">Proceed to Payment</button>
    </form>
</div>

@endsection
