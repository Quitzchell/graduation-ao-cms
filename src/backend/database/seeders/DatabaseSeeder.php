<?php

namespace Database\Seeders;

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
            TopicSeeder::class,
            HomePageSeeder::class,
        ];

        if (app()->environment() === 'local') {
            $seeders = array_merge($seeders, [

            ]);
        }

        $this->call($seeders);
    }
}
