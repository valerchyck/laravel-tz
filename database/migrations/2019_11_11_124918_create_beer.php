<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_manufacturer')->unsigned();
            $table->bigInteger('id_type')->unsigned();
            $table->string('name');
            $table->text('description');
            $table->timestamps();
            $table->foreign('id_manufacturer')->references('id')->on('manufacturers')->onDelete('cascade');
            $table->foreign('id_type')->references('id')->on('beer_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beer');
    }
}
