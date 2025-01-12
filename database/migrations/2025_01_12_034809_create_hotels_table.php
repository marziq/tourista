<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Hotel name
            $table->string('location'); // Location of the hotel
            $table->decimal('price', 10, 2); // Price of rooms
            $table->text('description'); // Description of the room type
            $table->integer('available_rooms')->default(0); // Number of available rooms
            $table->string('image'); // Image file name or path
            $table->timestamps(); // Created_at and Updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
