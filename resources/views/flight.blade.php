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

    .flight-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
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

    .quantity-container {
        display: flex;
        align-items: center;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 5px;
    }

    .quantity-btn {
        font-size: 1.5rem;
        margin: 0 10px;
        cursor: pointer;
        padding: 5px 10px;
        background-color: #f1f1f1;
        border-radius: 50%;
        border: 1px solid #ccc;
        transition: background-color 0.2s;
    }

    .quantity-btn:hover {
        background-color: #007bff;
        color: white;
    }

    .quantity-input {
        width: 50px;
        text-align: center;
        font-size: 1.2rem;
        border: none;
        background-color: #fff;
    }

    .quantity-info {
        font-size: 1.1rem;
        margin-left: 10px;
        font-weight: bold;
        color: black;
    }
</style>

<div class="home">
    <div class="home_content">
        <div class="home_title">Flights</div>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        @foreach ($flights as $flight)
            <div class="col-md-4 mb-4">
                <div class="flight-card">
                    <img src="{{ $flight['image'] }}" alt="{{ $flight['departure'] }} to {{ $flight['arrival'] }}" class="flight-image">
                    <div class="card-body">
                        <h4 class="mt-3">{{ $flight['departure'] }} to {{ $flight['arrival'] }}</h4>
                        <p class="text-muted">Airline: {{ $flight['airline'] }}</p>
                        <p>Travel Date: {{ $flight['travel_date'] }}</p>
                        <div class="d-flex flex-column align-items-start mt-3">
                            <span class="price">From RM {{ number_format($flight['price'], 2) }}</span>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div class="quantity-container">
                                    <span class="quantity-btn" onclick="updateQuantity('{{ $loop->index }}', 'decrease')">-</span>
                                    <input type="number" id="quantity-{{ $loop->index }}" class="quantity-input" value="1" min="1" onchange="updatePrice('{{ $loop->index }}', {{ $flight['price'] }})">
                                    <span class="quantity-btn" onclick="updateQuantity('{{ $loop->index }}', 'increase')">+</span>
                                </div>
                                <span id="price-{{ $loop->index }}" class="quantity-info">RM {{ number_format($flight['price'], 2) }}</span>
                            </div>
                        </div>
                        <form action="{{ route('flightpayment') }}" method="POST" class="mt-3">
                            @csrf
                            <input type="hidden" name="departure" value="{{ $flight['departure'] }}">
                            <input type="hidden" name="arrival" value="{{ $flight['arrival'] }}">
                            <input type="hidden" name="price" value="{{ $flight['price'] }}">
                            <input type="hidden" name="quantity" id="quantity-input-{{ $loop->index }}" value="1">
                            <input type="hidden" name="total_price" id="total-price-{{ $loop->index }}" value="{{ $flight['price'] }}">
                            <button type="submit" class="btn btn-primary">Book Now</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    function updateQuantity(index, action) {
        let quantityInput = document.getElementById('quantity-' + index);
        let quantity = parseInt(quantityInput.value);

        if (action === 'increase') {
            quantity++;
        } else if (action === 'decrease' && quantity > 1) {
            quantity--;
        }

        quantityInput.value = quantity;
        updatePrice(index, parseFloat('{{ json_encode(array_column($flights, "price")) }}'[index]));
    }

    function updatePrice(index, price) {
        let quantity = document.getElementById('quantity-' + index).value;
        let totalPrice = price * quantity;

        document.getElementById('price-' + index).textContent = 'RM ' + totalPrice.toFixed(2);

        // Update hidden inputs for form submission
        document.getElementById('quantity-input-' + index).value = quantity;
        document.getElementById('total-price-' + index).value = totalPrice.toFixed(2);
    }
</script>

@endsection
