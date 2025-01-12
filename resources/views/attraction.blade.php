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

    .attraction-card {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .attraction-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .attraction-image {
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

    .quantity-container {
        display: flex;
        align-items: center;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 5px;
        margin-top: 10px;
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
    }

    .quantity-info {
        font-size: 1.1rem;
        margin-left: 10px;
        font-weight: bold;
    }
</style>

<div class="home">
    <div class="home_content">
        <div class="home_title">Attractions</div>
    </div>
</div>

@if(isset($attractions))
    <div class="container mt-4">
        <div class="alert alert-info">Number of attractions: {{ $attractions->count() }}</div>
    </div>
@else
    <div class="container mt-4">
        <div class="alert alert-warning">No attractions variable passed to view.</div>
    </div>
@endif

<div class="container mt-5">
    <div class="row">
        @forelse($attractions as $attraction)
            <div class="col-md-4 mb-4">
                <div class="attraction-card">
                    <img src="{{ asset($attraction->image) }}" alt="{{ $attraction->name }}" class="attraction-image">
                    <div class="card-body">
                        <h4>{{ $attraction->name }}</h4>
                        <p class="text-muted">{{ $attraction->location }}</p>
                        <p>{{ $attraction->description }}</p>
                        <div class="d-flex flex-column align-items-start mt-3">
                            <span class="price">From RM {{ number_format($attraction->price, 2) }}</span>
                            <div class="quantity-container mt-3" data-price="{{ $attraction->price }}">
                                <span class="quantity-btn" onclick="updateQuantity('{{ $attraction->id }}', 'decrease')">-</span>
                                <input type="number" id="quantity-{{ $attraction->id }}" class="quantity-input" value="1" min="1" onchange="updateTotalPrice('{{ $attraction->id }}')">
                                <span class="quantity-btn" onclick="updateQuantity('{{ $attraction->id }}', 'increase')">+</span>
                            </div>
                            <span id="price-{{ $attraction->id }}" class="quantity-info">RM {{ number_format($attraction->price, 2) }}</span>
                        </div>
                        <form action="{{ route('payment.show', ['type' => 'attraction', 'id' => $attraction->id]) }}" method="GET" class="mt-3">
                            @csrf
                            <input type="hidden" name="attraction_name" value="{{ $attraction->name }}">
                            <input type="hidden" name="location" value="{{ $attraction->location }}">
                            <input type="hidden" name="price" value="{{ $attraction->price }}">
                            <input type="hidden" name="quantity" id="quantity-input-{{ $attraction->id }}" value="1">
                            <input type="hidden" name="total_price" id="total-price-{{ $attraction->id }}" value="{{ $attraction->price }}">
                            <button type="submit" class="btn btn-primary">Buy Now</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-danger">No attractions found.</div>
            </div>
        @endforelse
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
        updateTotalPrice(attractionId);
    }

    function updateTotalPrice(attractionId) {
        let quantityElement = document.querySelector('#quantity-' + attractionId);
        let priceElement = quantityElement.closest('.quantity-container');
        let pricePerUnit = parseFloat(priceElement.dataset.price);
        let quantity = parseInt(quantityElement.value);

        let totalPrice = pricePerUnit * quantity;

        // Update display and form inputs
        document.getElementById('price-' + attractionId).textContent = 'RM ' + totalPrice.toFixed(2);
        document.getElementById('quantity-input-' + attractionId).value = quantity;
        document.getElementById('total-price-' + attractionId).value = totalPrice.toFixed(2);
    }
</script>

@endsection
