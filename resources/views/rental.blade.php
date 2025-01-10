@extends('master.layout')

@section('content')

<?php
// Array of vehicles with image paths and prices in RM
$vehicles = [
    [
        'brand' => 'Toyota',
        'model' => 'Corolla',
        'price_per_day' => 130,
        'image' => asset('https://via.placeholder.com/150'),
    ],
    [
        'brand' => 'Ford',
        'model' => 'Mustang',
        'price_per_day' => 160,
        'image' => asset('https://via.placeholder.com/150'),
    ],
    [
        'brand' => 'BMW',
        'model' => 'X5',
        'price_per_day' => 100,
        'image' => asset('https://via.placeholder.com/150'),
    ],
    [
        'brand' => 'Honda',
        'model' => 'Civic',
        'price_per_day' => 140,
        'image' => asset('https://via.placeholder.com/150'),
    ],
    [
        'brand' => 'Audi',
        'model' => 'A4',
        'price_per_day' => 170,
        'image' => asset('https://via.placeholder.com/150'),
    ],
    [
        'brand' => 'Nissan',
        'model' => 'Altima',
        'price_per_day' => 150,
        'image' => asset('https://via.placeholder.com/150'),
    ],
    [
        'brand' => 'Kia',
        'model' => 'Sportage',
        'price_per_day' => 145,
        'image' => asset('https://via.placeholder.com/150'),
    ],
    [
        'brand' => 'Mazda',
        'model' => 'CX-5',
        'price_per_day' => 155,
        'image' => asset('https://via.placeholder.com/150'),
    ],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Rental</title>
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
        <?php foreach ($vehicles as $vehicle): ?>
            <div class="card">
                <img src="<?php echo $vehicle['image']; ?>" alt="<?php echo $vehicle['brand'] . ' ' . $vehicle['model']; ?>">
                <h3><?php echo $vehicle['brand'] . ' ' . $vehicle['model']; ?></h3>
                <p>Price per Day: RM <?php echo $vehicle['price_per_day']; ?></p>
                <form action="{{ route('rentalpayment') }}" method="GET">
                    <input type="hidden" name="vehicle_id" value="<?php echo $vehicle['brand'] . ' ' . $vehicle['model']; ?>">
                    <button type="submit" class="btn">Book Now</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>

</body>
</html>

@endsection
