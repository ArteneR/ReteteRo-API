<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateRecipeViewsTable extends Migration
{
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
                Schema::create('recipe_views', function (Blueprint $table) {
                        $table->increments('id');
                        $table->integer('recipe_id')->unsigned();
                        $table->foreign('recipe_id')->references('id')->on('recipes');
                        $table->integer('user_id')->unsigned()->nullable();
                        $table->foreign('user_id')->references('id')->on('users');
                        $table->integer('guest_id')->unsigned()->nullable();
                        $table->foreign('guest_id')->references('id')->on('guests');
                        $table->timestamps();
                        $table->unique(['recipe_id', 'user_id']);
                        $table->unique(['recipe_id', 'guest_id']);
                });
        }


        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
                Schema::disableForeignKeyConstraints();
                Schema::dropIfExists('recipe_views');
                Schema::enableForeignKeyConstraints();
        }
}
