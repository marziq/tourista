<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlightSeeder extends Seeder
{
    public function run()
    {
        DB::table('flights')->insert([
            [
                'departure' => 'Kuala Lumpur',
                'arrival' => 'Penang',
                'travel_date' => '2025-04-10',
                'passenger_count' => 1,
                'price' => '150.00',
                'airline' => 'Malaysia Airlines',
                'image' => '/images/MasAL.PNG',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'departure' => 'Johor Bahru',
                'arrival' => 'Kota Kinabalu',
                'travel_date' => '2025-05-15',
                'passenger_count' => 2,
                'price' => '200.00',
                'airline' => 'AirAsia',
                'image' => '/images/Airasia.PNG',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'departure' => 'Kuching',
                'arrival' => 'Langkawi',
                'travel_date' => '2025-06-20',
                'passenger_count' => 3,
                'price' => '250.00',
                'airline' => 'Malindo Air',
                'image' => '/images/malindo.PNG',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'departure' => 'Ipoh',
                'arrival' => 'Malacca',
                'travel_date' => '2025-07-25',
                'passenger_count' => 4,
                'price' => '180.00',
                'airline' => 'Firefly',
                'image' => '/images/firefly.PNG',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'departure' => 'Kota Bharu',
                'arrival' => 'Alor Setar',
                'travel_date' => '2025-08-30',
                'passenger_count' => 5,
                'price' => '170.00',
                'airline' => 'Malaysia Airlines',
                'image' => '/images/MasAL.PNG',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
