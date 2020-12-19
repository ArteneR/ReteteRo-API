<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AvailableRecipeCategory;


class AvailableRecipeCategoriesSeeder extends Seeder
{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
                AvailableRecipeCategory::create([
                        'category' => 'Supe si Ciorbe'
                ]);
        }
}
