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
        Schema::table('attractions', function (Blueprint $table) {
            // Add the missing 'category' column and any other columns you need
            // $table->string('category')->nullable();  // Example column for category
            $table->string('place');  // For the name of the attraction/place
            $table->text('description');  // Description of the attraction
            $table->decimal('price', 8, 2);  // Price of the attraction
            $table->decimal('rating', 3, 2)->nullable();  // Rating of the attraction
            $table->date('available_date')->nullable();  // Date for availability of the attraction
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attractions', function (Blueprint $table) {
            // Drop the columns in case the migration is rolled back
            $table->dropColumn(['place', 'description', 'price', 'rating', 'available_date']);
        });
    }
};
