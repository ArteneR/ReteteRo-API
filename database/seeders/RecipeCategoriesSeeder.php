<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RecipeCategory;


class RecipeCategoriesSeeder extends Seeder
{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
                RecipeCategory::create([
                        'recipe_id'   => 1,
                        'category_id' => 1
                ]);
        }
}
