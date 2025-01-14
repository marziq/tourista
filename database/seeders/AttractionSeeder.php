<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\Attraction;

class AttractionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Attraction::insert([
            [
                'id' => 1,
                'name' => 'The Top Penang',
                'location' => 'Pulau Pinang',
                'description' => 'The Top Penang offers breathtaking views of the city and exciting activities like the Rainbow Skywalk and Jurassic Research Center.',
                'price' => 78.0,
                'image' => '/images/TheTopPenang.png',
            ],
            [
                'id' => 2,
                'name' => 'Penang Hill Funicular',
                'location' => 'Pulau Pinang',
                'description' => 'Experience the scenic beauty of Penang from the top of Penang Hill via the famous funicular train ride.',
                'price' => 25.0,
                'image' => '/images/PenangHillFunicular.jpg',
            ],
            [
                'id' => 3,
                'name' => 'Wonderfood Museum Penang',
                'location' => 'Pulau Pinang',
                'description' => 'A museum showcasing life-sized replicas of traditional Malaysian dishes, celebrating the country’s culinary heritage.',
                'price' => 35.0,
                'image' => '/images/WonderfoodMuseum.jpg',
            ],
            [
                'id' => 4,
                'name' => 'Entopia Penang Butterfly Farm',
                'location' => 'Pulau Pinang',
                'description' => 'Entopia is home to thousands of butterflies and other insects in a beautifully landscaped environment.',
                'price' => 125.0,
                'image' => '/images/EntopiaButterflyFarm.jpg',
            ],
            [
                'id' => 5,
                'name' => 'TeddyVille Museum Penang',
                'location' => 'Pulau Pinang',
                'description' => 'A charming museum showcasing an extensive collection of teddy bears from around the world, perfect for all ages.',
                'price' => 85.0,
                'image' => '/images/TeddyVilleMuseum.jpg',
            ],
            [
                'id' => 6,
                'name' => 'District21',
                'location' => 'Kuala Lumpur',
                'description' => 'District21 is an indoor theme park offering a variety of adventure-based activities and obstacles for thrill-seekers.',
                'price' => 75.0,
                'image' => '/images/District21.jpeg',
            ],
            [
                'id' => 7,
                'name' => 'Kidzania',
                'location' => 'Kuala Lumpur',
                'description' => 'Kidzania is an interactive city for children to explore careers and experience life as professionals.',
                'price' => 89.0,
                'image' => '/images/Kidzania.jpg',
            ],
            [
                'id' => 8,
                'name' => 'Petronas Twin Tower',
                'location' => 'Kuala Lumpur',
                'description' => 'The iconic Petronas Twin Towers offer stunning views of Kuala Lumpur and a unique architectural experience.',
                'price' => 89.0,
                'image' => '/images/PetronasTwinTower.jpg',
            ],
            [
                'id' => 9,
                'name' => 'Aquaria KLCC',
                'location' => 'Kuala Lumpur',
                'description' => 'Aquaria KLCC is an impressive oceanarium showcasing a variety of marine life and interactive exhibits.',
                'price' => 75.0,
                'image' => '/images/AquariaKLCC.jpg',
            ],
            [
                'id' => 10,
                'name' => 'Sunway Lagoon',
                'location' => 'Kuala Lumpur',
                'description' => 'Sunway Lagoon is a multi-park destination featuring a water park, amusement park, wildlife park, and more.',
                'price' => 250.0,
                'image' => '/images/sunwayy.jpg',
            ],
            [
                'id' => 11,
                'name' => 'Hop-On-Hop-Off Bus',
                'location' => 'Kuala Lumpur',
                'description' => 'Hop-On-Hop-Off Bus offers a convenient way to explore Kuala Lumpur’s main attractions at your own pace.',
                'price' => 25.0,
                'image' => '/images/HopOnHopOffBus.jpg',
            ],
            [
                'id' => 12,
                'name' => 'SuperPark Malaysia',
                'location' => 'Kuala Lumpur',
                'description' => 'SuperPark Malaysia offers a variety of exciting and interactive indoor activities for all ages.',
                'price' => 78.0,
                'image' => '/images/SuperParkMalaysia.jpg',
            ],
            [
                'id' => 13,
                'name' => 'Wonderpark Melaka',
                'location' => 'Melaka',
                'description' => 'Wonderpark Melaka provides a delightful family-friendly experience with various attractions and entertainment options.',
                'price' => 25.0,
                'image' => '/images/WonderparkMelaka.jpg',
            ],
            [
                'id' => 14,
                'name' => 'Malaysia Heritage Studios',
                'location' => 'Melaka',
                'description' => 'Explore Malaysia’s rich cultural history and film heritage at the Malaysia Heritage Studios.',
                'price' => 48.9,
                'image' => '/images/MalaysiaHeritageStudios.jpg',
            ],
            [
                'id' => 15,
                'name' => 'Melaka Crocodile and Recreation Park',
                'location' => 'Melaka',
                'description' => 'The Melaka Crocodile and Recreation Park features crocodile exhibits and recreational activities for the family.',
                'price' => 14.0,
                'image' => '/images/MelakaCrocodilePark.jpg',
            ],
            [
                'id' => 16,
                'name' => 'AFamosa Ticket',
                'location' => 'Melaka',
                'description' => 'Visit the historic AFamosa and explore its cultural and architectural significance.',
                'price' => 70.0,
                'image' => '/images/AFamosaTicket.jpg',
            ],
            [
                'id' => 17,
                'name' => 'SKYTREX Adventure',
                'location' => 'Melaka',
                'description' => 'SKYTREX Adventure offers thrilling treetop challenges for adventure lovers in a natural setting.',
                'price' => 89.0,
                'image' => '/images/SKYTREXAdventure.jpg',
            ],
        ]);
    }
}
