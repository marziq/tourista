@extends('master.layout')
@section('content')

<style>
    .home {
        position: relative;
        height: 150px;
        background-color: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .home_title {
        font-size: 3rem;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #333;
    }

    .flight-card {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .flight-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .flight-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .card-body {
        padding: 15px;
        background-color: #fff;
    }

    .card-body h4 {
        font-size: 1.5rem;
        font-weight: bold;
        color: #343a40;
    }

    .card-body p {
        color: #6c757d;
        margin: 5px 0;
    }

    .price {
        font-size: 1.4rem;
        font-weight: bold;
        color: #28a745;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        padding: 8px 16px;
        font-size: 0.9rem;
        text-transform: uppercase;
        border-radius: 20px;
        transition: background-color 0.3s, transform 0.3s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        transform: scale(1.05);
    }
</style>

<div class="home">
    <div class="home_content">
        <div class="home_title">Flight Results</div>
    </div>
</div>

@if(isset($flights))
    <div class="container mt-4">
        <div class="alert alert-info">Number of flights: {{ $flights->count() }}</div>
    </div>
@else
    <div class="container mt-4">
        <div class="alert alert-warning">No flights variable passed to view.</div>
    </div>
@endif

<div class="container mt-5">
    <div class="row">
        @forelse($flights as $flight)
            <div class="col-md-4 mb-4">
                <div class="flight-card">
                    <img src="{{ asset($flight->image) }}" alt="Flight Image" class="flight-image">
                    <div class="card-body">
                        <h4>{{ $flight->departure }} to {{ $flight->arrival }}</h4>
                        <p class="text-muted">Date: {{ $flight->travel_date }}</p>
                        <p>Airline: {{ $flight->airline }}</p>
                        <span class="price">RM {{ number_format($flight->price, 2) }} per pax</span>
                        <form action="{{ route('flights.show') }}" method="GET" class="mt-3">
                            @csrf
                            <input type="hidden" name="airline" value="{{ $flight->airline }}">
                            <input type="hidden" name="departure" value="{{ $flight->departure }}">
                            <input type="hidden" name="arrival" value="{{ $flight->arrival }}">
                            <input type="hidden" name="travel_date" value="{{ $flight->travel_date }}">
                            <input type="hidden" name="price" value="{{ $flight->price }}">
                            <input type="hidden" name="passengers" value="{{ $passengers }}"> <!-- Passed from the main page -->
                            <input type="hidden" name="total_price" value="{{ $flight->price * $passengers }}">
                            <button type="submit" class="btn btn-primary">Book Now</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-danger">No flights found matching your criteria.</div>
            </div>
        @endforelse
    </div>
</div>

<!-- End of content -->
 
@endsection

