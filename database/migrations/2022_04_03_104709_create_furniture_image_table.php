<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('furniture_image', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('image_id')->unsigned()->unique();
            $table->bigInteger('furniture_id')->unsigned();
            $table->foreign('furniture_id')->references('id')->on('furniture')->onDelete('cascade');
            $table->foreign('image_id')->references('id')->on('images');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('furniture_image');
    }
};
