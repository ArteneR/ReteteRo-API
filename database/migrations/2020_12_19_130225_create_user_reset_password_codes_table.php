<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateUserResetPasswordCodesTable extends Migration
{
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
                Schema::create('user_reset_password_codes', function (Blueprint $table) {
                        $table->increments('id');
                        $table->integer('user_id')->unsigned()->unique();
                        $table->foreign('user_id')->references('id')->on('users');
                        $table->string('code', 100);
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
                Schema::dropIfExists('user_reset_password_codes');
                Schema::enableForeignKeyConstraints();
        }
}
