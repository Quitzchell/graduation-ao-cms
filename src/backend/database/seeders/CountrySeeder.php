<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            ['name' => 'Netherlands'],
            ['name' => 'United Kingdom'],
            ['name' => 'France'],
            ['name' => 'Belgium'],
            ['name' => 'Austria'],
            ['name' => 'Spain'],
            ['name' => 'Germany'],
            ['name' => 'Italy'],
            ['name' => 'Switzerland'],
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}
