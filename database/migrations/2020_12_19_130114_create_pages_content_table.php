<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreatePagesContentTable extends Migration
{
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
                Schema::create('pages_content', function (Blueprint $table) {
                        $table->increments('id');
                        $table->string('page', 100)->unique();
                        $table->text('content', 1000000);
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
                Schema::dropIfExists('pages_content');
                Schema::enableForeignKeyConstraints();
        }
}
