@extends('layouts.app')

@section('content')
    <h1>Flight Search Results</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if($flights->isEmpty())
        <p>No flights found matching your search criteria.</p>
    @else
        <div class="results_container">
            <div class="flights_list">
                @foreach($flights as $flight)
                <div class="flight_card">
                    <!-- Ensure the image path is correct -->
                    <img src="{{ asset('storage/flights/' . $flight->image) }}" alt="Flight Image" class="flight_image">
                    <div class="flight_details">
                        <h2>{{ $flight->departure }} to {{ $flight->arrival }}</h2>
                        <p>Date: {{ $flight->travel_date }}</p>
                        <p>Price: RM {{ number_format($flight->price, 2) }}</p>
                        <p>Airline: {{ $flight->airline }}</p>
                        <a href="{{ route('flights.book', $flight->id) }}" class="btn btn-primary">Book Now</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @endif
@endsection

<style>
.results_container {
    padding: 20px;
}
.flights_list {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}
.flight_card {
    border: 1px solid #ddd;
    border-radius: 10px;
    overflow: hidden;
    width: 300px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
.flight_image {
    width: 100%;
    height: 200px;
    object-fit: cover;
}
.flight_details {
    padding: 15px;
}
.flight_details h2 {
    margin: 0 0 10px;
}
</style>
