@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Flight Results</h1>
    @if ($flights->isEmpty())
        <p>No flights available for your search criteria.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Departure</th>
                    <th>Arrival</th>
                    <th>Date</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($flights as $flight)
                    <tr>
                        <td>{{ $flight->departure }}</td>
                        <td>{{ $flight->arrival }}</td>
                        <td>{{ $flight->travel_date }}</td>
                        <td>{{ $flight->price }}</td>
                        <td>
                            <a href="{{ route('flights.book', $flight->id) }}" class="btn btn-success">Book Now</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
