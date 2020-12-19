<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class DatabaseSeeder extends Seeder
{
        /**
         * Seed the application's database.
         *
         * @return void
         */
        public function run() {
                // Disable all mass assignment restrictions
                Model::unguard();
            
                $this->call(AvailableRecipeCategoriesSeeder::class);
                $this->call(PagesContentSeeder::class);
                $this->call(GuestsSeeder::class);
                $this->call(UsersSeeder::class);
                $this->call(RecipesSeeder::class);
                $this->call(UserFavoriteRecipesSeeder::class);
                $this->call(UserResetPasswordCodesSeeder::class);
                $this->call(RecipeCategoriesSeeder::class);
                $this->call(RecipeCommentsSeeder::class);
                $this->call(RecipeImagesSeeder::class);
                $this->call(RecipeViewsSeeder::class);
                $this->call(RecipeVotesSeeder::class);
            
                // Re enable all mass assignment restrictions
                Model::reguard();
        }
}
