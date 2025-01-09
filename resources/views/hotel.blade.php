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
                                    <div class="offers_price">RM{{ number_format($hotel->price, 2) }}<span>per night</span><br><span>Additional charges may apply</span></div>
                                    <div class="rating_r rating_r_{{ $hotel->rating ?? 0 }} offers_rating">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="{{ $i <= ($hotel->rating ?? 2) ? '' : 'inactive' }}"></i>
                                        @endfor
                                    </div>
                                    <p class="offers_location">{{ $hotel->location ?? 'No location available.' }}</p>
                                    <!--<a href="{{ route('hotel.show', $hotel->id) }}">{{ $hotel->location }}</a> -->
                                    <p class="offers_text">{{ $hotel->description ?? 'No description available.' }}</p>
                                    <div class="offers_icons">
                                        <ul class="offers_icons_list">
                                            <li class="offers_icons_item"><img src="{{ asset('images/post.png') }}" alt=""></li>
                                            <li class="offers_icons_item"><img src="{{ asset('images/compass.png') }}" alt=""></li>
                                            <li class="offers_icons_item"><img src="{{ asset('images/bicycle.png') }}" alt=""></li>
                                            <li class="offers_icons_item"><img src="{{ asset('images/sailboat.png') }}" alt=""></li>
                                        </ul>
                                    </div>
                                    <div class="offers_link">
                                        <div class="offers_link">
                                            <button type="submit" class="button search_button" style="background-color: #426253; color: white;">See Availability<span></span><span></span><span></span></button>
                                        </div>
                                        <!--<a href="{{ route('hotel.show', $hotel->id) }}">See Availability</a>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p>Try modifying your search criteria.</p>
                </div>
            @endforelse
        </div>
        <div class="pagination_container">
            {{ $hotels->links() }}
        </div>
    </div>
</div>
@endsection


<!-- tinker -->
