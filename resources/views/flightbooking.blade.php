@extends('master.layout')

@section('content')
    <div class="search_form_container">
        <h1>Find Flights</h1>
        <form action="{{ route('flights.search') }}" method="GET">
            <div class="form-group">
                <label for="departure">Departure</label>
                <input type="text" name="departure" id="departure" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="arrival">Destination</label>
                <input type="text" name="arrival" id="arrival" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="travel_date">Travel Date</label>
                <input type="date" name="travel_date" id="travel_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="passenger_count">Passenger Count</label>
                <input type="number" name="passenger_count" id="passenger_count" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
    </div>
@endsection


<style>
.results_container {
    padding: 20px;
}
.flights_list {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}
.flight_card {
    border: 1px solid #ddd;
    border-radius: 10px;
    overflow: hidden;
    width: 300px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
.flight_image {
    width: 100%;
    height: 200px;
    object-fit: cover;
}
.flight_details {
    padding: 15px;
}
.flight_details h2 {
    margin: 0 0 10px;
}
</style>
