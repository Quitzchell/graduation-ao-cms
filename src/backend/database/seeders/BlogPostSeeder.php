<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedMilitaryStrategyTacticsBogPosts();
    }

    private function seedMilitaryStrategyTacticsBogPosts(): void
    {
        $category = Category::where('name', 'Military Strategy & Tactics')->first()->getKey();
        $blogPosts = [
            [
                'title' => 'Battlefield Insights: The Art of Strategy and Tactics in Warfare',
                'excerpt' => 'Today I wish to share with you some profound insights into the military strategies and tactics that have shaped the course of history on the battlefield. Warfare, as you may know, is not merely about brute strength; it is a complex dance of strategy, deception, and swift maneuvering. Allow me to elucidate the principles that have guided my campaigns and shaped my successes.',
            ]
        ];

        foreach ($blogPosts as $blogPost) {
            BlogPost::create(
                array_merge($blogPost, [
                    'category_id' => $category,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]),
            );
        }
    }
}
