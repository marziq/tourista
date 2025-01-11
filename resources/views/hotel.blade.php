@extends('master.layout')

@section('content')
<div class="offers">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h2 class="section_title">The Best Offers with Rooms</h2>
            </div>
        </div>
        <div class="row offers_items">
            @forelse ($hotels as $hotel)
                <div class="col-lg-6 offers_col">
                    <div class="offers_item">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="offers_image_container">
                                    <div class="offers_image_background" style="background-image:url({{ asset('images/' . $hotel->image) }})"></div>
                                    <div class="offer_name"><a href="#">{{ $hotel->name }}</a></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="offers_content">
                                    <div class="offers_price">RM{{ number_format($hotel->lowest_price, 2) }}</div>
                                    <div class="rating_r rating_r_4 offers_rating" data-rating="4">
                                        <i></i><i></i><i></i><i></i><i></i> 4 stars
                                    </div>
                                    <p class="offers_text">{{ $hotel->location }}</p>
                                    <p class="offers_description">{{ $hotel->description }}</p>
                                    <div class="offers_icons">
                                        <ul class="offers_icons_list">
                                            <li class="offers_icons_item"><img src="{{ asset('images/post.png') }}" alt=""></li>
                                            <li class="offers_icons_item"><img src="{{ asset('images/compass.png') }}" alt=""></li>
                                            <li class="offers_icons_item"><img src="{{ asset('images/bicycle.png') }}" alt=""></li>
                                            <li class="offers_icons_item"><img src="{{ asset('images/sailboat.png') }}" alt=""></li>
                                        </ul>
                                    </div>
                                    <div class="offers_link">
                                        <a href="{{ route('hotelRoom')}}" class="button search_button" style="background-color: #426253; color: white;">See Availability<span></span><span></span><span></span></a>
                                    </div>
                                </div>
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
