<?php

namespace Database\Seeders;

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
        $people = [
            [
                'name' => 'Mitchell',
                'surname' => 'Quitz',
                'birth_date' => Carbon::parse('07-11-1991'),
                'gender' => 'M',
            ],
            [
                'name' => 'Melanie',
                'surname' => 'Leeflang',
                'birth_date' => Carbon::parse('20-05-1994'),
                'gender' => 'F',
            ],
            [
                'name' => 'Edwin',
                'surname' => 'Quitz',
                'gender' => 'M',
                'birth_date' => Carbon::parse('06-07-1964'),
            ],
            [
                'name' => 'Nathalie',
                'surname' => 'Quitz',
                'gender' => 'F',
                'birth_date' => Carbon::parse('04-06-1965'),
            ],
            [
                'name' => 'Willie',
                'surname' => 'Quitz',
                'gender' => 'F',
                'birth_date' => Carbon::parse('01-06-1924'),

            ],
            [
                'name' => 'Otto',
                'surname' => 'Quitz',
                'gender' => 'M',
                'birth_date' => Carbon::parse('07-03-1920'),
            ],
            [
                'name' => 'Glynis',
                'surname' => 'Quitz',
                'gender' => 'F',
                'birth_date' => Carbon::parse('20-01-1995'),
            ],
            [
                'name' => 'Esmeralda',
                'surname' => 'Leeflang',
                'gender' => 'F',
                'birth_date' => Carbon::parse('22-10-1989'),
            ],
            [
                'name' => 'Arien',
                'surname' => 'Boomker',
                'gender' => 'M',
                'birth_date' => Carbon::parse('22-10-1979'),
            ],
            [
                'name' => 'Hanny',
                'surname' => 'Mulder',
                'gender' => 'F',
                'birth_date' => Carbon::parse('01-12-1959'),
            ],
            [
                'name' => 'Peter',
                'surname' => 'Leeflang',
                'gender' => 'M',
                'birth_date' => Carbon::parse('02-01-1962')
            ],
            [
                'name' => 'Gerard',
                'surname' => 'Hiddink',
                'gender' => 'M',
                'birth_date' => Carbon::parse('24-02-1954')
            ]
        ];

        foreach ($people as $person) {
            Person::create($person);
        }

        $relationships = [
            ['Mitchell Quitz', 'Melanie Leeflang'],
            ['Edwin Quitz', 'Nathalie Quitz'],
            ['Willie Quitz', 'Otto Quitz'],
            ['Esmeralda Leeflang', 'Arien test'],
            ['Hanny Mulder', 'Gerard Hiddink'],
        ];

        foreach ($relationships as [$person1Name, $person2Name]) {
            $name1 = explode(' ', $person1Name);
            $name2 = explode(' ', $person2Name);

            $person1 = Person::where('name', array_first($name1))->where('surname', array_last($name1))->first();
            $person2 = Person::where('name', array_first($name2))->where('surname', array_last($name2))->first();

            if ($person1 && $person2) {
                $person1->partner_id = $person2->getKey();
                $person2->partner_id = $person1->getKey();

                $person1->save();
                $person2->save();
            }
        }
    }
}
