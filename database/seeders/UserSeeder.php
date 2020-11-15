<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
                \App\Models\User::factory()->count(2)->create();

                \App\Models\User::create([
                        'username'   => 'ArteneR',
                        'password'   => bcrypt('Amiga1200'),
                        'email'      => 'georgevici.ioan@gmail.com',
                        'first_name' => 'Mihai',
                        'last_name'  => 'Georgevici',
                        'roles'      => 'user,admin'
                ]);
        }
}
