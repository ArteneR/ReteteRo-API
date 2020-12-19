<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateRecipesTable extends Migration
{
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
                Schema::create('recipes', function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('title');
                    $table->integer('author_id')->unsigned();
                    $table->foreign('author_id')->references('id')->on('users');
                    $table->string('description', 1000);
                    $table->string('time');
                    $table->string('difficulty');
                    $table->double('portions', 8, 1);
                    $table->json('ingredients');
                    $table->json('preparation_method');
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
                Schema::dropIfExists('recipes');
                Schema::enableForeignKeyConstraints();
        }
}
