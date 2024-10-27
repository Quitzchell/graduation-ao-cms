<?php

namespace Database\Seeders;

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
        ];

        if (app()->environment() === 'local') {
            $seeders = array_merge($seeders, [
                HomePageSeeder::class,
                BlogPageSeeder::class,
                ReviewPageSeeder::class,
                CategorySeeder::class,
                BlogPostSeeder::class,
                MediaItemSeeder::class,
                ContentSeeder::class,
                ReviewSeeder::class,
                MovieSeeder::class,
                BookSeeder::class,
            ]);
        }

        $this->call($seeders);
    }
}
