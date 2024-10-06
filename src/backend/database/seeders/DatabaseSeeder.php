<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Country;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $seeders = [
            ManagedContentSeeder::class,
            SettingsSeeder::class,
            UsersSeeder::class,
            CategorySeeder::class,
            BlogPostSeeder::class,
            HomePageSeeder::class,
            BlogPageSeeder::class,
        ];

        if (app()->environment() === 'local') {
            $seeders = array_merge($seeders, [

            ]);
        }

        $this->call($seeders);
    }
}
