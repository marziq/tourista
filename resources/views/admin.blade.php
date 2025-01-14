@extends('master.layout')
@section('content')
<style>
body {
    font-family: Arial, sans-serif;
}

.container {
   margin-top: 20px;
}
.adminh1{
    text-align: center;
    margin-top: 220px;
    margin-bottom: 20px;
}
h1, h2 {
    color: #333;
}

.table {
    width: 100%;
    margin-bottom: 20px;
    border-collapse: collapse;
}

.table th, .table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.table th {
    background-color: #f2f2f2;
}

.table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.table tr:hover {
    background-color: #f1f1f1;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    font-size: 14px;
    text-align: center;
    text-decoration: none;
    border-radius: 4px;
    margin: 5px 0;
}

.btn-primary {
    background-color: #007bff;
    color: white;
    border: none;
}

.btn-warning {
    background-color: #ffc107;
    color: white;
    border: none;
}

.btn-danger {
    background-color: #dc3545;
    color: white;
    border: none;
}

.btn:hover {
    opacity: 0.8;
}
 </style>
    <div class="container">
        <h1 class="adminh1">Admin Dashboard</h1>
        <p>Welcome, admin!</p>

        <!-- Hotels Table -->
        <h2>Manage Hotels</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hotels as $hotel)
                    <tr>
                        <td>{{ $hotel->name }}</td>
                        <td>{{ $hotel->location }}</td>
                        <td>{{ $hotel->price }}</td>
                        <td>{{ $hotel->description }}</td>
                        <td>{{ $hotel->check_in }}</td>
                        <td>{{ $hotel->check_out }}</td>
                        <td>
                            <a href="{{ route('hotels.edit', $hotel->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('hotels.destroy', $hotel->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('hotels.create') }}" class="btn btn-primary">Create Hotel</a>



        <!-- Rentals Table -->
        <h2>Manage Rentals</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Vehicle ID</th>
                    <th>Pickup Date</th>
                    <th>Return Date</th>
                    <th>Price Per Day</th>
                    <th>Number of Days</th>
                    <th>Total Payment</th>
                    <th>Location</th>
                    <th>Customer Name</th>
                    <th>Bank Details</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rentals as $rental)
                    <tr>
                        <td>{{ $rental->vehicle_id }}</td>
                        <td>{{ $rental->pickup_date }}</td>
                        <td>{{ $rental->return_date }}</td>
                        <td>{{ $rental->price_per_day }}</td>
                        <td>{{ $rental->number_of_days }}</td>
                        <td>{{ $rental->total_payment }}</td>
                        <td>{{ $rental->location }}</td>
                        <td>{{ $rental->customer_name }}</td>
                        <td>{{ $rental->bank_details }}</td>
                        <td>
                            <a href="{{ route('rentals.edit', $rental->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('rentals.destroy', $rental->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('rentals.create') }}" class="btn btn-primary">Create Rental</a>

        <!-- Flights Table -->
        <h2>Manage Flights</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Departure</th>
                    <th>Arrival</th>
                    <th>Travel Date</th>
                    <th>Passenger Count</th>
                    <th>Price</th>
                    <th>Airline</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($flights as $flight)
                    <tr>
                        <td>{{ $flight->departure }}</td>
                        <td>{{ $flight->arrival }}</td>
                        <td>{{ $flight->travel_date }}</td>
                        <td>{{ $flight->passenger_count }}</td>
                        <td>{{ $flight->price }}</td>
                        <td>{{ $flight->airline }}</td>
                        <td>
                            <a href="{{ route('flights.edit', $flight->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('flights.destroy', $flight->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('flights.create') }}" class="btn btn-primary">Create Flight</a>

        <!-- Tours Table -->
        <h2>Manage Tours</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tours as $tour)
                    <tr>
                        <td>{{ $tour->package_name }}</td>
                        <td>{{ $tour->description }}</td>
                        <td>{{ $tour->price }} </td>
                        <td>
                            <a href="{{ route('tours.edit', $tour->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('tours.destroy', $tour->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('tours.create') }}" class="btn btn-primary">Create Tour</a>

        <!-- Attractions Table -->
        <h2>Manage Attractions</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attractions as $attraction)
                    <tr>
                        <td>{{ $attraction->name }}</td>
                        <td>{{ $attraction->location }}</td>
                        <td>{{ $attraction->description }}</td>
                        <td>{{ $attraction->price }}</td>
                        <td>
                            <a href="{{ route('attractions.edit', $attraction->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('attractions.destroy', $attraction->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('attractions.create') }}" class="btn btn-primary">Create Attraction</a>
    </div>
@endsection
