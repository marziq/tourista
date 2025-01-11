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
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-bottom: 20px;
        padding: 15px;
    }


    .attraction-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 8px;
    }

    .price {
        font-size: 1.4rem;
        font-weight: bold;
        color: #28a745;
    }
</style>


<div class="home">
    <div class="home_content">
        <div class="home_title">Attractions</div>
    </div>
</div>
@if(isset($attractions))
    <div>Number of attractions: {{ $attractions->count() }}</div>
@else
    <div>No attractions variable passed to view</div>
@endif


    <div class="container mt-5">
        <div class="row">
            @forelse($attractions as $attraction)
                <div class="col-md-4 mb-4">
                    <div class="attraction-card">
                        <img src="{{ asset($attraction->image) }}" alt="{{ $attraction->name }}" class="attraction-image">
                        <div class="card-body">
                            <h4 class="mt-3">{{ $attraction->name }}</h4>
                            <p class="text-muted">{{ $attraction->location }}</p>
                            <p>{{ $attraction->description }}</p>
                            <div class="d-flex flex-column align-items-start mt-3">
                                <span class="price">From RM {{ number_format($attraction->price, 2) }}</span>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <div class="quantity-container">
                                        <span class="quantity-btn" onclick="updateQuantity('{{ $attraction->id }}', 'decrease')">-</span>
                                        <input type="number" id="quantity-{{ $attraction->id }}" class="quantity-input" value="1" min="1" onchange="updatePrice('{{ $attraction->id }}')">
                                        <span class="quantity-btn" onclick="updateQuantity('{{ $attraction->id }}', 'increase')">+</span>
                                    </div>
                                    <span id="price-{{ $attraction->id }}" class="quantity-info">RM {{ number_format($attraction->price, 2) }}</span>
                                </div>
                            </div>
                            {{-- <a href="#" class="btn btn-primary mt-3">Buy Now</a> --}}


<form action="{{ route('payment.show') }}" method="GET" class="mt-3">
    @csrf
    <input type="hidden" name="attraction_id" value="{{ $attraction->id }}">
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
</div>
@endsection
