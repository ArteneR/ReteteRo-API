<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateRecipeCategoriesTable extends Migration
{
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
                Schema::create('recipe_categories', function (Blueprint $table) {
                        $table->increments('id');
                        $table->integer('recipe_id')->unsigned();
                        $table->foreign('recipe_id')->references('id')->on('recipes');
                        $table->integer('category_id')->unsigned();
                        $table->foreign('category_id')->references('id')->on('available_recipe_categories');
                        $table->timestamps();
                        $table->unique(['recipe_id', 'category_id']);
                });
        }


        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
                Schema::disableForeignKeyConstraints();
                Schema::dropIfExists('recipe_categories');
                Schema::enableForeignKeyConstraints();
        }
}
