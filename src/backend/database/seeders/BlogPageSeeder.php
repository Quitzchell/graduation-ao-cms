<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->seedPageTable();
        $this->seedManagedContentTable();
        $this->seedCmsLoaderTable();
        $this->seedCmsContentTable();
        $this->seedCmsContentStringTable();
        $this->seedCmsContentTextTable();
        $this->seedMediaManagerItemsTable();
    }

    private function seedPageTable(): void
    {
        \Page::create([
            'name' => 'Blog',
            'template_name' => 'blog',
            'locked' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    private function seedManagedContentTable(): void
    {
        \ManagedContent::create([
            'order' => 1,
            'uri' => 'blog',
            'parent_id' => 1,
            'linkable_id' => 2,
            'linkable_type' => 'AO\Component\Models\Page',
            'locked' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    private function seedCmsLoaderTable(): void
    {
        for ($i = 11; $i <= 17; $i++) {
            DB::table('cms_loader')->insert([
                'owner_type' => 'AO\Component\Models\Page',
                'owner_id' => 2,
                'content_id' => $i,
            ]);
        }
    }

    private function seedCmsContentTable(): void
    {
        $cmsContent = [
            [
                'order' => 0,
                'parent_id' => null,
                'tag' => 'header_image',
                'language' => null,
                'group' => null,
            ],
            [
                'order' => 0,
                'parent_id' => null,
                'tag' => 'header_title',
                'language' => 'nl',
                'group' => null,
            ],
            [
                'order' => 0,
                'parent_id' => null,
                'tag' => '_widgets',
                'language' => null,
                'group' => null,
            ],
            [
                'order' => 0,
                'parent_id' => 13,
                'tag' => 'seo',
                'language' => null,
                'group' => null,
            ],
            [
                'order' => 0,
                'parent_id' => 14,
                'tag' => 'title',
                'language' => 'nl',
                'group' => null,
            ],
            [
                'order' => 0,
                'parent_id' => 14,
                'tag' => 'keywords',
                'language' => 'nl',
                'group' => null,
            ],
            [
                'order' => 0,
                'parent_id' => 14,
                'tag' => 'description',
                'language' => 'nl',
                'group' => null,
            ],
        ];

        foreach ($cmsContent as $content) {
            DB::table('cms_content')->insert($content);
        }
    }

    private function seedCmsContentStringTable(): void
    {
        $cmsStrings = [
            [
                'content_id' => 11,
                'value' => '2',
            ],
            [
                'content_id' => 12,
                'value' => 'Blogposts',
            ],
            [
                'content_id' => 13,
                'value' => '',
            ],
            [
                'content_id' => 14,
                'value' => 'widgets/seo',
            ],
            [
                'content_id' => 15,
                'value' => '',
            ],
            [
                'content_id' => 16,
                'value' => '',
            ],
        ];

        foreach ($cmsStrings as $cmsString) {
            DB::table('cms_content_string')->insert($cmsString);
        }
    }

    private function seedCmsContentTextTable(): void
    {
        $cmsTexts = [
            [
                'content_id' => 10,
                'value' => '',
            ],
            [
                'content_id' => 17,
                'value' => '',
            ],
        ];
        foreach ($cmsTexts as $cmsText) {
            DB::table('cms_content_text')->insert($cmsText);
        }
    }

    private function seedMediaManagerItemsTable(): void
    {
        $mediaManagerItems = [
            [
                'container_id' => 1,
                'file' => 'napoleon-reading.jpg',
                'mime_type' => 'image/jpeg',
                'storage_path' => null,
                'alt_text' => '',
                'focal_point' => json_encode(['x' => 50, 'y' => 50]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($mediaManagerItems as $mediaManagerItem) {
            DB::table('media_manager_items')->insert($mediaManagerItem);
        }
    }
}
