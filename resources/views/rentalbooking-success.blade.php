@extends('master.layout')

@section('content')

<div class="container">
    <h2>Booking Successful</h2>
    <p>Your rental booking has been confirmed. Thank you!</p>
    <p>Total Payment: RM {{ session('total_payment') }}</p>
</div>

@endsection