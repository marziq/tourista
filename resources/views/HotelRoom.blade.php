//
<!--@extends('master.layout')
@section('content')

<div class="hotel_details">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h2 class="section_title">{{ $hotel->name }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="hotel_image">
                    <img src="{{ asset('images/' . $hotel->image) }}" alt="{{ $hotel->name }}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hotel_content">
                    <div class="hotel_price">RM{{ number_format($hotel->price, 2) }}<span>per night</span></div>
                    <div class="hotel_rating">
                        <i class="filled">&#9733;</i><i class="filled">&#9733;</i><i class="filled">&#9733;</i><i class="filled">&#9733;</i><i class="empty">&#9733;</i> 4 stars
                    </div>
                    <p class="hotel_location">{{ $hotel->location }}</p>
                    <p class="hotel_description">{{ $hotel->description }}</p>
                    <div class="rooms">
                        <h4>Available Rooms:</h4>
                        @forelse ($hotel->rooms as $room)
                            <p>Room Type: {{ $room->type }} - Beds: {{ $room->beds }} - Available Rooms: {{ $room->available_rooms }}</p>
                            <form action="{{ route('HotelBooking') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="num_rooms">Select Number of Rooms:</label>
                                    <select name="num_rooms" class="form-control" required>
                                        @for ($i = 1; $i <= $room->available_rooms; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Book Now</button>
                            </form>
                        @empty
                            <p>No rooms available for the selected dates.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection-->
