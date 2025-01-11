@extends('master.layout')

@section('content')

<?php
// Get the vehicle details from the GET request
$vehicle_id = $_GET['vehicle_id'] ?? '';
$price_per_day = 0;  // Default to zero
$vehicles = [
    [
        'brand' => 'Toyota',
        'model' => 'Corolla',
        'price_per_day' => 130,
    ],
    [
        'brand' => 'Ford',
        'model' => 'Mustang',
        'price_per_day' => 160,
    ],
    [
        'brand' => 'BMW',
        'model' => 'X5',
        'price_per_day' => 100,
    ],
    [
        'brand' => 'Honda',
        'model' => 'Civic',
        'price_per_day' => 140,
    ],
    [
        'brand' => 'Audi',
        'model' => 'A4',
        'price_per_day' => 170,
    ],
    [
        'brand' => 'Nissan',
        'model' => 'Altima',
        'price_per_day' => 150,
    ],
    [
        'brand' => 'Kia',
        'model' => 'Sportage',
        'price_per_day' => 145,
    ],
    [
        'brand' => 'Mazda',
        'model' => 'CX-5',
        'price_per_day' => 155,
    ],
];

// Find the price_per_day based on the vehicle selected
foreach ($vehicles as $vehicle) {
    if ($vehicle['brand'] . ' ' . $vehicle['model'] === $vehicle_id) {
        $price_per_day = $vehicle['price_per_day'];
        break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Payment</title>
    <style>
        .container {
            padding: 20px;
        }

        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            background-color: #fff;
        }

        .form-group {
            margin-bottom: 10px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .form-group input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-group input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
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
    </style>
</head>
<body>

    <div class="container">
        <div class="form-container">
            <h2>Rental Payment</h2>
            <form id="payment-form">
                <div class="form-group">
                    <label for="pickup_date">Pick-up Date:</label>
                    <input type="date" id="pickup_date" name="pickup_date" required>
                </div>
                <div class="form-group">
                    <label for="return_date">Return Date:</label>
                    <input type="date" id="return_date" name="return_date" required>
                </div>
                <p style="font-size: 1.2em; color: #555; margin-top: 15px;">
                    Price per Day: RM <?php echo $price_per_day; ?>
                </p>
                <p style="font-size: 1.2em; color: #555; margin-top: 10px;">
                    <strong>Total Payment: RM <span id="total-payment">0</span></strong>
                </p>
                <button type="submit" class="btn">Proceed to Payment</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('payment-form');
            const pickupDate = document.getElementById('pickup_date');
            const returnDate = document.getElementById('return_date');
            const totalPaymentElement = document.getElementById('total-payment');

            form.addEventListener('input', function() {
                const pickup = new Date(pickupDate.value);
                const returnD = new Date(returnDate.value);

                if (pickup && returnD) {
                    const diffTime = Math.abs(returnD - pickup);
                    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); // Calculate number of days
                    const pricePerDay = <?php echo $price_per_day; ?>;
                    const totalPayment = diffDays * pricePerDay;

                    totalPaymentElement.textContent = totalPayment;
                } else {
                    totalPaymentElement.textContent = 0;
                }
            });
        });
    </script>

</body>
</html>

@endsection
