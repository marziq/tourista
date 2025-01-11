@extends('layouts.app')

@section('content')
    <h1>Flight Search Results</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if($flights->isEmpty())
        <p>No flights found matching your search criteria.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Departure</th>
                    <th>Arrival</th>
                    <th>Travel Date</th>
                    <th>Price (RM)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($flights as $flight)
                <tr>
                    <td>{{ $flight->departure }}</td>
                    <td>{{ $flight->arrival }}</td>
                    <td>{{ $flight->travel_date }}</td>
                    <td>{{ number_format($flight->price, 2) }}</td>
                    <td>
                        <a href="{{ route('flights.book', $flight->id) }}" class="btn btn-primary">Book Now</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection


<style>

.search_form_container {
    padding: 20px;
    background: #f4f4f4;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.search_form_container .form-group {
    margin-bottom: 15px;
}

.search_form_container button {
    background-color: #007bff;
    color: white;
}

table {
    width: 100%;
    margin-top: 20px;
}

table th, table td {
    text-align: center;
}

table th {
    background-color: #f8f9fa;
}

</style>