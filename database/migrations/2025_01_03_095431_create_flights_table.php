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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('departure'); // Departure location
            $table->string('arrival');   // Arrival location
            $table->time('departure_time'); // Departure time
            $table->time('arrival_time');   // Arrival time
            $table->decimal('price', 8, 2); // Ticket price
            $table->string('airline')->nullable(); // Airline name
            $table->string('image')->nullable();   // Image URL (for visuals)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
