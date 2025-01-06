<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttractionsTable extends Migration
{
    public function up()
    {
        Schema::create('attractions', function (Blueprint $table) {
            $table->id();
            $table->string('place');
            $table->integer('quantity_ticket')->default(0);
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->float('rating', 2, 1)->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('attractions');
    }
}
