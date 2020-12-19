<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guest;


class GuestsSeeder extends Seeder
{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
                Guest::create([
                        'guest_key' => 'test-guest-key'
                ]);
        }
}
