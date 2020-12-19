<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateUserFavoriteRecipesTable extends Migration
{
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
                Schema::create('user_favorite_recipes', function (Blueprint $table) {
                        $table->increments('id');
                        $table->integer('user_id')->unsigned();
                        $table->foreign('user_id')->references('id')->on('users');
                        $table->integer('recipe_id')->unsigned();
                        $table->foreign('recipe_id')->references('id')->on('recipes');
                        $table->timestamps();
                        $table->unique(['user_id', 'recipe_id']);
                });
        }


        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
                Schema::disableForeignKeyConstraints();
                Schema::dropIfExists('user_favorite_recipes');
                Schema::enableForeignKeyConstraints();
        }
}
