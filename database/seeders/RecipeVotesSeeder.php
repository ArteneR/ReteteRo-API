<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RecipeVote;


class RecipeVotesSeeder extends Seeder
{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
                RecipeVote::create([
                        'recipe_id' => 1,
                        'user_id'   => 3,
                        'guest_id'  => null,
                        'vote'      => 5
                ]);
        }
}
