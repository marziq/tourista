<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class ClearFlightsTable extends Migration
{
    public function up()
    {
        // Delete all records from the flights table
        DB::table('flights')->delete();
    }

    public function down()
    {
        // Optionally, you can reverse the operation if needed
        // But for this case, the `down()` method might not be necessary
    }
}

