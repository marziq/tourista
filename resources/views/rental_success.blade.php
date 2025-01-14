@extends('master.layout')

@section('content')

<style>
.full-page {
    height: 95vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #f9fafb;
    padding: 50px;
}

.rental-success {
    text-align: center;
    margin-top: 180px;
    padding: 60px;
    background-color: #ffffff;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    max-width: 500px;
    width: 100%;
}
h2 {
    color: #216731;
    margin-bottom: 20px;
}
p {
    color: #555555;
    font-size: 18px;
    margin-bottom: 30px;
}
.btn-primary {
    background-color: #216731;
    color: #ffffff;
    padding: 12px 25px;
    border-radius: 8px;
    text-decoration: none;
    font-size: 16px;
}
.btn-primary:hover {
    background-color: #1a5725;
}
</style>

<div class="full-page">
    <div class="rental-success">
        <h2>Rental Successful!</h2>
        <p>Thank you for your rental booking. Your transaction has been processed successfully.</p>
        <!-- Book Now Button -->
        <form action="{{ route('homepage')}}" method="GET">
            @csrf
            <button type="submit" class="btn btn-primary">Go to Home</button>
        </form>
    </div>
</div>

@endsection
