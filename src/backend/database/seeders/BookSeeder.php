<?php

namespace Database\Seeders;

use App\Models\Actor;
use App\Models\Book;
use App\Models\Director;
use App\Models\Movie;
use App\Models\Author;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            'talleyrand' => [
                'writer' => [
                    'name' => 'Alfred',
                    'middle_name' => 'Duff',
                    'surname' => 'Cooper',
                    'date_of_birth' => '1890-02-22',
                ],

                'book' => [
                    'title' => 'Talleyrand',
                    'published_year' => Carbon::parse('01-01-1932')->year,
                    'description' => 'Duff Cooper\'s classic biography charts the remarkable progress of Talleyrand, a silver-tongued master diplomat, infamous turncoat, peacekeeper and libertine.',
//                    'review_id' => 4
                ],
            ],
        ];

        foreach ($books as $bookData) {
            $writer = Author::create([
                'name' => $bookData['writer']['name'],
                'middle_name' => $bookData['writer']['middle_name'],
                'surname' => $bookData['writer']['surname'],
                'date_of_birth' => $bookData['writer']['date_of_birth'],
            ]);

            Book::create([
                'author_id' => $writer->id,
                'title' => $bookData['book']['title'],
                'published_year' => $bookData['book']['published_year'],
                'description' => $bookData['book']['description'],
//                'review_id' => $bookData['book']['review_id'],
            ]);

        }
    }
}
