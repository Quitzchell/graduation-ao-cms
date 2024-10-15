<?php

namespace Database\Seeders;

use AO\Component\Models\ManagedContent;
use AO\Component\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewPageSeeder extends Seeder
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
    }

    private function seedPageTable(): void
    {
        Page::create([
            'name' => 'Review',
            'template_name' => 'review',
            'locked' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    private function seedManagedContentTable(): void
    {
        ManagedContent::create([
            'order' => 1,
            'uri' => 'review',
            'parent_id' => 1,
            'linkable_id' => 3,
            'linkable_type' => 'AO\Component\Models\Page',
            'locked' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    private function seedCmsLoaderTable(): void
    {
        for ($i = 122; $i <= 128; $i++) {
            DB::table('cms_loader')->insert([
                'owner_type' => 'AO\Component\Models\Page',
                'owner_id' => 3,
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
                'parent_id' => 124,
                'tag' => 'seo',
                'language' => null,
                'group' => null,
            ],
            [
                'order' => 0,
                'parent_id' => 125,
                'tag' => 'title',
                'language' => 'nl',
                'group' => null,
            ],
            [
                'order' => 0,
                'parent_id' => 125,
                'tag' => 'keywords',
                'language' => 'nl',
                'group' => null,
            ],
            [
                'order' => 0,
                'parent_id' => 125,
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
                'content_id' => 122,
                'value' => '5',
            ],
            [
                'content_id' => 123,
                'value' => 'Reviews',
            ],
            [
                'content_id' => 124,
                'value' => '',
            ],
            [
                'content_id' => 125,
                'value' => 'widgets/seo',
            ],
            [
                'content_id' => 126,
                'value' => '',
            ],
            [
                'content_id' => 127,
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
                'content_id' => 128,
                'value' => '',
            ],
        ];
        foreach ($cmsTexts as $cmsText) {
            DB::table('cms_content_text')->insert($cmsText);
        }
    }
}
