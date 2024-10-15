<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomepageSeeder extends Seeder
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
        \Page::create([
            'name' => 'Home',
            'template_name' => 'home',
            'locked' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    private function seedManagedContentTable(): void
    {
        \ManagedContent::create([
            'order' => 1,
            'uri' => 'home',
            'parent_id' => 1,
            'linkable_id' => 1,
            'linkable_type' => 'AO\Component\Models\Page',
            'locked' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    private function seedCmsLoaderTable(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('cms_loader')->insert([
                'owner_type' => 'AO\Component\Models\Page',
                'owner_id' => 1,
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
                'order' => 1,
                'parent_id' => null,
                'tag' => 'about',
                'language' => null,
                'group' => null,
            ],
            [
                'order' => 0,
                'parent_id' => 3,
                'tag' => 'title',
                'language' => 'nl',
                'group' => null,
            ],
            [
                'order' => 0,
                'parent_id' => 3,
                'tag' => 'text',
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
                'parent_id' => 6,
                'tag' => 'seo',
                'language' => null,
                'group' => null,
            ],
            [
                'order' => 0,
                'parent_id' => 7,
                'tag' => 'title',
                'language' => 'nl',
                'group' => null,
            ],
            [
                'order' => 0,
                'parent_id' => 7,
                'tag' => 'keywords',
                'language' => 'nl',
                'group' => null,
            ],
            [
                'order' => 0,
                'parent_id' => 7,
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
                'content_id' => 1,
                'value' => '1',
            ],
            [
                'content_id' => 2,
                'value' => 'La gloire est éphémère, mais l\'oubli est éternel.',
            ],
            [
                'content_id' => 3,
                'value' => 'home/about',
            ],
            [
                'content_id' => 4,
                'value' => 'Bonjour à tous,',
            ],
            [
                'content_id' => 6,
                'value' => '',
            ],
            [
                'content_id' => 7,
                'value' => 'widgets/seo',
            ],
            [
                'content_id' => 8,
                'value' => '',
            ],
            [
                'content_id' => 9,
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
                'content_id' => 5,
                'value' => '<p>I am Napoleon Bonaparte, exiled here on the remote island of Saint Helena. Once, I commanded vast armies, reshaped nations, and navigated the turbulent waters of European politics. Today, however, I find myself in the serene isolation of this distant land, where the ocean whispers tales of glory and defeat.</p>
                        <p>As I pen my thoughts for you, dear readers, I invite you into my world&mdash;a realm of ambition, strategy, and, yes, introspection. Here, I shall share my reflections on leadership, the nature of power, and the lessons learned from both triumphs and trials.</p>
                        <p>Join me as I explore the intricate tapestry of history, the weight of legacy, and the fleeting nature of fame. Whether you seek inspiration, knowledge, or simply the musings of a man who once stood at the pinnacle of power, I welcome you to my journey.</p>
                        <p>&Agrave; bient&ocirc;t,<br />Napoleon</p>',
            ],
            [
                'content_id' => 10,
                'value' => '',
            ],
        ];
        foreach ($cmsTexts as $cmsText) {
            DB::table('cms_content_text')->insert($cmsText);
        }
    }
}
