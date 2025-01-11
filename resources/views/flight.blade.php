@extends('layouts.master')
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
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        border: none;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
        height: 100%;
    }

    .flight-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .card-body {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
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
        flex-grow: 1;
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

    .row {
        display: flex;
        flex-wrap: wrap;
    }

    .col-md-4 {
        display: flex;
    }
</style>

<div class="home">
    <div class="home_content">
        <div class="home_title">Flights</div>
    </div>
</div>

<div class="fullcontainer">
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
                        <div class="card-body">
                            <h4 class="mt-3">{{ $flight->flight_type }}</h4>
                            <p class="text-muted">{{ $flight->destination }}</p>
                            <p>{{ $flight->description }}</p>
                            <span class="price">From RM {{ number_format($flight->price, 2) }}</span>
                            <form action="{{ route('payment.show') }}" method="POST" class="mt-3">
                                @csrf
                                <input type="hidden" name="flight_id" value="{{ $flight->id }}">
                                <input type="hidden" name="flight_type" value="{{ $flight->flight_type}}">
                                <input type="hidden" name="destination" value="{{ $flight->destination }}">
                                <input type="hidden" name="price" value="{{ $flight->price }}">
                                <button type="submit" class="btn btn-primary">Book Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-danger">No flights found.</div>
                </div>
            @endforelse
        </div>
    </div>
</div>


<script>


    function updateQuantity(attractionId, action) {
        let quantityInput = document.getElementById('quantity-' + attractionId);
        let quantity = parseInt(quantityInput.value);


        if (action === 'increase') {
            quantity++;
        } else if (action === 'decrease' && quantity > 1) {
            quantity--;
        }


        quantityInput.value = quantity;
        updatePrice(attractionId);
    }


    function updatePrice(attractionId) {
    let quantity = document.getElementById('quantity-' + attractionId).value;
    let price = parseFloat('{{ $attraction->price }}');
    let totalPrice = price * quantity;


    document.getElementById('price-' + attractionId).textContent = 'RM ' + totalPrice.toFixed(2);


    // Update hidden inputs for form submission
    document.getElementById('quantity-input-' + attractionId).value = quantity;
    document.getElementById('total-price-' + attractionId).value = totalPrice.toFixed(2);
}
</script>


@endsection

