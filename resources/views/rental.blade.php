@extends('master.layout')

@section('content')

<style>
    .vehicle-container {
        margin-top: 200px;
        padding: 20px;
    }

    .vehicle-card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        text-align: center;
        background: #fff;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .vehicle-card:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .vehicle-card img {
        width: 100%;
        max-width: 300px;
        height: 200px;
        object-fit: cover;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .vehicle-card h3 {
        font-size: 1.5rem;
        margin-bottom: 15px;
        color: #333;
    }

    .vehicle-card p {
        font-size: 1.1rem;
        color: #666;
        margin-bottom: 20px;
    }

    .vehicle-card .btn {
        background-color: #006400;
        color: #fff;
        padding: 12px 24px;
        border: none;
        border-radius: 5px;
        font-size: 1.1rem;
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
        flex-wrap: wrap; /* Allows items to wrap into a new line if needed */
        gap: 20px; /* Space between columns */
        justify-content: center;
    }

    .vehicle-col {
        flex: 1 1 calc(25% - 20px); /* Each column takes 25% of the row minus gaps */
        max-width: calc(25% - 20px); /* Ensures 4 columns fit in a row */
        display: flex;
        justify-content: center;
    }


    .image{
        width: 100%;
        max-width: 200px;
    }

    @media (max-width: 1200px) {
    .vehicle-col {
        flex: 1 1 calc(33.333% - 20px); /* 3 cards per row */
        max-width: calc(33.333% - 20px);
    }
}

@media (max-width: 768px) {
    .vehicle-col {
        flex: 1 1 calc(50% - 20px); /* 2 cards per row */
        max-width: calc(50% - 20px);
    }
}

@media (max-width: 576px) {
    .vehicle-col {
        flex: 1 1 100%; /* 1 card per row */
        max-width: 100%;
    }
}

</style>

<div class="vehicle-container">
    <div class="vehicle-row">
        @foreach ($vehicles as $vehicle)
            <div class="vehicle-col">
                <div class="vehicle-card">
                    <img src="{{ asset($vehicle->image) }}" alt="{{ $vehicle->brand }} {{ $vehicle->model }}">
                    <div class="card-content">
                        <h3>{{ $vehicle->brand }} {{ $vehicle->model }}</h3>
                        <p>From RM {{ number_format($vehicle->price_per_day, 2) }}</p>
                        <form action="{{ route('rentalpayment') }}" method="GET" style="margin-top: 10px;">
                            <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">
                            <button type="submit" class="btn">Book Now</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
