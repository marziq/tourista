@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Search Flights</h1>
    <form action="{{ route('flights.index') }}" method="GET" class="row g-3">

        <!-- Departure -->
        <div class="col-md-6">
            <label for="departure" class="form-label">Departure</label>
            <input type="text" name="departure" id="departure" class="form-control" placeholder="From" value="{{ request()->departure }}" required>
        </div>

        <!-- Arrival -->
        <div class="col-md-6">
            <label for="arrival" class="form-label">Arrival</label>
            <input type="text" name="arrival" id="arrival" class="form-control" placeholder="To" value="{{ request()->arrival }}" required>
        </div>

        <!-- Travel Date -->
        <div class="col-md-6">
            <label for="travel_date" class="form-label">Travel Date</label>
            <input type="date" name="travel_date" id="travel_date" class="form-control" value="{{ request()->travel_date }}" required>
        </div>

        <!-- Passenger Count -->
        <div class="col-md-6">
            <label for="passenger_count" class="form-label">Passengers</label>
            <input type="number" name="passenger_count" id="passenger_count" min="1" class="form-control" placeholder="Number of Passengers" value="{{ request()->passenger_count }}" required>
        </div>

        <!-- Submit Button -->
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary">Find Flights</button>
        </div>
    </form>

    <!-- Flight Results -->
    @if(isset($flights) && $flights->isNotEmpty())
    <div class="mt-5">
        <h2 class="text-center">Available Flights</h2>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Departure</th>
                    <th>Arrival</th>
                    <th>Travel Date</th>
                    <th>Price</th>
                    <th>Airline</th>
                </tr>
            </thead>
            <tbody>
                @foreach($flights as $flight)
                <tr>
                    <td>{{ $flight->departure }}</td>
                    <td>{{ $flight->arrival }}</td>
                    <td>{{ $flight->travel_date }}</td>
                    <td>{{ $flight->price }}</td>
                    <td>{{ $flight->airline }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @elseif(isset($flights))
    <!-- No Flights Found -->
    <div class="alert alert-warning text-center mt-5">
        No flights found for your search criteria.
    </div>
    @endif
</div>
@endsection
