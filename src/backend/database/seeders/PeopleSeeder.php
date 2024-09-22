<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Person;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locale = 'NL-nl';

        $cities = City::whereIn('name', [
            'Nancy', 'Innsbruck', 'Vienna', 'Madrid', 'Dresden', 'Florence', 'Portici', 'Napels',
            'Ajaccio', 'Montpellier', 'Rome', 'Saint Helena', 'Martinique', 'Paris', 'Parma',
            'Munich', 'Arenenberg', 'London', 'Livorno',
        ])->get()->keyBy('name');

        $cityId = fn($name) => $cities->get($name)->getKey();

        $firstGeneration = [
            [
                'name' => 'Francis',
                'surname' => 'Stephen',
                'place_of_birth_id' => $cityId('Nancy'),
                'place_of_death_id' => $cityId('Innsbruck'),
                'date_of_birth' => Carbon::parseFromLocale('08-12-1708', $locale),
                'date_of_death' => Carbon::parseFromLocale('18-8-1765', $locale),
                'profile_img_path' => 'images/francis-stephen.jpg',
                'gender' => 'M',
            ],
            [
                'name' => 'Maria',
                'surname' => 'Theresa',
                'place_of_birth_id' => $cityId('Vienna'),
                'place_of_death_id' => $cityId('Vienna'),
                'date_of_birth' => Carbon::parseFromLocale('08-12-1708', $locale),
                'date_of_death' => Carbon::parseFromLocale('18-8-1765', $locale),
                'profile_img_path' => 'images/maria-theresa-1.jpg',
                'gender' => 'F',
            ],
            [
                'name' => 'Charles',
                'surname' => 'Sebastian',
                'place_of_birth_id' => $cityId('Madrid'),
                'place_of_death_id' => $cityId('Madrid'),
                'date_of_birth' => Carbon::parseFromLocale('10-1-1716', $locale),
                'date_of_death' => Carbon::parseFromLocale('14-12-1788', $locale),
                'profile_img_path' => 'images/charles-sebastian.jpg',
                'gender' => 'M',
            ],
            [
                'name' => 'Maria',
                'surname' => 'Amalia',
                'place_of_birth_id' => $cityId('Dresden'),
                'place_of_death_id' => $cityId('Madrid'),
                'date_of_birth' => Carbon::parseFromLocale('24-11-1724', $locale),
                'date_of_death' => Carbon::parseFromLocale('27-09-1760', $locale),
                'profile_img_path' => 'images/maria-amalia.jpg',
                'gender' => 'F',
            ],
        ];

        $firstGen = $this->createPeople($firstGeneration);
        $this->setRelationships([
            [$firstGen['Francis Stephen'], $firstGen['Maria Theresa'], 'married'],
            [$firstGen['Charles Sebastian'], $firstGen['Maria Amalia'], 'married']
        ]);

        $secondGeneration = [
            [
                'name' => 'Peter',
                'surname' => 'Leopold',
                'place_of_birth_id' => $cityId('Vienna'),
                'place_of_death_id' => $cityId('Florence'),
                'date_of_birth' => Carbon::parseFromLocale('5-05-1747', $locale),
                'date_of_death' => Carbon::parseFromLocale('1-03-1792', $locale),
                'father_id' => $firstGen['Francis Stephen']->getKey(),
                'mother_id' => $firstGen['Maria Theresa']->getKey(),
                'profile_img_path' => 'images/peter-leopold.jpg',
                'gender' => 'M',
            ],
            [
                'name' => 'Marie',
                'surname' => 'Louise',
                'place_of_birth_id' => $cityId('Portici'),
                'place_of_death_id' => $cityId('Vienna'),
                'date_of_birth' => Carbon::parseFromLocale('24-11-1745', $locale),
                'date_of_death' => Carbon::parseFromLocale('15-05-1792', $locale),
                'father_id' => $firstGen['Charles Sebastian']->getKey(),
                'mother_id' => $firstGen['Maria Amalia']->getKey(),
                'profile_img_path' => 'images/marie-louise.jpg',
                'gender' => 'F',
            ],

            [
                'name' => 'Ferdinand',
                'surname' => 'Benedictus',
                'place_of_birth_id' => $cityId('Napels'),
                'place_of_death_id' => $cityId('Napels'),
                'date_of_birth' => Carbon::parseFromLocale('12-01-1751', $locale),
                'date_of_death' => Carbon::parseFromLocale('4-01-1825', $locale),
                'father_id' => $firstGen['Charles Sebastian']->getKey(),
                'mother_id' => $firstGen['Maria Amalia']->getKey(),
                'profile_img_path' => 'images/ferdinand-benedictus.jpg',
                'gender' => 'M',
            ],
            [
                'name' => 'Maria',
                'surname' => 'Carolina',
                'place_of_birth_id' => $cityId('Vienna'),
                'place_of_death_id' => $cityId('Vienna'),
                'date_of_birth' => Carbon::parseFromLocale('13-08-1752', $locale),
                'date_of_death' => Carbon::parseFromLocale('8-09-1814', $locale),
                'father_id' => $firstGen['Francis Stephen']->getKey(),
                'mother_id' => $firstGen['Maria Theresa']->getKey(),
                'profile_img_path' => 'images/maria-carolina.jpg',
                'gender' => 'F',
            ],

            [
                'name' => 'Giuseppe',
                'surname' => 'Buonaparte',
                'place_of_birth_id' => $cityId('Ajaccio'),
                'place_of_death_id' => $cityId('Ajaccio'),
                'date_of_birth' => Carbon::parseFromLocale('31-05-1713', $locale),
                'date_of_death' => Carbon::parseFromLocale('13-12-1763', $locale),
                'gender' => 'M',
            ],
        ];

        $secondGen = $this->createPeople($secondGeneration);
        $this->setRelationships([
            [$secondGen['Peter Leopold'], $secondGen['Marie Louise'], 'married'],
            [$secondGen['Ferdinand Benedictus'], $secondGen['Maria Carolina'], 'married']
        ]);

        $thirdGeneration = [
            [
                'name' => 'Carlo',
                'surname' => 'Buonaparte',
                'place_of_birth_id' => $cityId('Ajaccio'),
                'place_of_death_id' => $cityId('Montpellier'),
                'date_of_birth' => Carbon::parseFromLocale('27-03-1746', $locale),
                'date_of_death' => Carbon::parseFromLocale('24-02-1785', $locale),
                'father_id' => $secondGen['Giuseppe Buonaparte']->getKey(),
                'profile_img_path' => 'images/carlo-buonaparte.jpg',
                'gender' => 'M',
            ],
            [
                'name' => 'Letizia',
                'surname' => 'Ramolino',
                'place_of_birth_id' => $cityId('Ajaccio'),
                'place_of_death_id' => $cityId('Rome'),
                'date_of_birth' => Carbon::parseFromLocale('24-08-1750', $locale),
                'date_of_death' => Carbon::parseFromLocale('02-02-1836', $locale),
                'profile_img_path' => 'images/letizia-ramolino.jpg',
                'gender' => 'F',
            ],

            [
                'name' => 'Frans',
                'surname' => 'Karl',
                'place_of_birth_id' => $cityId('Florence'),
                'place_of_death_id' => $cityId('Vienna'),
                'date_of_birth' => Carbon::parseFromLocale('12-02-1768', $locale),
                'date_of_death' => Carbon::parseFromLocale('02-03-1835', $locale),
                'father_id' => $secondGen['Peter Leopold']->getKey(),
                'mother_id' => $secondGen['Marie Louise']->getKey(),
                'profile_img_path' => 'images/frans-karl.jpg',
                'gender' => 'M',
            ],
            [
                'name' => 'Maria',
                'surname' => 'Theresa',
                'place_of_birth_id' => $cityId('Napels'),
                'place_of_death_id' => $cityId('Vienna'),
                'date_of_birth' => Carbon::parseFromLocale('06-06-1772', $locale),
                'date_of_death' => Carbon::parseFromLocale('13-04-1807', $locale),
                'father_id' => $secondGen['Ferdinand Benedictus']->getKey(),
                'mother_id' => $secondGen['Maria Carolina']->getKey(),
                'profile_img_path' => 'images/maria-theresa-2.jpg',
                'gender' => 'F',
            ],
        ];

        $thirdGen = $this->createPeople($thirdGeneration);
        $this->setRelationships([
            [$thirdGen['Carlo Buonaparte'], $thirdGen['Letizia Ramolino'], 'married'],
            [$thirdGen['Frans Karl'], $thirdGen['Maria Theresa'], 'married']
        ]);

        $fourthGeneration = [
            [
                'name' => 'Napoleon',
                'surname' => 'Bonaparte',
                'place_of_birth_id' => $cityId('Ajaccio'),
                'place_of_death_id' => $cityId('Saint Helena'),
                'date_of_birth' => Carbon::parseFromLocale('15-08-1769', $locale),
                'date_of_death' => Carbon::parseFromLocale('05-05-1821', $locale),
                'father_id' => $thirdGen['Carlo Buonaparte']->getKey(),
                'mother_id' => $thirdGen['Letizia Ramolino']->getKey(),
                'profile_img_path' => 'images/napoleon-bonaparte.jpg',
                'gender' => 'M',
            ],
            [
                'name' => 'Lodewijk',
                'surname' => 'Bonaparte',
                'place_of_birth_id' => $cityId('Ajaccio'),
                'place_of_death_id' => $cityId('Livorno'),
                'date_of_birth' => Carbon::parseFromLocale('15-08-1778', $locale),
                'date_of_death' => Carbon::parseFromLocale('05-05-1846', $locale),
                'father_id' => $thirdGen['Carlo Buonaparte']->getKey(),
                'mother_id' => $thirdGen['Letizia Ramolino']->getKey(),
                'profile_img_path' => 'images/lodewijk-bonaparte.jpg',
                'gender' => 'M',
            ],
            [
                'name' => 'Joséphine',
                'middle_name' => 'de',
                'surname' => 'Beauharnais',
                'place_of_birth_id' => $cityId('Martinique'),
                'place_of_death_id' => $cityId('Paris'),
                'date_of_birth' => Carbon::parseFromLocale('23-06-1763', $locale),
                'date_of_death' => Carbon::parseFromLocale('29-05-1814', $locale),
                'profile_img_path' => 'images/josphine-beauharnais.jpg',
                'gender' => 'F',
            ],
            [

                'name' => 'Alexandre',
                'middle_name' => 'de',
                'surname' => 'Beauharnais',
                'place_of_birth_id' => $cityId('Martinique'),
                'place_of_death_id' => $cityId('Paris'),
                'date_of_birth' => Carbon::parseFromLocale('28-05-1760', $locale),
                'date_of_death' => Carbon::parseFromLocale('23-07-1794', $locale),
                'profile_img_path' => 'images/alexandre-beauharnais.jpg',
                'gender' => 'M',
            ],
            [
                'name' => 'Marie',
                'surname' => 'Lucia',
                'place_of_birth_id' => $cityId('Vienna'),
                'place_of_death_id' => $cityId('Parma'),
                'date_of_birth' => Carbon::parseFromLocale('12-12-1791', $locale),
                'date_of_death' => Carbon::parseFromLocale('17-12-1847', $locale),
                'father_id' => $thirdGen['Frans Karl']->getKey(),
                'mother_id' => $thirdGen['Maria Theresa']->getKey(),
                'profile_img_path' => 'images/marie-lucia.jpg',
                'gender' => 'F',
            ]
        ];

        $fourthGen = $this->createPeople($fourthGeneration);
        $this->setRelationships([
            [$fourthGen['Napoleon Bonaparte'], $fourthGen['Joséphine Beauharnais'], 'divorced'],
            [$fourthGen['Napoleon Bonaparte'], $fourthGen['Marie Lucia'], 'divorced'],
            [$fourthGen['Alexandre Beauharnais'], $fourthGen['Joséphine Beauharnais'], 'widowed'],
        ]);

        $fifthGeneration = [
            [
                'name' => 'Eugène',
                'middle_name' => 'de',
                'surname' => 'Beauharnais',
                'place_of_birth_id' => $cityId('Paris'),
                'place_of_death_id' => $cityId('Munich'),
                'date_of_birth' => Carbon::parseFromLocale('03-09-1781', $locale),
                'date_of_death' => Carbon::parseFromLocale('21-02-1824', $locale),
                'father_id' => $fourthGen['Alexandre Beauharnais']->getKey(),
                'mother_id' => $fourthGen['Joséphine Beauharnais']->getKey(),
                'profile_img_path' => 'images/eguene-beauharnais.jpg',
                'gender' => 'M',
            ],
            [
                'name' => 'Hortense',
                'middle_name' => 'de',
                'surname' => 'Beauharnais',
                'place_of_birth_id' => $cityId('Paris'),
                'place_of_death_id' => $cityId('Arenenberg'),
                'date_of_birth' => Carbon::parse('10-04-1783'),
                'date_of_death' => Carbon::parse('05-10-1837'),
                'father_id' => $fourthGen['Alexandre Beauharnais']->getKey(),
                'mother_id' => $fourthGen['Joséphine Beauharnais']->getKey(),
                'profile_img_path' => 'images/hortense-beauharnais.jpg',
                'gender' => 'F',
            ],
            [
                'name' => 'Francois',
                'surname' => 'Bonaparte',
                'place_of_birth_id' => $cityId('Paris'),
                'place_of_death_id' => $cityId('Vienna'),
                'date_of_birth' => Carbon::parse('20-03-1811'),
                'date_of_death' => Carbon::parse('22-07-1832'),
                'father_id' => $fourthGen['Napoleon Bonaparte']->getKey(),
                'mother_id' => $fourthGen['Marie Lucia']->getKey(),
                'profile_img_path' => 'images/francois-bonaparte.jpg',
                'gender' => 'M',
            ],
        ];

        $fifthGen = $this->createPeople($fifthGeneration);
        $this->setRelationships([
            [$fifthGen['Hortense Beauharnais'], $fourthGen['Lodewijk Bonaparte'], 'divorced'],

        ]);

        $sixthGeneration = [
            [
                'name' => 'Karel',
                'surname' => 'Bonaparte',
                'place_of_birth_id' => $cityId('Paris'),
                'place_of_death_id' => $cityId('London'),
                'date_of_birth' => Carbon::parseFromLocale('20-03-1808', $locale),
                'date_of_death' => Carbon::parseFromLocale('09-01-1873', $locale),
                'father_id' => $fourthGen['Lodewijk Bonaparte']->getKey(),
                'mother_id' => $fifthGen['Hortense Beauharnais']->getKey(),
                'profile_img_path' => 'images/karel-bonaparte.jpg',
                'gender' => 'M',
            ]
        ];

        $this->createPeople($sixthGeneration);
    }

    private function createPeople(array $peopleData): array
    {
        $people = [];
        foreach ($peopleData as $personData) {
            $person = Person::create($personData);
            $people[implode(' ', [$person->name, $person->surname])] = $person;
        }

        return $people;
    }

    private function setRelationships(array $relationships): void
    {
        foreach ($relationships as [$person1, $person2, $type]) {
            $person1->relationships()->attach($person2, ['relationship_type' => $type]);
        }
    }
}
