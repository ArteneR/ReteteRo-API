<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RecipeComment;


class RecipeCommentsSeeder extends Seeder
{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
                RecipeComment::create([
                        'recipe_id' => 1,
                        'user_id'   => 3,
                        'guest_id'  => null,
                        'comment'   => 'Test comment'
                ]);
        }
}
