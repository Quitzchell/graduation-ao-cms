<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $franceCities = [
            ['name' => 'Nancy'],
            ['name' => 'Ajaccio'],
            ['name' => 'Montpellier'],
            ['name' => 'Paris'],
            ['name' => 'Martinique'],
        ];

        $austrianCities = [
            ['name' => 'Vienna'],
            ['name' => 'Innsbruck'],
        ];

        $germanyCities = [
            ['name' => 'Dresden'],
            ['name' => 'Munich'],
        ];

        $ukCities = [
            ['name' => 'Saint Helena'],
            ['name' => 'London'],
        ];

        $spanishCities = [
          ['name' => 'Madrid'],
        ];

        $swissCities = [
            ['name' => 'Arenenberg'],
        ];

        $italianCities = [
            ['name' => 'Portici'],
            ['name' => 'Florence'],
            ['name' => 'Napels'],
            ['name' => 'Rome'],
            ['name' => 'Parma'],
            ['name' => 'Livorno'],
        ];

        foreach ($franceCities as $city) {
            City::create(array_merge($city, ['country_id' => Country::where('name', 'France')->first()->getKey()]));
        }
        foreach ($austrianCities as $city) {
            City::create(array_merge($city, ['country_id' => Country::where('name', 'Austria')->first()->getKey()]));
        }
        foreach ($ukCities as $city) {
            City::create(array_merge($city, ['country_id' => Country::where('name', 'United Kingdom')->first()->getKey()]));
        }
        foreach ($spanishCities as $city) {
            City::create(array_merge($city, ['country_id' => Country::where('name', 'Spain')->first()->getKey()]));
        }
        foreach ($italianCities as $city) {
            City::create(array_merge($city, ['country_id' => Country::where('name', 'Italy')->first()->getKey()]));
        }
        foreach ($germanyCities as $city) {
            City::create(array_merge($city, ['country_id' => Country::where('name', 'Germany')->first()->getKey()]));
        }
        foreach ($swissCities as $city) {
            City::create(array_merge($city, ['country_id' => Country::where('name', 'Switzerland')->first()->getKey()]));
        }
    }
}
