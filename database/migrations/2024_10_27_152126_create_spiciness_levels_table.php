<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpicinessLevelsTable extends Migration
{
    public function up()
    {
        Schema::create('spiciness_levels', function (Blueprint $table) {
            $table->id();
            $table->string('level');
            $table->decimal('price', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('spiciness_levels');
    }
}
