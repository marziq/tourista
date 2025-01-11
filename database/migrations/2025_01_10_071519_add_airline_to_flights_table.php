<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAirlineToFlightsTable extends Migration
{
    public function up()
    {
        Schema::table('flights', function (Blueprint $table) {
            $table->string('airline');  // Adds the airline column
        });
    }

    public function down()
    {
        Schema::table('flights', function (Blueprint $table) {
            $table->dropColumn('airline');  // Drops the airline column if this migration is rolled back
        });
    }
}
