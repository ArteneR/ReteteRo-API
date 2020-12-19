<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RecipeImage;


class RecipeImagesSeeder extends Seeder
{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
                RecipeImage::create([
                        'recipe_id'      => 1,
                        'image'          => 'test/image.jpg',
                        'is_cover_image' => 'yes',
                        'order'          => 1
                ]);
        }
}
