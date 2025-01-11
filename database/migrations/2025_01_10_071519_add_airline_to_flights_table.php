<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAirlineToFlightsTable extends Migration
{
    // In the migration file:
public function up()
{
    Schema::table('flights', function (Blueprint $table) {
        $table->integer('passenger_count')->default(0)->change();
    });
}

public function down()
{
    Schema::table('flights', function (Blueprint $table) {
        $table->integer('passenger_count')->change();
    });
}
}
