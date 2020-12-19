<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserFavoriteRecipe;


class UserFavoriteRecipesSeeder extends Seeder
{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
                UserFavoriteRecipe::create([
                        'user_id'   => 3,
                        'recipe_id' => 1
                ]);
        }
}
