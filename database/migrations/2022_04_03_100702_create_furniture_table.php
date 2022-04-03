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
        Schema::create('furniture', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('body');
            $table->integer('price');
            $table->integer('old_price')->nullable();
            $table->string('salon')->nullable();
            $table->integer('width')->nullable();
            $table->integer('year')->nullable();
            $table->integer('furniture_manufacture_id')->nullable()->unsigned();
            $table->integer('furniture_category_id')->nullable()->unsigned();
            $table->string('color')->nullable();
            $table->boolean('is_new')->default(false);
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
        Schema::dropIfExists('furniture');
    }
};
