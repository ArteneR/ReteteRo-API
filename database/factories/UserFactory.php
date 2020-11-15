<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class UserFactory extends Factory
{
        /**
         * The name of the factory's corresponding model.
         *
         * @var string
         */
        protected $model = \App\Models\User::class;

        
        /**
         * Define the model's default state.
         *
         * @return array
         */
        public function definition() {
                return [
                    'username'   => $this->faker->userName,
                    'password'   => bcrypt('Amiga1200'),
                    'email'      => $this->faker->unique()->safeEmail,
                    'first_name' => $this->faker->name,
                    'last_name'  => $this->faker->name,
                    'roles'      => 'user'
                ];
        }
}
