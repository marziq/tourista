@extends('master.layout')
@section('content')
<style>
    .home {
        position: relative;
        height: 150px;
        background-color: #f8f9fa;
    }

    .home_title {
        font-size: 3rem;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
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
        font-size: 1.2rem;
        font-weight: bold;
        color: #28a745;
    }
</style>

<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/about_background.jpg"></div>
    <div class="home_content">
        <div class="home_title">Attractions</div>
    </div>
</div>
@if(isset($attractions))
    <div>Number of attractions: {{ $attractions->count() }}</div>
@else
    <div>No attractions variable passed to view</div>
@endif

<!-- Rest of your code -->
<div class="container mt-5">
    <div class="row">
        @forelse($attractions as $attraction)
            <div class="col-md-4 mb-4">
                <div class="attraction-card">

                    <img src="{{ asset($attraction->image) }}" alt="{{ $attraction->name }}" class="attraction-image">
                    <h4 class="mt-3">{{ $attraction->name }}</h4>
                    <p class="text-muted">{{ $attraction->location }}</p>
                    <p>{{ $attraction->description }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="price">RM {{ number_format($attraction->price, 2) }}</span>
                        <a href="#" class="btn btn-primary">Select >></a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p>No attractions found.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
{{--
<div class="container mt-5">
    <div class="row">
        @foreach($attractions as $attraction)
        <div class="col-md-4 mb-4">
            <div class="attraction-card">
                <img src="{{ asset($attraction->image) }}" alt="{{ $attraction->name }}" class="attraction-image">
                {{-- <img src="{{ $attraction->image }}" alt="{{ $attraction->name }}" class="attraction-image"> --}}
                {{-- <h4 class="mt-3">{{ $attraction->name }}</h4>
                <p class="text-muted">{{ $attraction->location }}</p>
                <p>{{ $attraction->description }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="price">RM {{ number_format($attraction->price, 2) }}</span>
                    <a href="#" class="btn btn-primary">Select >></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div> --}}



