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
                // Recipe #1
                RecipeImage::create([
                        'recipe_id'      => 1,
                        'image'          => 'pui-marinat-cu-sos-de-rosii-cu-iaurt.jpg',
                        'is_cover_image' => 'yes',
                        'order'          => 1
                ]);

                RecipeImage::create([
                        'recipe_id'      => 1,
                        'image'          => 'pui-marinat-cu-sos-de-rosii-cu-iaurt-8250.jpg',
                        'is_cover_image' => 'no',
                        'order'          => 2
                ]);

                RecipeImage::create([
                        'recipe_id'      => 1,
                        'image'          => 'pui-marinat-cu-sos-de-rosii-cu-iaurt-8251.jpg',
                        'is_cover_image' => 'no',
                        'order'          => 3
                ]);

                RecipeImage::create([
                        'recipe_id'      => 1,
                        'image'          => 'pui-marinat-cu-sos-de-rosii-cu-iaurt-8252.jpg',
                        'is_cover_image' => 'no',
                        'order'          => 4
                ]);


                // Recipe #2
                RecipeImage::create([
                        'recipe_id'      => 2,
                        'image'          => 'tocanita-de-vita-cu-legume-la-cuptor.jpg',
                        'is_cover_image' => 'yes',
                        'order'          => 1
                ]);

                RecipeImage::create([
                        'recipe_id'      => 2,
                        'image'          => 'tocanita-de-vita-cu-legume-la-cuptor-8236.jpg',
                        'is_cover_image' => 'no',
                        'order'          => 2
                ]);

                RecipeImage::create([
                        'recipe_id'      => 2,
                        'image'          => 'tocanita-de-vita-cu-legume-la-cuptor-8237.jpg',
                        'is_cover_image' => 'no',
                        'order'          => 3
                ]);

                RecipeImage::create([
                        'recipe_id'      => 2,
                        'image'          => 'tocanita-de-vita-cu-legume-la-cuptor-8238.jpg',
                        'is_cover_image' => 'no',
                        'order'          => 4
                ]);


                // Recipe #3
                RecipeImage::create([
                        'recipe_id'      => 3,
                        'image'          => 'muschiulet-de-vita-cu-salsa-de-porumb-si-cartofi-dulci.jpg',
                        'is_cover_image' => 'yes',
                        'order'          => 1
                ]);

                RecipeImage::create([
                        'recipe_id'      => 3,
                        'image'          => 'muschiulet-de-vita-cu-salsa-de-porumb-si-cartofi-dulci-8208.jpg',
                        'is_cover_image' => 'no',
                        'order'          => 2
                ]);

                RecipeImage::create([
                        'recipe_id'      => 3,
                        'image'          => 'muschiulet-de-vita-cu-salsa-de-porumb-si-cartofi-dulci-8209.jpg',
                        'is_cover_image' => 'no',
                        'order'          => 3
                ]);


                // Recipe #4
                RecipeImage::create([
                        'recipe_id'      => 4,
                        'image'          => 'muschiulet-marinat-la-gratar-cu-spanac.jpg',
                        'is_cover_image' => 'yes',
                        'order'          => 1
                ]);
        }
}
