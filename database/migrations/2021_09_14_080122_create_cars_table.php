<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('brand', 25);
            $table->string('model_name', 50);
            $table->string('engine', 50);
            $table->smallInteger('hp');
            $table->string('vin', 17);
            $table->string('color', 25);
            $table->text('picture');
            $table->boolean('brand_new');
            $table->double('price', 9, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
