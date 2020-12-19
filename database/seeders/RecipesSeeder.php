<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recipe;


class RecipesSeeder extends Seeder
{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
                Recipe::create([
                        'title'              => 'Ciorba de fasole galbena',
                        'author_id'          => 3,
                        'description'        => 'Pentru ca este sezonul legumelor proaspete de tot felul, am ales sa pregatesc o ciorba de fasole galbena, cu dovlecel.',
                        'time'               => '45 min',
                        'difficulty'         => 'medium',
                        'portions'           => 5,
                        'ingredients'        => '[
                            {
                                "quantity": 1,
                                "unit": "piece",
                                "ingredient": "ceapa galbena",
                                "order": 1
                            },
                            {
                                "quantity": 500,
                                "unit": "ml",
                                "ingredient": "apa",
                                "order": 2
                            }
                        ]',
                        'preparation_method' => '[
                            {
                                "direction": "Se curata si se spala legumele",
                                "order": 1
                            },
                            {
                                "direction": "Intr-o oala cu capacitate de ...",
                                "order": 2
                            }
                        ]'
                ]);
        }
}
