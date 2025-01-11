@extends('master.layout')
@section('content')

<style>
    .slider-container {
        position: relative;
        width: 100%;
        height: 100vh;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('images/cta.jpg') no-repeat center center/cover;
    }

    .slider-card {
        background: rgba(255, 255, 255, 0.9);
        border-radius: 10px;
        padding: 30px;
        max-width: 600px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        text-align: center;
    }

    .slider-card h2 {
        font-size: 32px;
        margin-bottom: 10px;
        font-weight: bold;
    }

    .slider-card .price {
        color: #28a745;
        font-size: 20px;
        margin-bottom: 15px;
        font-weight: bold;
    }

    .slider-card p {
        font-size: 16px;
        color: #6c757d;
        margin-bottom: 20px;
    }

    .btn-book {
        padding: 10px 20px;
        background-color: #28a745;
        color: white;
        text-transform: uppercase;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        text-decoration: none;
    }

    .btn-book:hover {
        background-color: #218838;
    }

    .slider-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: 24px;
        color: white;
        background: rgba(0, 0, 0, 0.5);
        border-radius: 50%;
        padding: 10px;
        cursor: pointer;
        z-index: 10;
    }

    .slider-nav:hover {
        background: rgba(0, 0, 0, 0.7);
    }

    .slider-prev {
        left: 20px;
    }

    .slider-next {
        right: 20px;
    }
</style>

<div class="slider-container">
    <!-- Slider Content -->
    <div class="slider-card">
        <h2></h2>
        <div class="price"></div>
        <p></p>
        <a href="" class="btn-book">Book Now</a>
    </div>

    <!-- Slider Navigation -->
    <div class="slider-nav slider-prev">&lt;</div>
    <div class="slider-nav slider-next">&gt;</div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sliderCard = document.querySelector('.slider-card');
        const prevButton = document.querySelector('.slider-prev');
        const nextButton = document.querySelector('.slider-next');

        let currentIndex = 0;
        const packages = @json($tourPackages);

        function updateContent(index) {
            const { package_name, price, description, id } = packages[index];
            sliderCard.querySelector('h2').textContent = package_name;
            sliderCard.querySelector('.price').textContent = `Price: $${price}`;
            sliderCard.querySelector('p').textContent = description;
            sliderCard.querySelector('a').setAttribute('href', `/search/${id}`);
        }

        prevButton.addEventListener('click', function () {
            currentIndex = (currentIndex - 1 + packages.length) % packages.length;
            updateContent(currentIndex);
        });

        nextButton.addEventListener('click', function () {
            currentIndex = (currentIndex + 1) % packages.length;
            updateContent(currentIndex);
        });

        // Initialize slider with the first package
        updateContent(currentIndex);
    });
</script>

@endsection
