<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


// lanciate composer require doctrine/dbal
// cancellate il composer.lock
// in composer.json modificate 
// "doctrine/dbal": "^3.1"
// con "doctrine/dbal": "^2.1"
// eseguite composer install

class ChangeTitleBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->text('title')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('title', 255)->change();
        });
    }
}
