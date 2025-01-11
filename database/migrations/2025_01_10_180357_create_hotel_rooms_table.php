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
        Schema::create('hotel_rooms', function (Blueprint $table) {
            $table->id(); // Default primary key
            $table->unsignedBigInteger('hotel_id'); // Foreign key to hotels table
            $table->string('room');
            $table->decimal('price', 8, 2); // Add price column
            $table->boolean('available');
            $table->date('checkin_date');
            $table->date('checkout_date');
            $table->timestamps();

            // Define the foreign key constraint
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_rooms');
    }
};
