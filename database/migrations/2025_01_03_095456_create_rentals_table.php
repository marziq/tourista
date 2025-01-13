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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_id');
            $table->date('pickup_date');
            $table->date('return_date');
            $table->decimal('price_per_day', 8, 2);
            $table->integer('number_of_days');
            $table->decimal('total_payment', 10, 2);
            $table->string('location');
            $table->string('customer_name');
            $table->string('bank_details');
            $table->timestamps();

            $table->foreign('vehicle_id')->references('id')->on('vehicle');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
