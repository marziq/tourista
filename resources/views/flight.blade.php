@extends('master.layout')

@section('content')

<?php
// Array of flights within Malaysia with image paths and prices in RM
$flights = [
    [
        'departure' => 'Kuala Lumpur',
        'arrival' => 'Penang',
        'travel_date' => '2025-04-10',
        'price' => 150,
        'airline' => 'Malaysia Airlines',
        'image' => asset('https://via.placeholder.com/150'),
    ],
    [
        'departure' => 'Johor Bahru',
        'arrival' => 'Kota Kinabalu',
        'travel_date' => '2025-05-15',
        'price' => 200,
        'airline' => 'AirAsia',
        'image' => asset('https://via.placeholder.com/150'),
    ],
    [
        'departure' => 'Kuching',
        'arrival' => 'Langkawi',
        'travel_date' => '2025-06-20',
        'price' => 250,
        'airline' => 'Malindo Air',
        'image' => asset('https://via.placeholder.com/150'),
    ],
    [
        'departure' => 'Ipoh',
        'arrival' => 'Malacca',
        'travel_date' => '2025-07-25',
        'price' => 180,
        'airline' => 'Firefly',
        'image' => asset('https://via.placeholder.com/150'),
    ],
    [
        'departure' => 'Kota Bharu',
        'arrival' => 'Alor Setar',
        'travel_date' => '2025-08-30',
        'price' => 170,
        'airline' => 'Malaysia Airlines',
        'image' => asset('https://via.placeholder.com/150'),
    ],
];
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Booking</title>
    <style>
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 18%;
            margin: 15px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            background-color: #fff;
        }

        .card img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .card h3 {
            margin-top: 10px;
            font-size: 1.2em;
        }

        .card p {
            color: #555;
            font-size: 1em;
            margin: 5px 0;
        }

        .btn {
            background-color: #0c4b35;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn:hover {
            background-color: #284d4d;
        }

        /* Responsive Design */
        @media screen and (max-width: 1000px) {
            .card {
                width: 48%;
            }
        }

        @media screen and (max-width: 600px) {
            .card {
                width: 100%;
            }
        }

        /* Custom Styles for Date Input */
        .form-group {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <div class="container">
        <?php foreach ($flights as $flight): ?>
            <div class="card">
                <img src="<?php echo $flight['image']; ?>" alt="<?php echo $flight['departure'] . ' to ' . $flight['arrival']; ?>">
                <h3><?php echo $flight['departure'] . ' to ' . $flight['arrival']; ?></h3>
                <p>Travel Date: <?php echo $flight['travel_date']; ?></p>
                <p>Price: RM <?php echo $flight['price']; ?></p>
                <p>Airline: <?php echo $flight['airline']; ?></p>
                <form action="{{ route('flightpayment') }}" method="GET">
                    <input type="hidden" name="flight_id" value="<?php echo $flight['departure'] . ' to ' . $flight['arrival']; ?>">
                    <button type="submit" class="btn">Book Now</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>

</body>
</html>

@endsection
