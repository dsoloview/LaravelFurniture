<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // if (Schema::hasTable('articles')) {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title', 100);
            $table->string('description', 255);
            $table->bigInteger('image_id')->unsigned()->unique();
            $table->text('body');
            $table->date('published_at')->nullable();
            $table->timestamps();
        });
        // } else {
        //     Schema::table('articles', function (Blueprint $table) {
        //         $table->string('image')->nullable();
        //     });
        // }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
