<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Topic;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Topics by Category
        $topics = [
            'Military Strategy & Tactics' => [
                'Battlefield Insights',
                'Tactics & Triumphs',
            ],
            'Leadership & Power' => [
                'Commanding with Confidence',
                'Empire-Building 101',
                'Crown & Country',
                'Revolution & Reform',
            ],
            'Personal Reflections' => [
                'Letters from Exile',
                'The Mind of Napoleon',
            ],
            'Travel & Conquest' => [
                'Journeys Across Europe',
                'Tales from the Campaign Trail',
            ],
            'Philosophy & Intellectual Pursuits' => [
                'Musings of an Emperor',
                'Philosophy of Power',
                'Poems of Conquest',
            ],
            'Love & Relationships' => [
                'Letters to Josephine',
                'Matters of the Heart',
            ],
        ];

        foreach ($topics as $categoryName => $topicList) {
            $category = Category::where('name', $categoryName)->first();

            if ($category) {
                foreach ($topicList as $topicName) {
                    Topic::create([
                        'name' => $topicName,
                        'category_id' => $category->getKey(),
                    ]);
                }
            }
        }
    }
}
