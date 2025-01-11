@extends('master.layout')

@section('content')

<div class="container">
    @foreach ($vehicles as $vehicle)  <!-- Check if $vehicles is passed correctly -->
        <div class="card">
            <img src="{{ asset($vehicle->image) }}" alt="{{ $vehicle->brand }} {{ $vehicle->model }}">
            <h3>{{ $vehicle->brand }} {{ $vehicle->model }}</h3>
            <p>Price per Day: RM {{ number_format($vehicle->price_per_day, 2) }}</p>
            <form action="{{ route('rentalpayment') }}" method="GET">
                <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">
                <button type="submit" class="btn">Book Now</button>
            </form>
        </div>
    @endforeach
</div>

@endsection
