<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Hotel;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hotel::insert([
            [
                'name' => 'Impianna Hotel',
                'location' => 'Malacca',
                'price' => 215.19,
                'description' => 'Single Room',
                'image' => 'hotel1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'check_in' => '2025-01-12',
                'check_out' => '2025-01-14',
            ],
            [
                'name' => 'Dream Inn Hotel',
                'location' => 'Penang',
                'price' => 275.00,
                'description' => 'Standard Room',
                'image' => 'hotel2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'check_in' => '2025-01-17',
                'check_out' => '2025-01-18',
            ],
            [
                'name' => 'Renaissance Hotel',
                'location' => 'Johor Bahru',
                'price' => 285.69,
                'description' => 'Deluxe Double Room',
                'image' => 'hotel3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'check_in' => '2025-02-01',
                'check_out' => '2025-02-04',
            ],
            [
                'name' => 'de Blue Hotel',
                'location' => 'Kuala Lumpur',
                'price' => 300.99,
                'description' => 'Deluxe Room',
                'image' => 'hotel4.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'check_in' => '2025-01-15',
                'check_out' => '2025-01-16',
            ],
            [
                'name' => 'Grand Suite Hotel',
                'location' => 'Kuala Lumpur',
                'price' => 415.89,
                'description' => 'Master Suites Room',
                'image' => 'hotel5.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'check_in' => '2025-01-18',
                'check_out' => '2025-01-20',
            ],
            [
                'name' => 'Hilton Star Hotel',
                'location' => 'Kuala Lumpur',
                'price' => 489.33,
                'description' => 'Deluxe Room',
                'image' => 'hotel6.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'check_in' => '2025-01-15',
                'check_out' => '2025-01-20',
            ],
            [
                'name' => 'The Majestic Hotel',
                'location' => 'Kuala Lumpur',
                'price' => 689.99,
                'description' => 'Master Suites Room',
                'image' => 'hotel7.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'check_in' => '2025-01-25',
                'check_out' => '2025-01-27',
            ],
            [
                'name' => 'The Langkawi Resort',
                'location' => 'Langkawi',
                'price' => 1555.99,
                'description' => 'Villa Suites',
                'image' => 'hotel8.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'check_in' => null,
                'check_out' => null,
            ],
        ]);
    }
}
