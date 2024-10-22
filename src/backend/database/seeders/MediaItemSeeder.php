<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MediaItemSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedMediaManagerItemsTable();
    }

    private function seedMediaManagerItemsTable(): void
    {
        $mediaManagerItems = [
            ['container_id' => 1, 'file' => 'napoleon-on-horseback.jpg', 'mime_type' => 'image/jpeg'],
            ['container_id' => 1, 'file' => 'napoleon-reading.jpg', 'mime_type' => 'image/jpeg'],
            ['container_id' => 1, 'file' => 'napoleon-war-advice.webp', 'mime_type' => 'image/webp'],
            ['container_id' => 1, 'file' => 'napoleon-war.webp', 'mime_type' => 'image/webp'],
            ['container_id' => 1, 'file' => 'napoleon-reviews.jpg', 'mime_type' => 'image/jpeg'],
            ['container_id' => 1, 'file' => 'napoleon-ridley-scott.jpg', 'mime_type' => 'image/jpeg'],
            ['container_id' => 1, 'file' => 'monsieur-n.webp', 'mime_type' => 'image/webp'],
            ['container_id' => 1, 'file' => 'waterloo-review.jpg', 'mime_type' => 'image/jpeg'],
        ];

        foreach ($mediaManagerItems as $mediaManagerItem) {
            DB::table('media_manager_items')->insert(array_merge($mediaManagerItem,
                [
                    'storage_path' => null,
                    'alt_text' => '',
                    'focal_point' => json_encode(['x' => 50, 'y' => 50]),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ));
        }
    }
}
