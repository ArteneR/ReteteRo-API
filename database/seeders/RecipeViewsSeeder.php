<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RecipeView;


class RecipeViewsSeeder extends Seeder
{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
                RecipeView::create([
                        'recipe_id' => 1,
                        'user_id'   => 1,
                        'guest_id'  => null
                ]);
        }
}
