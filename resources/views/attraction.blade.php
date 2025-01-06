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
</style>

<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/about_background.jpg"></div>
    <div class="home_content">
        <div class="home_title">Attractions</div>
    </div>
</div>

<div class="container">
    <h1 class="my-4">Attractions</h1>

    <!-- Display selected category -->
    <h3>Category: {{ ucfirst(request()->input('category', 'All')) }}</h3>

    @if ($attractions->isEmpty())
        <p>No attractions found for the selected category.</p>
    @else
        <div class="row">
            @foreach ($attractions as $attraction)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <!-- Attraction Image -->
                        <img class="card-img-top" src="{{ asset($attraction['image']) }}" alt="{{ $attraction['place'] }}" style="height: 200px; object-fit: cover;">

                        <div class="card-body">
                            <!-- Attraction Title -->
                            <h5 class="card-title">{{ $attraction['place'] }}</h5>

                            <!-- Attraction Description -->
                            <p class="card-text">{{ $attraction['description'] }}</p>

                            <!-- Price and Rating -->
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted price" id="price-{{ $loop->index }}">From RM {{ number_format($attraction['price'], 2) }}</span>
                                <span>
                                    <strong>{{ $attraction['rating'] }}</strong>
                                    <small>({{ rand(100, 1200) }} reviews)</small>
                                </span>
                            </div>

                            <!-- Pax Quantity and Price Update -->
                            <div class="mt-3 quantity-control">
                                <button class="btn btn-sm" onclick="adjustQuantity({{ $loop->index }}, 'decrease')">-</button>
                                <input type="number" id="quantity-{{ $loop->index }}" value="1" min="1" onchange="updatePrice({{ $loop->index }})">
                                <button class="btn btn-sm" onclick="adjustQuantity({{ $loop->index }}, 'increase')">+</button>
                            </div>

                            <!-- Select Button -->
                            <div class="mt-3 text-center">
                                <a href="#" class="btn btn-success">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<script>
    const attractionPrices = @json($attractions); // Store the attraction data

    function adjustQuantity(index, action) {
        const quantityInput = document.getElementById(`quantity-${index}`);
        let quantity = parseInt(quantityInput.value);

        if (action === 'increase') {
            quantity++;
        } else if (action === 'decrease' && quantity > 1) {
            quantity--;
        }

        quantityInput.value = quantity;
        updatePrice(index);
    }

    function updatePrice(index) {
        const quantity = document.getElementById(`quantity-${index}`).value;
        const pricePerPerson = parseFloat(attractionPrices[index]['price']);
        const totalPrice = (pricePerPerson * quantity).toFixed(2);

        document.getElementById(`price-${index}`).textContent = `From RM ${totalPrice}`;
    }
</script>

@endsection



