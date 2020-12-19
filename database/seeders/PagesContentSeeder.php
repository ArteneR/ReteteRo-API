<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PageContent;


class PagesContentSeeder extends Seeder
{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
                PageContent::create([
                        'page'    => 'terms-and-conditions',
                        'content' => 'Test Terms and Conditions page content'
                ]);
        }
}
