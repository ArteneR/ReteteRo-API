<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserResetPasswordCode;


class UserResetPasswordCodesSeeder extends Seeder
{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
                UserResetPasswordCode::create([
                        'user_id' => 3,
                        'code'    => 'user-reset-password-code'
                ]);
        }
}
