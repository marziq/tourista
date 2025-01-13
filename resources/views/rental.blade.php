@extends('master.layout')

@section('content')

<style>
    .vehicle-container {
        margin-top: 20px;
    }

    .vehicle-card {
        border: none;
        border-radius: 10px !important;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1) !important;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        text-align: center;
        margin-bottom: 20px;
        background: #fff;
    }

    .vehicle-card:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .vehicle-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-bottom: 1px solid #ddd;
    }

    .vehicle-card h3 {
        font-size: 1.25rem;
        margin: 15px 0;
        color: #333;
    }

    .vehicle-card p {
        font-size: 1rem;
        color: #666;
        margin-bottom: 15px;
    }

    .vehicle-card .btn {
        background-color: #006400;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 1rem;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .vehicle-card .btn:hover {
        background-color: #004d00;
    }

    /* Grid Layout */
    .vehicle-row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .vehicle-col {
        flex: 1 1 calc(33.333% - 20px);
        max-width: calc(33.333% - 20px);
    }

    @media (max-width: 768px) {
        .vehicle-col {
            flex: 1 1 calc(50% - 20px);
            max-width: calc(50% - 20px);
        }
    }

    @media (max-width: 576px) {
        .vehicle-col {
            flex: 1 1 100%;
            max-width: 100%;
        }
    }
</style>

<div class="home">
    <div class="home_content">
        <div class="home_title">Rental</div>
    </div>
</div>

<div class="vehicle-container">

    @foreach ($vehicles as $vehicle)
        <div class="vehicle-card">
            <img src="{{ asset($vehicle->image) }}" alt="{{ $vehicle->brand }} {{ $vehicle->model }}">
            <div class="card-content">
                <h3>{{ $vehicle->brand }} {{ $vehicle->model }}</h3>
                <p>From RM {{ number_format($vehicle->price_per_day, 2) }}</p>
                <form action="{{ route('rentalpayment') }}" method="GET">
                    <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">
                    <button type="submit" class="btn">Book Now</button>
                </form>
            </div>
        </div>
    @endforeach

</div>

<div>TEST - Is this showing?</div>


@endsection
