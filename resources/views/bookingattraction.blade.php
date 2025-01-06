@extends('master.layout')

@section('content')

<style>
    .home {
        position: relative;
        height:150px; /* Adjust height as needed */
        background-color: #f8f9fa; /* Optional: Background color in case the image doesn't load */
    }

    .home_title {
        font-size: 3rem; /* Adjust font size */
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase; /* Optional: Uppercase title */
    }

    .price {
        font-size: 1.2rem;
        font-weight: bold;
    }

    .quantity-control {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .quantity-control button {
        width: 30px;
        height: 30px;
        border: 1px solid #ddd;
        background-color: #fff;
        font-size: 18px;
        cursor: pointer;
    }

    .quantity-control input {
        width: 50px;
        height: 30px;
        text-align: center;
        border: 1px solid #ddd;
        margin: 0 5px;
    }

    /* Styling for the image */
    .attraction-image {
        width: 100%;  /* Make the image fill the container */
        height: auto;  /* Maintain aspect ratio */
        max-width: 400px;  /* Set a maximum width for the image */
        object-fit: cover;  /* Ensure the image covers the area without stretching */
        margin-bottom: 20px;  /* Add some space below the image */
    }
</style>

<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/about_background.jpg"></div>
    <div class="home_content">
        <div class="home_title">Attractions</div>
    </div>
</div>

<div class="container my-4">
    <h1>Booking Details</h1>
    <div class="card mb-4 shadow-sm">
        <div class="card-body">

            <!-- Display the image of the selected attraction with improved styling -->
            <img src="{{ asset($details['image']) }}" alt="{{ $details['place'] }}" class="attraction-image">


            <h5 class="card-title">Place: {{ $details['place'] }}</h5>
            <p class="card-text">Description: {{ $details['description'] }}</p>
            <p class="card-text">Price per unit: RM {{ number_format($details['price'], 2) }}</p>
            <p class="card-text">Quantity: {{ $details['quantity'] }}</p>
            <p class="card-text">Total Price: RM {{ number_format($details['total_price'], 2) }}</p>
        </div>
    </div>
    <div class="d-flex justify-content-between">
        <a href="{{ route('attractions.index') }}" class="btn btn-primary">Back to Attractions</a>
        <form action="{{ route('paymentbooking') }}" method="POST">
            @csrf
            <input type="hidden" name="place" value="{{ $details['place'] }}">
            <input type="hidden" name="description" value="{{ $details['description'] }}">
            <input type="hidden" name="price" value="{{ $details['price'] }}">
            <input type="hidden" name="quantity" value="{{ $details['quantity'] }}">
            <input type="hidden" name="total_price" value="{{ $details['total_price'] }}">
            <button type="submit" class="btn btn-success">Make Payment</button>
        </form>
    </div>
</div>

@endsection
