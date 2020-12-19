<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class UsersSeeder extends Seeder
{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
                User::factory()->count(2)->create();

                User::create([
                        'username'   => 'ArteneR',
                        'password'   => bcrypt('Amiga1200'),
                        'email'      => 'georgevici.ioan@gmail.com',
                        'first_name' => 'Mihai',
                        'last_name'  => 'Georgevici',
                        'roles'      => 'user,admin'
                ]);
        }
}
