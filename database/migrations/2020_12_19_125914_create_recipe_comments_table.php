<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateRecipeCommentsTable extends Migration
{
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
                Schema::create('recipe_comments', function (Blueprint $table) {
                        $table->increments('id');
                        $table->integer('recipe_id')->unsigned();
                        $table->foreign('recipe_id')->references('id')->on('recipes');
                        $table->integer('user_id')->unsigned();
                        $table->foreign('user_id')->references('id')->on('users');
                        $table->integer('guest_id')->unsigned();
                        $table->foreign('guest_id')->references('id')->on('guests');
                        $table->string('comment', 1000);
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
                Schema::dropIfExists('recipe_comments');
                Schema::enableForeignKeyConstraints();
        }
}
