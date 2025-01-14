@extends('master.layout')

@section('content')

<style>
    /* Container for offers */
    .offers_item {
        display: flex;
        flex-direction: column;
        border: 1px solid #e0e0e0;
        margin-bottom: 20px;
        background-color: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    /* Image container with price overlay */
    .offers_image_container {
        position: relative;
        width: 100%;
        height: 200px;
        overflow: hidden;
    }

    .offers_image_background {
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .offers_price_overlay {
        font-size: 24px;
        color: #34495e;
        font-weight: bold;
    }

    /* Content section */
    .offers_content {
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: flex-start;
    }

    .hotel_details {
        margin-bottom: 10px;
    }

    .hotel_name {
        font-size: 20px;
        color: #2c3e50;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .offers_text {
        font-size: 16px;
        color: #34495e;
    }

    /* Quantity selector and Book Now */
    .right_container {
        text-align: right;
    }

    .search_button {
        background-color: #1E90FF;
        color: white;
        padding: 8px 15px;
        text-decoration: none;
        border-radius: 5px;
        font-size: 14px;
    }

    .offers_items {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .offers_col {
        width: 48%;
        margin-bottom: 20px;
    }
</style>

<div class="offers">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h2 class="section_title">The Best Offers with Rooms</h2>
            </div>
        </div>
        <div class="row offers_items">
            @forelse ($hotel as $hotel)
                <div class="col-lg-6 col-md-6 col-sm-12 offers_col">
                    <div class="offers_item">
                        <div class="offers_image_container">
                            @if($hotel->image)
                                <div class="offers_image_background" style="background-image: url({{ asset('images/' . $hotel->image) }});"></div>
                            @else
                                <div class="offers_image_background" style="background-color: #f0f0f0;">
                                    <p style="text-align: center; line-height: 200px; color: #999;">No Image</p>
                                </div>
                            @endif
                        </div>

                        <!-- Content -->
                        <div class="offers_content">
                            <div class="hotel_details">
                                <div class="hotel_name">{{ $hotel->name }}</div>
                                <p class="offers_text"><strong>Location:</strong> {{ $hotel->location }}</p>
                                <p class="offers_text"><strong>Available Room:</strong> {{ $hotel->description }}</p>
                            </div>

                            <div class="right_container">
                                <div class="offers_price_overlay">
                                    RM{{ number_format($hotel->price, 2) }}
                                </div>
                                <form action="{{ route('payment_hotel') }}" method="GET" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">
                                    <input type="hidden" name="hotel_name" value="{{ $hotel->name }}">
                                    <input type="hidden" name="check_in" id="check_in_{{ $hotel->id }}" value="{{ request('check_in') }}">
                                    <input type="hidden" name="check_out" id="check_out_{{ $hotel->id }}" value="{{ request('check_out') }}">
                                    <input type="hidden" name="pax" id="quantity-input-{{ $hotel->id }}" value="1">
                                    <input type="hidden" name="price" value="{{ $hotel->price }}">
                                    <input type="hidden" name="total_price" id="total-price-{{ $hotel->id }}" value="{{ $hotel->price }}">

                                    <button type="submit" class="btn btn-primary">Book Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p>No hotels available.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

@endsection
