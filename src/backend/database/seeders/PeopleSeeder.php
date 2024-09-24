<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Person;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('media_manager_containers')->insert([
            'parent_id' => 1,
            'name' => 'Bonaparte',
            'slug' => 'bonaparte',
            'path' => 'bonaparte'
        ]);

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
                'gender' => 'M',
            ],
            [
                'name' => 'Maria',
                'surname' => 'Theresa',
                'place_of_birth_id' => $cityId('Vienna'),
                'place_of_death_id' => $cityId('Vienna'),
                'date_of_birth' => Carbon::parseFromLocale('08-12-1708', $locale),
                'date_of_death' => Carbon::parseFromLocale('18-8-1765', $locale),
                'gender' => 'F',
            ],
            [
                'name' => 'Charles',
                'surname' => 'Sebastian',
                'place_of_birth_id' => $cityId('Madrid'),
                'place_of_death_id' => $cityId('Madrid'),
                'date_of_birth' => Carbon::parseFromLocale('10-1-1716', $locale),
                'date_of_death' => Carbon::parseFromLocale('14-12-1788', $locale),
                'gender' => 'M',
            ],
            [
                'name' => 'Maria',
                'surname' => 'Amalia',
                'place_of_birth_id' => $cityId('Dresden'),
                'place_of_death_id' => $cityId('Madrid'),
                'date_of_birth' => Carbon::parseFromLocale('24-11-1724', $locale),
                'date_of_death' => Carbon::parseFromLocale('27-09-1760', $locale),
                'gender' => 'F',
            ],
        ];

        $firstGen = $this->createPeople($firstGeneration);
        $this->setRelationships([
            [$firstGen['Francis Stephen'], $firstGen['Maria Theresa']],
            [$firstGen['Charles Sebastian'], $firstGen['Maria Amalia']]
        ]);
        $this->setProfilePicture([
            [$firstGen['Francis Stephen'], 'francis-stephen.jpg', ['x' => 48, 'y' => 35]],
            [$firstGen['Maria Theresa'], 'maria-theresa-1.jpg', ['x' => 47, 'y' => 32]],
            [$firstGen['Charles Sebastian'], 'charles-sebastian.jpg', ['x' => 50, 'y' => 32]],
            [$firstGen['Maria Amalia'], 'maria-amalia.png', ['x' => 47, 'y' => 29]],
        ]);

        $secondGeneration = [
            [
                'name' => 'Peter',
                'surname' => 'Leopold',
                'place_of_birth_id' => $cityId('Vienna'),
                'place_of_death_id' => $cityId('Florence'),
                'date_of_birth' => Carbon::parseFromLocale('5-05-1747', $locale),
                'date_of_death' => Carbon::parseFromLocale('1-03-1792', $locale),
                'gender' => 'M',
            ],
            [
                'name' => 'Marie',
                'surname' => 'Louise',
                'place_of_birth_id' => $cityId('Portici'),
                'place_of_death_id' => $cityId('Vienna'),
                'date_of_birth' => Carbon::parseFromLocale('24-11-1745', $locale),
                'date_of_death' => Carbon::parseFromLocale('15-05-1792', $locale),
                'gender' => 'F',
            ],

            [
                'name' => 'Ferdinand',
                'surname' => 'Benedictus',
                'place_of_birth_id' => $cityId('Napels'),
                'place_of_death_id' => $cityId('Napels'),
                'date_of_birth' => Carbon::parseFromLocale('12-01-1751', $locale),
                'date_of_death' => Carbon::parseFromLocale('4-01-1825', $locale),
                'gender' => 'M',
            ],
            [
                'name' => 'Maria',
                'surname' => 'Carolina',
                'place_of_birth_id' => $cityId('Vienna'),
                'place_of_death_id' => $cityId('Vienna'),
                'date_of_birth' => Carbon::parseFromLocale('13-08-1752', $locale),
                'date_of_death' => Carbon::parseFromLocale('8-09-1814', $locale),
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
            [$secondGen['Peter Leopold'], $secondGen['Marie Louise']],
            [$secondGen['Ferdinand Benedictus'], $secondGen['Maria Carolina']]
        ]);
        $this->setParents([
            [$secondGen['Peter Leopold'], $firstGen['Francis Stephen']],
            [$secondGen['Peter Leopold'], $firstGen['Maria Theresa']],
            [$secondGen['Marie Louise'], $firstGen['Charles Sebastian']],
            [$secondGen['Marie Louise'], $firstGen['Maria Amalia']],
            [$secondGen['Ferdinand Benedictus'], $firstGen['Charles Sebastian']],
            [$secondGen['Ferdinand Benedictus'], $firstGen['Maria Amalia']],
            [$secondGen['Maria Carolina'], $firstGen['Francis Stephen']],
            [$secondGen['Maria Carolina'], $firstGen['Maria Theresa']],
        ]);
        $this->setProfilePicture([
            [$secondGen['Peter Leopold'], 'peter-leopold.jpg', ['x' => 54, 'y' => 25]],
            [$secondGen['Marie Louise'], 'maria-louise.jpg', ['x' => 49, 'y' => 27]],
            [$secondGen['Ferdinand Benedictus'], 'ferdinand-benedictus.jpg', ['x' => 44, 'y' => 30]],
            [$secondGen['Maria Carolina'], 'maria-carolina.jpg', ['x' => 53, 'y' => 30]],
        ]);

        $thirdGeneration = [
            [
                'name' => 'Carlo',
                'surname' => 'Buonaparte',
                'place_of_birth_id' => $cityId('Ajaccio'),
                'place_of_death_id' => $cityId('Montpellier'),
                'date_of_birth' => Carbon::parseFromLocale('27-03-1746', $locale),
                'date_of_death' => Carbon::parseFromLocale('24-02-1785', $locale),
                'gender' => 'M',
            ],
            [
                'name' => 'Letizia',
                'surname' => 'Ramolino',
                'place_of_birth_id' => $cityId('Ajaccio'),
                'place_of_death_id' => $cityId('Rome'),
                'date_of_birth' => Carbon::parseFromLocale('24-08-1750', $locale),
                'date_of_death' => Carbon::parseFromLocale('02-02-1836', $locale),
                'gender' => 'F',
            ],

            [
                'name' => 'Frans',
                'surname' => 'Karl',
                'place_of_birth_id' => $cityId('Florence'),
                'place_of_death_id' => $cityId('Vienna'),
                'date_of_birth' => Carbon::parseFromLocale('12-02-1768', $locale),
                'date_of_death' => Carbon::parseFromLocale('02-03-1835', $locale),
                'gender' => 'M',
            ],
            [
                'name' => 'Maria',
                'surname' => 'Theresa',
                'place_of_birth_id' => $cityId('Napels'),
                'place_of_death_id' => $cityId('Vienna'),
                'date_of_birth' => Carbon::parseFromLocale('06-06-1772', $locale),
                'date_of_death' => Carbon::parseFromLocale('13-04-1807', $locale),
                'gender' => 'F',
            ],
        ];

        $thirdGen = $this->createPeople($thirdGeneration);
        $this->setRelationships([
            [$thirdGen['Carlo Buonaparte'], $thirdGen['Letizia Ramolino']],
            [$thirdGen['Frans Karl'], $thirdGen['Maria Theresa']]
        ]);
        $this->setParents([
            [$thirdGen['Carlo Buonaparte'], $secondGen['Giuseppe Buonaparte']],
            [$thirdGen['Frans Karl'], $secondGen['Peter Leopold']],
            [$thirdGen['Frans Karl'], $secondGen['Marie Louise']],
            [$thirdGen['Maria Theresa'], $secondGen['Ferdinand Benedictus']],
            [$thirdGen['Maria Theresa'], $secondGen['Maria Carolina']],
        ]);
        $this->setProfilePicture([
            [$thirdGen['Carlo Buonaparte'], 'carlo-buonaparte.jpeg', ['x' => 51, 'y' => 27]],
            [$thirdGen['Letizia Ramolino'], 'letizia-ramolino.jpg', ['x' => 49, 'y' => 15]],
            [$thirdGen['Frans Karl'], 'frans-karl.jpg', ['x' => 51, 'y' => 28]],
            [$thirdGen['Maria Theresa'], 'maria-theresa-2.jpeg', ['x' => 52, 'y' => 26]],
        ]);

        $fourthGeneration = [
            [
                'name' => 'Napoleon',
                'surname' => 'Bonaparte',
                'place_of_birth_id' => $cityId('Ajaccio'),
                'place_of_death_id' => $cityId('Saint Helena'),
                'date_of_birth' => Carbon::parseFromLocale('15-08-1769', $locale),
                'date_of_death' => Carbon::parseFromLocale('05-05-1821', $locale),
                'gender' => 'M',
            ],
            [
                'name' => 'Lodewijk',
                'surname' => 'Bonaparte',
                'place_of_birth_id' => $cityId('Ajaccio'),
                'place_of_death_id' => $cityId('Livorno'),
                'date_of_birth' => Carbon::parseFromLocale('15-08-1778', $locale),
                'date_of_death' => Carbon::parseFromLocale('05-05-1846', $locale),
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
                'gender' => 'M',
            ],
            [
                'name' => 'Marie',
                'surname' => 'Lucia',
                'place_of_birth_id' => $cityId('Vienna'),
                'place_of_death_id' => $cityId('Parma'),
                'date_of_birth' => Carbon::parseFromLocale('12-12-1791', $locale),
                'date_of_death' => Carbon::parseFromLocale('17-12-1847', $locale),
                'gender' => 'F',
            ]
        ];

        $fourthGen = $this->createPeople($fourthGeneration);
        $this->setRelationships([
            [$fourthGen['Napoleon Bonaparte'], $fourthGen['Joséphine Beauharnais']],
            [$fourthGen['Napoleon Bonaparte'], $fourthGen['Marie Lucia']],
            [$fourthGen['Alexandre Beauharnais'], $fourthGen['Joséphine Beauharnais']],
        ]);
        $this->setParents([
            [$fourthGen['Napoleon Bonaparte'], $thirdGen['Carlo Buonaparte']],
            [$fourthGen['Napoleon Bonaparte'], $thirdGen['Letizia Ramolino']],
            [$fourthGen['Lodewijk Bonaparte'], $thirdGen['Carlo Buonaparte']],
            [$fourthGen['Lodewijk Bonaparte'], $thirdGen['Letizia Ramolino']],
            [$fourthGen['Marie Lucia'], $thirdGen['Frans Karl']],
            [$fourthGen['Marie Lucia'], $thirdGen['Maria Theresa']],
        ]);
        $this->setProfilePicture([
            [$fourthGen['Napoleon Bonaparte'], 'napoleon-bonaparte.jpg', ['x' => 52, 'y' => 19]],
            [$fourthGen['Lodewijk Bonaparte'], 'lodewijk-bonaparte.jpg', ['x' => 48, 'y' => 35]],
            [$fourthGen['Joséphine Beauharnais'], 'josephine-beauharnais.jpeg', ['x' => 37, 'y' => 28]],
            [$fourthGen['Alexandre Beauharnais'], 'alexandre-beauharnais.jpeg', ['x' => 54, 'y' => 36]],
            [$fourthGen['Marie Lucia'], 'marie-lucia.jpg', ['x' => 59, 'y' => 23]],
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
                'gender' => 'F',
            ],
            [
                'name' => 'Francois',
                'surname' => 'Bonaparte',
                'place_of_birth_id' => $cityId('Paris'),
                'place_of_death_id' => $cityId('Vienna'),
                'date_of_birth' => Carbon::parse('20-03-1811'),
                'date_of_death' => Carbon::parse('22-07-1832'),
                'gender' => 'M',
            ],
        ];

        $fifthGen = $this->createPeople($fifthGeneration);
        $this->setRelationships([
            [$fifthGen['Hortense Beauharnais'], $fourthGen['Lodewijk Bonaparte']],
        ]);

        $this->setParents([
            [$fifthGen['Eugène Beauharnais'], $fourthGen['Alexandre Beauharnais']],
            [$fifthGen['Eugène Beauharnais'], $fourthGen['Joséphine Beauharnais']],
            [$fifthGen['Hortense Beauharnais'], $fourthGen['Alexandre Beauharnais']],
            [$fifthGen['Hortense Beauharnais'], $fourthGen['Joséphine Beauharnais']],
            [$fifthGen['Francois Bonaparte'], $fourthGen['Napoleon Bonaparte']],
            [$fifthGen['Francois Bonaparte'], $fourthGen['Marie Lucia']],
        ]);
        $this->setProfilePicture([
            [$fifthGen['Eugène Beauharnais'], 'eugene-beauharnais.jpeg', ['x' => 58, 'y' => 31]],
            [$fifthGen['Hortense Beauharnais'], 'hortense-beauharnais.jpg', ['x' => 52, 'y' => 22]],
            [$fifthGen['Francois Bonaparte'], 'francois-bonaparte.jpg', ['x' => 46, 'y' => 40]],
        ]);

        $sixthGeneration = [
            [
                'name' => 'Karel',
                'surname' => 'Bonaparte',
                'place_of_birth_id' => $cityId('Paris'),
                'place_of_death_id' => $cityId('London'),
                'date_of_birth' => Carbon::parseFromLocale('20-03-1808', $locale),
                'date_of_death' => Carbon::parseFromLocale('09-01-1873', $locale),
                'gender' => 'M',
            ]
        ];

        $sixthGen = $this->createPeople($sixthGeneration);
        $this->setParents([
            [$sixthGen['Karel Bonaparte'], $fourthGen['Lodewijk Bonaparte']],
            [$sixthGen['Karel Bonaparte'], $fifthGen['Hortense Beauharnais']],
        ]);
        $this->setProfilePicture([
            [$sixthGen['Karel Bonaparte'], 'karel-bonaparte.jpg', ['x' => 52, 'y' => 22]],
        ]);
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
        foreach ($relationships as [$person1, $person2]) {
            $person1->relationships()->attach($person2);
        }
    }

    private function setParents(array $relationship): void
    {
        foreach ($relationship as [$child, $parent]) {
            $child->parents()->attach($parent);
        }
    }

    private function setProfilePicture(array $profilePictures): void
    {
        foreach ($profilePictures as $profilePicture) {
            try {
            $x = $profilePicture[2]['x'] ?? 50;
            $y = $profilePicture[2]['y'] ?? 50;

            $profilePictureId = DB::table('media_manager_items')->insertGetId([
                'container_id' => '2',
                'file' => $profilePicture[1],
                'mime_type' => 'image/jpeg',
                'alt_text' => $profilePicture[0]->full_name,
                'focal_point' => json_encode(['x' => $x, 'y' => $y])
            ]);

            $profilePicture[0]->profile_img = $profilePictureId;
            $profilePicture[0]->save();
            } catch (\Exception $e) {
                // Log the error for debugging
                \Log::error('Failed to set profile picture', [
                    'profilePicture' => $profilePicture,
                    'error' => $e->getMessage(),
                ]);

                throw new \Exception("An error occurred while setting the profile picture. Please try again later.");
            }
        }
    }
}
