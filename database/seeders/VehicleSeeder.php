<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicles')->insert([
            [
                'brand' => 'Toyota',
                'model' => 'Corolla',
                'price_per_day' => 130.00,
                'image' => 'public/images/toyota_corolla.jpg',
            ],
            [
                'brand' => 'Ford',
                'model' => 'Mustang',
                'price_per_day' => 160.00,
                'image' => 'public/images/ford_mustang.jpeg',
            ],
            [
                'brand' => 'BMW',
                'model' => 'X5',
                'price_per_day' => 100.00,
                'image' => 'public/images/bmw_x5.jpeg',
            ],
            [
                'brand' => 'Honda',
                'model' => 'Civic',
                'price_per_day' => 140.00,
                'image' => 'public/images/honda_civic.jpg',
            ],
            [
                'brand' => 'Audi',
                'model' => 'A4',
                'price_per_day' => 170.00,
                'image' => 'public/images/audi_a4.jpg',
            ],
            [
                'brand' => 'Nissan',
                'model' => 'Altima',
                'price_per_day' => 150.00,
                'image' => 'public/images/nissan_altima.jpeg',
            ],
            [
                'brand' => 'Kia',
                'model' => 'Sportage',
                'price_per_day' => 145.00,
                'image' => 'public/images/kia_sportage.jpeg',
            ],
            [
                'brand' => 'Mazda',
                'model' => 'CX-5',
                'price_per_day' => 155.00,
                'image' => 'public/images/mazda_cx5.jpeg',
            ],
            [
                'brand' => 'Volkswagen',
                'model' => 'Passat',
                'price_per_day' => 165.00,
                'image' => 'public/images/vw_passat.jpeg',
            ],
        ]);
    }
}

