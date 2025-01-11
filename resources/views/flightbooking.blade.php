@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Book Flight</h1>
    <p class="text-center">You're about to book the following flight:</p>

    <div class="card mt-4">
        <div class="card-header bg-primary text-white text-center">
            Flight Details
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Departure</th>
                    <td>{{ $flight->departure }}</td>
                </tr>
                <tr>
                    <th>Arrival</th>
                    <td>{{ $flight->arrival }}</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>{{ $flight->travel_date }}</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>${{ number_format($flight->price, 2) }}</td>
                </tr>
                @if($flight->airline)
                <tr>
                    <th>Airline</th>
                    <td>{{ $flight->airline }}</td>
                </tr>
                @endif
            </table>
        </div>
    </div>

    <form action="{{ route('flights.store') }}" method="POST" class="mt-4">
        @csrf
        <input type="hidden" name="flight_id" value="{{ $flight->id }}">
        <div class="text-center">
            <button type="submit" class="btn btn-success btn-lg">Confirm Booking</button>
            <a href="{{ route('flights.index') }}" class="btn btn-secondary btn-lg">Cancel</a>
        </div>
    </form>
</div>
@endsection
