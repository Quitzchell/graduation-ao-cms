<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedMilitaryStrategyTacticsBogPosts();
        $this->seedMediaManagerItemsTable();
    }

    private function seedMilitaryStrategyTacticsBogPosts(): void
    {
        $category = Category::where('name', 'Military Strategy & Tactics')->first()->getKey();
        $blogPosts = [
            [
                'title' => 'Battlefield Insights: The Art of Strategy and Tactics in Warfare',
                'excerpt' => 'Today I wish to share with you some profound insights into the military strategies and tactics that have shaped the course of history on the battlefield. Warfare, as you may know, is not merely about brute strength; it is a complex dance of strategy, deception, and swift maneuvering. Allow me to elucidate the principles that have guided my campaigns and shaped my successes.',
                'image' => '3',
                'published_at' => Carbon::create(1806, 2, 7),
            ],
        ];

        foreach ($blogPosts as $blogPost) {
            BlogPost::create(
                array_merge($blogPost, ['category_id' => $category, 'created_at' => now(), 'updated_at' => now()]),
            );
        }
    }

    private function seedMediaManagerItemsTable(): void
    {
        $mediaManagerItems = [
            ['container_id' => 1, 'file' => 'napoleon-war.webp', 'mime_type' => 'image/webp'],
        ];

        foreach ($mediaManagerItems as $mediaManagerItem) {
            DB::table('media_manager_items')->insert(array_merge($mediaManagerItem,
                [
                    'storage_path' => null,
                    'alt_text' => '',
                    'focal_point' => json_encode(['x' => 50, 'y' => 50]),
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ));
        }
    }
}
