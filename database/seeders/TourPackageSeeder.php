<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\TourPackage;
class TourPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TourPackage::insert ([
            [
                'id' => 2,
                'package_name' => '5D4N Desaru Coast Package',
                'description' => "Discover the Allure of Desaru Coast – Your Perfect Getaway Awaits!\n Immerse yourself in the pristine beauty and vibrant attractions of Desaru Coast, one of Malaysia’s premier holiday destinations. This exclusive package offers you a blend of relaxation.",
                'price' => 1500.0,
                'image' => 'images/Desaru.png',
            ],
            [
                'id' => 3,
                'package_name' => 'Cherating Resort Package',
                'description' => 'Escape to the serene coastal charm of Cherating, Pahang, and indulge in an idyllic getaway filled with sun-kissed beaches, vibrant culture, and natural wonders. Our exclusive package promises a rejuvenating blend of relaxation, adventure, and local delights.',
                'price' => 2999.99,
                'image' => 'images/Cherating.jpg',
            ],
            [
                'id' => 4,
                'package_name' => 'Langkawi Island Getaway',
                'description' => 'Discover the enchanting beauty of Langkawi, the Jewel of Kedah. Unwind on pristine beaches, explore lush rainforests, and enjoy a unique blend of relaxation and adventure in this tropical paradise.',
                'price' => 1999.99,
                'image' => 'images/Langkawi.jpg',
            ],
            [
                'id' => 5,
                'package_name' => 'Maldives Overwater Villas Package',
                'description' => 'Experience ultimate luxury and tranquility in the Maldives. Stay in exquisite overwater villas, soak in breathtaking ocean views, and enjoy unparalleled hospitality in a tropical paradise.',
                'price' => 7999.99,
                'image' => 'images/Maldives.jpg',
            ],
            [
                'id' => 6,
                'package_name' => 'Genting Dream Cruise Package',
                'description' => 'Set sail on the vibrant Genting Dream Cruise, offering luxurious cabins, world-class dining, thrilling entertainment, and picturesque ocean views. Perfect for an unforgettable maritime adventure.',
                'price' => 4999.99,
                'image' => 'images/Cruise.jpg',
            ],
        ]);
    }
}
