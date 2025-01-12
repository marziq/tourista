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
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: rgba(0, 0, 0, 0.7);
        color: #fff;
        padding: 5px 15px;
        border-radius: 4px;
        font-size: 24px;
        font-weight: bold;
    }

    /* Content section */
    .offers_content {
        padding: 20px;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: flex-start;
    }

    .hotel_details {
        flex: 1;
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

    .room_selector {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        margin-bottom: 10px;
    }

    .room_selector button {
        background-color: #426253;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
    }

    .room_selector input {
        width: 50px;
        text-align: center;
        margin: 0 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
    }
    .search_button {
        background-color: #426253;
        color: white;
        padding: 8px 15px;
        text-decoration: none;
        border-radius: 5px;
        font-size: 14px;
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
            @forelse ($hotels as $hotel)
                <div class="col-lg-6 col-md-6 col-sm-12 offers_col">
                    <div class="offers_item">
                        <!-- Image with Price Overlay -->
                        <div class="offers_image_container">
                            @if($hotel->image)
                                <div class="offers_image_background" style="background-image: url({{ asset('images/' . $hotel->image) }});"></div>
                            @else
                                <div class="offers_image_background" style="background-color: #f0f0f0;">
                                    <p style="text-align: center; line-height: 200px; color: #999;">No Image</p>
                                </div>
                            @endif
                            <div class="offers_price_overlay" id="dynamic_price_{{ $hotel->id }}">
                                RM{{ number_format($hotel->price, 2) }}
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="offers_content">
                            <div class="hotel_details">
                                <div class="hotel_name">{{ $hotel->name }}</div>
                                <p class="offers_text"><strong>Location:</strong> {{ $hotel->location }}</p>
                                <p class="offers_text"><strong>Available Rooms:</strong> {{ $hotel->description}}</p>
                            </div>

                            <div class="right_container">
                                <div class="room_selector">
                                    <button onclick="updateRoomCount({{ $hotel->id }}, -1, {{ $hotel->available_rooms }}, {{ $hotel->price }})">-</button>
                                    <input type="text" id="room_count_{{ $hotel->id }}" value="1" readonly>
                                    <button onclick="updateRoomCount({{ $hotel->id }}, 1, {{ $hotel->available_rooms }}, {{ $hotel->price }})">+</button>
                                </div>
                                <a href="{{ route('hotelBook') }}" class="search_button">Book Now</a>
                                <p class="offers_text"><span style="color: red;">{{ $hotel->available_rooms }} rooms available</span></p>                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p>No hotels available for the selected destination.</p>
                </div>
            @endforelse
        </div>
        <div class="pagination_container">
            {{ $hotels->links() }}
        </div>
    </div>
</div>

<script>
    function updateRoomCount(hotelId, increment, maxRooms, price) {
    const roomCountInput = document.getElementById(`room_count_${hotelId}`);
    const priceDisplay = document.querySelector(`#dynamic_price_${hotelId}`);
    let currentCount = parseInt(roomCountInput.value);

    if (isNaN(currentCount)) currentCount = 1;

    // Calculate the new room count
    let newCount = currentCount + increment;

    // Prevent exceeding the maximum number of rooms or going below 1
    if (newCount < 1) newCount = 1;
    if (newCount > maxRooms) newCount = maxRooms;

    // Update the input field value
    roomCountInput.value = newCount;

    // Recalculate the price and update the display
    const newPrice = (newCount * price).toFixed(2);
    priceDisplay.textContent = `RM${newPrice}`;
}
</script>

@endsection
