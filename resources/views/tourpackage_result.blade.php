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

    .tour-card {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .tour-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .tour-image {
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
    .pax-style {
        font-size: 16px;
        color: #4706fa;
        margin: 10px 0;
    }
</style>

<div class="home">
    <div class="home_content">
        <div class="home_title">Tour Packages</div>
    </div>
</div>

@if(isset($tourPackages))
    <div class="container mt-4">
        <div class="alert alert-info">Number of tour packages: {{ $tourPackages->count() }}</div>
    </div>
@else
    <div class="container mt-4">
        <div class="alert alert-warning">No tour packages variable passed to view.</div>
    </div>
@endif

<div class="container mt-5">
    <div class="row">
        @forelse($tourPackages as $tourPackage)
            <div class="col-md-4 mb-4">
                <div class="tour-card">
                    <img src="{{ asset($tourPackage->image) }}" alt="{{ $tourPackage->package_name }}" class="tour-image">                    <div class="card-body">
                        <h4>{{ $tourPackage->package_name }}</h4>
                        <p class="text-muted">{{ $tourPackage->location }}</p>
                        <p>{{ $tourPackage->description }}</p>
                        <div class="d-flex flex-column align-items-start mt-3">
                            <span class="price">From RM {{ number_format($tourPackage->price, 2) }}</span>
                            <p class="pax-style">Pax</p>
                            <div class="quantity-container mt-3" data-price="{{ $tourPackage->price }}">
                                <span class="quantity-btn" onclick="updateQuantity('{{ $tourPackage->id }}', 'decrease')">-</span>
                                <input type="number" id="quantity-{{ $tourPackage->id }}" class="quantity-input" value="1" min="1" onchange="updateTotalPrice('{{ $tourPackage->id }}')">
                                <span class="quantity-btn" onclick="updateQuantity('{{ $tourPackage->id }}', 'increase')">+</span>
                            </div>
                            <span id="price-{{ $tourPackage->id }}" class="quantity-info">RM {{ number_format($tourPackage->price, 2) }}</span>
                        </div>
                        <form action="{{ route('payment_tour') }}" method="GET" class="mt-3">
                            @csrf
                            <input type="hidden" name="package_id" value="{{ $tourPackage->id }}">
                            <input type="hidden" name="package_name" value="{{ $tourPackage->package_name }}">
                            <input type="hidden" name="description" value="{{ $tourPackage->description }}">
                            <input type="hidden" name="pax" id="quantity-input-{{ $tourPackage->id }}" value="1">
                            <input type="hidden" name="price" value="{{ $tourPackage->price }}">
                            <input type="hidden" name="total_price" id="total-price-{{ $tourPackage->id }}" value="{{ $tourPackage->price }}">
                            <button type="submit" class="btn btn-primary">Book Now</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-danger">No tour packages found.</div>
            </div>
        @endforelse
    </div>
</div>

<script>
    function updateQuantity(tourPackageId, action) {
        let quantityInput = document.getElementById('quantity-' + tourPackageId);
        let quantity = parseInt(quantityInput.value);

        if (action === 'increase') {
            quantity++;
        } else if (action === 'decrease' && quantity > 1) {
            quantity--;
        }

        quantityInput.value = quantity;
        updateTotalPrice(tourPackageId);
    }

    function updateTotalPrice(tourPackageId) {
        let quantityElement = document.querySelector('#quantity-' + tourPackageId);
        let priceElement = quantityElement.closest('.quantity-container');
        let pricePerUnit = parseFloat(priceElement.dataset.price);
        let quantity = parseInt(quantityElement.value);

        let totalPrice = pricePerUnit * quantity;

        // Update display and form inputs
        document.getElementById('price-' + tourPackageId).textContent = 'RM ' + totalPrice.toFixed(2);
        document.getElementById('quantity-input-' + tourPackageId).value = quantity;
        document.getElementById('total-price-' + tourPackageId).value = totalPrice.toFixed(2);
    }
</script>

@endsection
