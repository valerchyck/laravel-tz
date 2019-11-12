<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManufacturerType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manufacturer_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_manufacturer');
            $table->bigInteger('id_type');
            $table->unique(['id_manufacturer', 'id_type']);
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
        Schema::dropIfExists('manufacturer_type');
    }
}
