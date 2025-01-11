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
        Schema::table('payments', function (Blueprint $table) {
            $table->string('user_name'); // New column for user name
            $table->integer('quantity'); // New column for quantity
            $table->text('description'); // New column for description
            $table->dropColumn('payment_method'); // Remove payment_method column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn('user_name');
            $table->dropColumn('quantity');
            $table->dropColumn('description');
            $table->string('payment_method'); // Add payment_method column back
        });
    }
};
