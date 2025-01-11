<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Flight;

class FlightSeeder extends Seeder
{
    public function run()
    {
        Flight::create([
            'departure' => 'Kuala Lumpur (KUL)',
            'arrival' => 'Penang (PEN)',
            'travel_date' => '2025-01-15',
            'passenger_count' => 150,
            'price' => 120.00,
            'airline' => 'Malaysia Airlines',
        ]);

        Flight::create([
            'departure' => 'Kuala Lumpur (KUL)',
            'arrival' => 'Kota Kinabalu (BKI)',
            'travel_date' => '2025-01-20',
            'passenger_count' => 120,
            'price' => 250.00,
            'airline' => 'AirAsia',
        ]);

        Flight::create([
            'departure' => 'Penang (PEN)',
            'arrival' => 'Langkawi (LGK)',
            'travel_date' => '2025-01-25',
            'passenger_count' => 100,
            'price' => 80.00,
            'airline' => 'Firefly',
        ]);

        Flight::create([
            'departure' => 'Johor Bahru (JHB)',
            'arrival' => 'Kuching (KCH)',
            'travel_date' => '2025-01-18',
            'passenger_count' => 180,
            'price' => 300.00,
            'airline' => 'Malaysia Airlines',
        ]);

        Flight::create([
            'departure' => 'Kuching (KCH)',
            'arrival' => 'Miri (MYY)',
            'travel_date' => '2025-02-10',
            'passenger_count' => 200,
            'price' => 150.00,
            'airline' => 'AirAsia',
        ]);

        Flight::create([
            'departure' => 'Kuala Lumpur (KUL)',
            'arrival' => 'Terengganu (TGG)',
            'travel_date' => '2025-03-01',
            'passenger_count' => 180,
            'price' => 100.00,
            'airline' => 'Malindo Air',
        ]);

        Flight::create([
            'departure' => 'Kota Kinabalu (BKI)',
            'arrival' => 'Sandakan (SDK)',
            'travel_date' => '2025-03-15',
            'passenger_count' => 220,
            'price' => 200.00,
            'airline' => 'MASwings',
        ]);
    }
}


