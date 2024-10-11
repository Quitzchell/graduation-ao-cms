<?php

namespace Database\Seeders;

use App\Models\Actor;
use App\Models\Director;
use App\Models\Movie;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = [
            'napoleon' => [
                'director' => [
                    'name' => 'Ridley',
                    'surname' => 'Scott',
                    'date_of_birth' => '1937-11-30',
                ],
                'actors' => [
                    [
                        'name' => 'Joaquin',
                        'surname' => 'Phoenix',
                        'date_of_birth' => '1974-10-28',
                        'role' => 'Napoleon Bonaparte',
                    ],
                    [
                        'name' => 'Vanessa',
                        'surname' => 'Kirby',
                        'date_of_birth' => '1988-04-18',
                        'role' => 'Josephine Bonaparte',
                    ],
                    [
                        'name' => 'Tahar',
                        'surname' => 'Rahim',
                        'date_of_birth' => '1981-07-04',
                        'role' => 'Paul Barras',
                    ],
                ],
                'movie' => [
                    'title' => 'Napoleon',
                    'release_year' => Carbon::parse('01-01-2023')->year,
                    'description' => 'An epic that details the chequered rise and fall of French Emperor Napoleon Bonaparte and his relentless journey to power through the prism of his addictive, volatile relationship with his wife, Josephine.',
                    'review_id' => 1,
                ],
            ],

            'monsieur_n' => [
                'director' => [
                    'name' => 'Antoine',
                    'middle_name' => 'de',
                    'surname' => 'Caunes',
                    'date_of_birth' => '1953-01-12',
                ],
                'actors' => [
                    [
                        'name' => 'Philippe',
                        'surname' => 'Torreton',
                        'date_of_birth' => '1965-10-13',
                        'role' => 'Napoléon Bonaparte',
                    ],
                    [
                        'name' => 'Richard',
                        'middle_name' => 'E.',
                        'surname' => 'Grant',
                        'date_of_birth' => '1957-05-05',
                        'role' => 'Sir Hudson Lowe',
                    ],
                    [
                        'name' => 'Jay ',
                        'surname' => 'Rodan',
                        'date_of_birth' => '1974-05-15',
                        'role' => 'Basil Heathcote',
                    ],
                ],
                'movie' => [
                    'title' => 'Monsieur N.',
                    'release_year' => Carbon::parse('01-01-2003')->year,
                    'description' => 'How could Napoleon, the man of war and pioneering military strategist, meekly accept being locked up on a storm-lashed rock in the middle of the Atlantic ocean? What system of defence, and thus of attack, can he dream up to loosen his jailers\' grip? On Saint Helena, the far-flung island chosen by his enemies, Napoleon fights a mysterious battle, his last and most important, and one that history has kept secret all these years.',
                    'review_id' => 2,
                ],
            ],

            'waterloo' => [
                'director' => [
                    'name' => 'Sergey',
                    'surname' => 'Bondarchuk',
                    'date_of_birth' => '1920-10-20',
                ],
                'actors' => [
                    [
                        'name' => 'Rod',
                        'surname' => 'Steiger',
                        'date_of_birth' => '1925-04-14',
                        'role' => 'Napoléon Bonaparte',
                    ],
                    [
                        'name' => 'Orson',
                        'surname' => 'Welles',
                        'date_of_birth' => '1915-05-06',
                        'role' => 'Louis XVIII',
                    ],
                    [
                        'name' => 'Christopher',
                        'surname' => 'Plummer',
                        'date_of_birth' => '1929-12-13',
                        'role' => 'Arthur Wellesley',
                    ],
                ],
                'movie' => [
                    'title' => 'Waterloo',
                    'release_year' => Carbon::parse('01-01-1970')->year,
                    'description' => 'Facing the decline of everything he has worked to obtain, conqueror Napoleon Bonaparte and his army confront the British at the Battle of Waterloo.',
                    'review_id' => 3,
                ],
            ],
        ];

        foreach ($movies as $movieData) {
            $director = Director::updateOrCreate([
                'name' => $movieData['director']['name'],
                'middle_name' => $movieData['director']['middle_name'] ?? null,
                'surname' => $movieData['director']['surname'],
                'date_of_birth' => $movieData['director']['date_of_birth'],
            ]);

            $movie = Movie::create([
                'title' => $movieData['movie']['title'],
                'director_id' => $director->id,
                'release_year' => $movieData['movie']['release_year'],
                'description' => $movieData['movie']['description'],
                'review_id' => $movieData['movie']['review_id'],
            ]);

            foreach ($movieData['actors'] as $actorData) {
                $actor = Actor::updateOrCreate([
                    'name' => $actorData['name'],
                    'middle_name' => $actorData['middle_name'] ?? null,
                    'surname' => $actorData['surname'],
                    'date_of_birth' => $actorData['date_of_birth'],
                ]);

                $movie->actors()->attach($actor, ['role' => $actorData['role']]);
            }
        }
    }
}
