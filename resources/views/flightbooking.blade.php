@extends('master.layout')

@section('content')

<?php
// Get the flight details from the GET request
$flight_id = $_GET['flight_id'] ?? '';
$price_per_ticket = 0; // Default to zero
$flights = [
    [
        'departure' => 'Kuala Lumpur',
        'arrival' => 'Penang',
        'price' => 120,
        'date' => '2025-01-15',
    ],
    [
        'departure' => 'Kota Kinabalu',
        'arrival' => 'Kuching',
        'price' => 150,
        'date' => '2025-01-20',
    ],
    [
        'departure' => 'Langkawi',
        'arrival' => 'Johor Bahru',
        'price' => 100,
        'date' => '2025-01-25',
    ],
];

// Find the price_per_ticket based on the flight selected
foreach ($flights as $flight) {
    if ($flight['departure'] . ' to ' . $flight['arrival'] === $flight_id) {
        $price_per_ticket = $flight['price'];
        break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Payment</title>
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
            <h2>Flight Payment</h2>
            <form id="payment-form">
                <div class="form-group">
                    <label for="num_tickets">Number of Tickets:</label>
                    <input type="number" id="num_tickets" name="num_tickets" min="1" required>
                </div>
                <p style="font-size: 1.2em; color: #555; margin-top: 15px;">
                    Price per Ticket: RM <?php echo $price_per_ticket; ?>
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
            const numTickets = document.getElementById('num_tickets');
            const totalPaymentElement = document.getElementById('total-payment');

            form.addEventListener('input', function() {
                const tickets = parseInt(numTickets.value) || 0;
                const pricePerTicket = <?php echo $price_per_ticket; ?>;
                const totalPayment = tickets * pricePerTicket;

                totalPaymentElement.textContent = totalPayment;
            });
        });
    </script>

</body>
</html>

@endsection
