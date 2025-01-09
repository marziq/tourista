@extends('master.layout')

@section('content')
<style>
    .home {
        font-family: Arial, sans-serif;
        padding: 20px;
    }

    .h1 {
        font-size: 2rem;
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    .filter-form {
        display: flex;
        justify-content: space-around;
        align-items: center;
        margin: 20px 0;
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .filter-form div {
        display: flex;
        flex-direction: column;
        margin: 0 10px;
    }

    .filter-form label {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .filter-form input[type="text"],
    .filter-form input[type="datetime-local"] {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        width: 200px;
    }

    .filter-form button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .filter-form button:hover {
        background-color: #45a049;
    }

    .vehicles {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin: 20px;
    }

    .vehicle-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        text-align: center;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .vehicle-card:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .vehicle-card img {
        max-width: 100%;
        border-radius: 8px;
        margin-bottom: 10px;
    }

    .vehicle-card h3 {
        font-size: 1.5rem;
        margin: 10px 0;
    }

    .vehicle-card p {
        margin: 5px 0;
        color: #555;
    }

    .vehicle-card button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .vehicle-card button:hover {
        background-color: #45a049;
    }
</style>

<h1>Our Vehicle Model</h1>
<div class="search_tabs_container">
    <div class="search_tabs d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
        <div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start"><img src="images/departure.png" alt="">Cars</div>
        <div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start"><img src="images/island.png" alt="">MPVs</div>
        <div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start"><img src="images/diving.png" alt="">Motorcycles</div>
    </div>
</div>


<form action="{{ route('rental') }}" method="POST">
    @csrf

    <!-- Pickup Date -->
    <label for="pickup_date">Pickup Date:</label>
    <input type="datetime-local" id="pickup_date" name="pickup_date" required>

    <!-- Return Date -->
    <label for="return_date">Return Date:</label>
    <input type="datetime-local" id="return_date" name="return_date" required>

    <!-- Location -->
    <label for="location">Pick-Up Location:</label>
    <select id="location" name="location" required>
        <option value="Kuala Lumpur">Kuala Lumpur</option>
        <option value="Penang">Penang</option>
        <option value="Johor Bahru">Johor Bahru</option>
        <option value="Kota Kinabalu">Kota Kinabalu</option>
    </select>

    <button type="submit">Save Rental</button>
</form>

@if($errors->any())
    <div style="color: red;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection
