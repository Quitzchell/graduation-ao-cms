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
            HomePageSeeder::class,
            BlogPageSeeder::class,
            BlogPostSeeder::class,
            BlogPostContentSeeder::class,
        ];

        if (app()->environment() === 'local') {
            $seeders = array_merge($seeders, [

            ]);
        }

        $this->call($seeders);
    }
}
