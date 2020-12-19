<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateRecipeImagesTable extends Migration
{
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
                Schema::create('recipe_images', function (Blueprint $table) {
                        $table->increments('id');
                        $table->integer('recipe_id')->unsigned();
                        $table->foreign('recipe_id')->references('id')->on('recipes');
                        $table->string('image', 1000);
                        $table->string('is_cover_image', 10);
                        $table->integer('order')->unsigned();
                        $table->timestamps();
                });
        }


        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
                Schema::disableForeignKeyConstraints();
                Schema::dropIfExists('recipe_images');
                Schema::enableForeignKeyConstraints();
        }
}
