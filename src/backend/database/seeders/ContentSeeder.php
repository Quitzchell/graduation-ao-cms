<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Review;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentSeeder extends Seeder
{

    public function run(): void
    {
        $this->seedCmsLoaderTable();
        $this->seedCmsContentTable();
        $this->seedCmsContentStringTable();
        $this->seedCmsContentTextTable();
    }

    private function seedCmsLoaderTable()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('cms_loader')->insert([
                'owner_type' => 'AO\Component\Models\Page',
                'owner_id' => 1,
                'content_id' => $i,
            ]);
        }

        for ($i = 11; $i <= 17; $i++) {
            DB::table('cms_loader')->insert([
                'owner_type' => 'AO\Component\Models\Page',
                'owner_id' => 2,
                'content_id' => $i,
            ]);
        }

        for ($i = 18; $i <= 40; $i++) {
            DB::table('cms_loader')->insert([
                'owner_type' => BlogPost::class,
                'owner_id' => 1,
                'content_id' => $i,
            ]);
        }

        for ($i = 41; $i <= 67; $i++) {
            DB::table('cms_loader')->insert([
                'owner_type' => Review::class,
                'owner_id' => 1,
                'content_id' => $i,
            ]);
        }

        for ($i = 68; $i <= 100; $i++) {
            DB::table('cms_loader')->insert([
                'owner_type' => Review::class,
                'owner_id' => 2,
                'content_id' => $i,
            ]);
        }

        for ($i = 101; $i <= 121; $i++) {
            DB::table('cms_loader')->insert([
                'owner_type' => Review::class,
                'owner_id' => 3,
                'content_id' => $i,
            ]);
        }

        for ($i = 122; $i <= 128; $i++) {
            DB::table('cms_loader')->insert([
                'owner_type' => 'AO\Component\Models\Page',
                'owner_id' => 3,
                'content_id' => $i,
            ]);
        }

        for ($i = 129; $i <= 137; $i++) {
            DB::table('cms_loader')->insert([
                'owner_type' => 'AO\Component\Models\Page',
                'owner_id' => 1,
                'content_id' => $i,
            ]);
        }
    }

    private function seedCmsContentTable()
    {
        $cmsContent = [
            ['order' => 0, 'parent_id' => null, 'tag' => 'header_image', 'language' => null, 'group' => null,],
            ['order' => 0, 'parent_id' => null, 'tag' => 'header_title', 'language' => 'nl', 'group' => null,],
            ['order' => 1, 'parent_id' => null, 'tag' => 'about', 'language' => null, 'group' => null,],
            ['order' => 0, 'parent_id' => 3, 'tag' => 'title', 'language' => 'nl', 'group' => null,],
            ['order' => 0, 'parent_id' => 3, 'tag' => 'text', 'language' => 'nl', 'group' => null,],
            ['order' => 0, 'parent_id' => null, 'tag' => '_widgets', 'language' => null, 'group' => null,],
            ['order' => 0, 'parent_id' => 6, 'tag' => 'seo', 'language' => null, 'group' => null,],
            ['order' => 0, 'parent_id' => 7, 'tag' => 'title', 'language' => 'nl', 'group' => null,],
            ['order' => 0, 'parent_id' => 7, 'tag' => 'keywords', 'language' => 'nl', 'group' => null,],
            ['order' => 0, 'parent_id' => 7, 'tag' => 'description', 'language' => 'nl', 'group' => null,],
            ['order' => 0, 'parent_id' => null, 'tag' => 'header_image', 'language' => null, 'group' => null,],
            ['order' => 0, 'parent_id' => null, 'tag' => 'header_title', 'language' => 'nl', 'group' => null,],
            ['order' => 0, 'parent_id' => null, 'tag' => '_widgets', 'language' => null, 'group' => null,],
            ['order' => 0, 'parent_id' => 13, 'tag' => 'seo', 'language' => null, 'group' => null,],
            ['order' => 0, 'parent_id' => 14, 'tag' => 'title', 'language' => 'nl', 'group' => null,],
            ['order' => 0, 'parent_id' => 14, 'tag' => 'keywords', 'language' => 'nl', 'group' => null,],
            ['order' => 0, 'parent_id' => 14, 'tag' => 'description', 'language' => 'nl', 'group' => null,],
            ['order' => 1, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null],
            ['order' => 0, 'parent_id' => 18, 'tag' => 'title', 'language' => 'nl', 'group' => null],
            ['order' => 0, 'parent_id' => 18, 'tag' => 'text', 'language' => 'nl', 'group' => null],
            ['order' => 2, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null],
            ['order' => 0, 'parent_id' => 21, 'tag' => 'title', 'language' => 'nl', 'group' => null],
            ['order' => 0, 'parent_id' => 21, 'tag' => 'text', 'language' => 'nl', 'group' => null],
            ['order' => 4, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null],
            ['order' => 0, 'parent_id' => 24, 'tag' => 'title', 'language' => 'nl', 'group' => null],
            ['order' => 0, 'parent_id' => 24, 'tag' => 'text', 'language' => 'nl', 'group' => null],
            ['order' => 5, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null],
            ['order' => 0, 'parent_id' => 27, 'tag' => 'title', 'language' => 'nl', 'group' => null],
            ['order' => 0, 'parent_id' => 27, 'tag' => 'text', 'language' => 'nl', 'group' => null],
            ['order' => 6, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null],
            ['order' => 0, 'parent_id' => 30, 'tag' => 'title', 'language' => 'nl', 'group' => null],
            ['order' => 0, 'parent_id' => 30, 'tag' => 'text', 'language' => 'nl', 'group' => null],
            ['order' => 7, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null],
            ['order' => 0, 'parent_id' => 33, 'tag' => 'title', 'language' => 'nl', 'group' => null],
            ['order' => 0, 'parent_id' => 33, 'tag' => 'text', 'language' => 'nl', 'group' => null],
            ['order' => 8, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null],
            ['order' => 0, 'parent_id' => 36, 'tag' => 'title', 'language' => 'nl', 'group' => null],
            ['order' => 0, 'parent_id' => 36, 'tag' => 'text', 'language' => 'nl', 'group' => null],
            ['order' => 3, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null],
            ['order' => 0, 'parent_id' => 39, 'tag' => 'image', 'language' => null, 'group' => null],
            ['order' => 1, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null],
            ['order' => 0, 'parent_id' => 41, 'tag' => 'title', 'language' => 'nl', 'group' => null],
            ['order' => 0, 'parent_id' => 41, 'tag' => 'text', 'language' => 'nl', 'group' => null],
            ['order' => 1, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null],
            ['order' => 0, 'parent_id' => 44, 'tag' => 'title', 'language' => 'nl', 'group' => null],
            ['order' => 0, 'parent_id' => 44, 'tag' => 'text', 'language' => 'nl', 'group' => null],
            ['order' => 1, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null],
            ['order' => 0, 'parent_id' => 47, 'tag' => 'title', 'language' => 'nl', 'group' => null],
            ['order' => 0, 'parent_id' => 47, 'tag' => 'text', 'language' => 'nl', 'group' => null],
            ['order' => 1, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null],
            ['order' => 0, 'parent_id' => 50, 'tag' => 'title', 'language' => 'nl', 'group' => null],
            ['order' => 0, 'parent_id' => 50, 'tag' => 'text', 'language' => 'nl', 'group' => null],
            ['order' => 1, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null],
            ['order' => 0, 'parent_id' => 53, 'tag' => 'title', 'language' => 'nl', 'group' => null],
            ['order' => 0, 'parent_id' => 53, 'tag' => 'text', 'language' => 'nl', 'group' => null],
            ['order' => 1, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null],
            ['order' => 0, 'parent_id' => 56, 'tag' => 'title', 'language' => 'nl', 'group' => null],
            ['order' => 0, 'parent_id' => 56, 'tag' => 'text', 'language' => 'nl', 'group' => null],
            ['order' => 1, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null],
            ['order' => 0, 'parent_id' => 59, 'tag' => 'title', 'language' => 'nl', 'group' => null],
            ['order' => 0, 'parent_id' => 59, 'tag' => 'text', 'language' => 'nl', 'group' => null],
            ['order' => 1, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null],
            ['order' => 0, 'parent_id' => 62, 'tag' => 'title', 'language' => 'nl', 'group' => null],
            ['order' => 0, 'parent_id' => 62, 'tag' => 'text', 'language' => 'nl', 'group' => null],
            ['order' => 1, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null],
            ['order' => 0, 'parent_id' => 65, 'tag' => 'title', 'language' => 'nl', 'group' => null],
            ['order' => 0, 'parent_id' => 65, 'tag' => 'text', 'language' => 'nl', 'group' => null],
            ['order' => 1, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null],
            ['order' => 0, 'parent_id' => 68, 'tag' => 'title', 'language' => 'nl', 'group' => null],
            ['order' => 0, 'parent_id' => 68, 'tag' => 'text', 'language' => 'nl', 'group' => null],
            ['order' => 1, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null],
            ['order' => 0, 'parent_id' => 71, 'tag' => 'title', 'language' => 'nl', 'group' => null],
            ['order' => 0, 'parent_id' => 71, 'tag' => 'text', 'language' => 'nl', 'group' => null],
            ['order' => 1, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null],
            ['order' => 0, 'parent_id' => 74, 'tag' => 'title', 'language' => 'nl', 'group' => null],
            ['order' => 0, 'parent_id' => 74, 'tag' => 'text', 'language' => 'nl', 'group' => null],
            ['order' => 1, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null],
            ['order' => 0, 'parent_id' => 77, 'tag' => 'title', 'language' => 'nl', 'group' => null],
            ['order' => 0, 'parent_id' => 77, 'tag' => 'text', 'language' => 'nl', 'group' => null],
            ['order' => 1, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null],
            ['order' => 0, 'parent_id' => 80, 'tag' => 'title', 'language' => 'nl', 'group' => null],
            ['order' => 0, 'parent_id' => 80, 'tag' => 'text', 'language' => 'nl', 'group' => null],
            ['order' => 1, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null],
            ['order' => 0, 'parent_id' => 83, 'tag' => 'title', 'language' => 'nl', 'group' => null],
            ['order' => 0, 'parent_id' => 83, 'tag' => 'text', 'language' => 'nl', 'group' => null],
            ['order' => 1, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null],
            ['order' => 0, 'parent_id' => 86, 'tag' => 'title', 'language' => 'nl', 'group' => null],
            ['order' => 0, 'parent_id' => 86, 'tag' => 'text', 'language' => 'nl', 'group' => null],
            ['order' => 1, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null],
            ['order' => 0, 'parent_id' => 89, 'tag' => 'title', 'language' => 'nl', 'group' => null],
            ['order' => 0, 'parent_id' => 89, 'tag' => 'text', 'language' => 'nl', 'group' => null],
            ['order' => 1, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null],
            ['order' => 0, 'parent_id' => 92, 'tag' => 'title', 'language' => 'nl', 'group' => null],
            ['order' => 0, 'parent_id' => 92, 'tag' => 'text', 'language' => 'nl', 'group' => null],
            ['order' => 1, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null],
            ['order' => 0, 'parent_id' => 95, 'tag' => 'title', 'language' => 'nl', 'group' => null],
            ['order' => 0, 'parent_id' => 95, 'tag' => 'text', 'language' => 'nl', 'group' => null],
            ['order' => 1, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null],
            ['order' => 0, 'parent_id' => 98, 'tag' => 'title', 'language' => 'nl', 'group' => null],
            ['order' => 0, 'parent_id' => 98, 'tag' => 'text', 'language' => 'nl', 'group' => null],
            ['order' => 1, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null],
            ['order' => 0, 'parent_id' => 101, 'tag' => 'title', 'language' => 'nl', 'group' => null],
            ['order' => 0, 'parent_id' => 101, 'tag' => 'text', 'language' => 'nl', 'group' => null],
            ['order' => 1, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null],
            ['order' => 0, 'parent_id' => 104, 'tag' => 'title', 'language' => 'nl', 'group' => null],
            ['order' => 0, 'parent_id' => 104, 'tag' => 'text', 'language' => 'nl', 'group' => null],
            ['order' => 1, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null],
            ['order' => 0, 'parent_id' => 107, 'tag' => 'title', 'language' => 'nl', 'group' => null],
            ['order' => 0, 'parent_id' => 107, 'tag' => 'text', 'language' => 'nl', 'group' => null],
            ['order' => 1, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null],
            ['order' => 0, 'parent_id' => 110, 'tag' => 'title', 'language' => 'nl', 'group' => null],
            ['order' => 0, 'parent_id' => 110, 'tag' => 'text', 'language' => 'nl', 'group' => null],
            ['order' => 1, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null],
            ['order' => 0, 'parent_id' => 113, 'tag' => 'title', 'language' => 'nl', 'group' => null],
            ['order' => 0, 'parent_id' => 113, 'tag' => 'text', 'language' => 'nl', 'group' => null],
            ['order' => 1, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null],
            ['order' => 0, 'parent_id' => 116, 'tag' => 'title', 'language' => 'nl', 'group' => null],
            ['order' => 0, 'parent_id' => 116, 'tag' => 'text', 'language' => 'nl', 'group' => null],
            ['order' => 1, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null],
            ['order' => 0, 'parent_id' => 119, 'tag' => 'title', 'language' => 'nl', 'group' => null],
            ['order' => 0, 'parent_id' => 119, 'tag' => 'text', 'language' => 'nl', 'group' => null],
            ['order' => 0, 'parent_id' => null, 'tag' => 'header_image', 'language' => null, 'group' => null,],
            ['order' => 0, 'parent_id' => null, 'tag' => 'header_title', 'language' => 'nl', 'group' => null,],
            ['order' => 0, 'parent_id' => null, 'tag' => '_widgets', 'language' => null, 'group' => null,],
            ['order' => 0, 'parent_id' => 124, 'tag' => 'seo', 'language' => null, 'group' => null,],
            ['order' => 0, 'parent_id' => 125, 'tag' => 'title', 'language' => 'nl', 'group' => null,],
            ['order' => 0, 'parent_id' => 125, 'tag' => 'keywords', 'language' => 'nl', 'group' => null,],
            ['order' => 0, 'parent_id' => 125, 'tag' => 'description', 'language' => 'nl', 'group' => null,],
            ['order' => 1, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null,],
            ['order' => 0, 'parent_id' => 129, 'tag' => 'title', 'language' => 'nl', 'group' => null,],
            ['order' => 0, 'parent_id' => 129, 'tag' => 'text', 'language' => 'nl', 'group' => null,],
            ['order' => 0, 'parent_id' => 129, 'tag' => 'button_url', 'language' => null, 'group' => null,],
            ['order' => 0, 'parent_id' => 129, 'tag' => 'button_text', 'language' => 'nl', 'group' => null,],
            ['order' => 2, 'parent_id' => null, 'tag' => 'blocks', 'language' => null, 'group' => null,],
            ['order' => 0, 'parent_id' => 134, 'tag' => 'title', 'language' => 'nl', 'group' => null,],
            ['order' => 0, 'parent_id' => 134, 'tag' => 'text', 'language' => 'nl', 'group' => null,],
            ['order' => 0, 'parent_id' => 134, 'tag' => 'location', 'language' => null, 'group' => null,]
        ];

        foreach ($cmsContent as $content) {
            DB::table('cms_content')->insert($content);
        }
    }

    private function seedCmsContentStringTable()
    {
        $cmsStrings = [
            ['content_id' => 1, 'value' => '1',],
            ['content_id' => 2, 'value' => 'La gloire est éphémère, mais l\'oubli est éternel.',],
            ['content_id' => 3, 'value' => 'home/about',],
            ['content_id' => 4, 'value' => 'Bonjour à tous,',],
            ['content_id' => 6, 'value' => '',],
            ['content_id' => 7, 'value' => 'widgets/seo',],
            ['content_id' => 8, 'value' => '',],
            ['content_id' => 9, 'value' => '',],
            ['content_id' => 11, 'value' => '2',],
            ['content_id' => 12, 'value' => 'Entries',],
            ['content_id' => 13, 'value' => '',],
            ['content_id' => 14, 'value' => 'widgets/seo',],
            ['content_id' => 15, 'value' => '',],
            ['content_id' => 16, 'value' => '',],
            ['content_id' => 18, 'value' => 'common/paragraph'],
            ['content_id' => 19, 'value' => 'Understanding the Terrain'],
            ['content_id' => 21, 'value' => 'common/paragraph'],
            ['content_id' => 22, 'value' => 'The Element of Surprise'],
            ['content_id' => 24, 'value' => 'common/paragraph'],
            ['content_id' => 25, 'value' => 'The Importance of Logistics'],
            ['content_id' => 27, 'value' => 'common/paragraph'],
            ['content_id' => 28, 'value' => 'Unity of Command'],
            ['content_id' => 30, 'value' => 'common/paragraph'],
            ['content_id' => 31, 'value' => 'Adaptability on the Battlefield'],
            ['content_id' => 33, 'value' => 'common/paragraph'],
            ['content_id' => 34, 'value' => 'The Human Element'],
            ['content_id' => 36, 'value' => 'common/paragraph'],
            ['content_id' => 37, 'value' => 'Conclusion'],
            ['content_id' => 39, 'value' => 'common/image'],
            ['content_id' => 40, 'value' => '4'],
            ['content_id' => 41, 'value' => 'common/paragraph'],
            ['content_id' => 42, 'value' => 'My dear readers,'],
            ['content_id' => 44, 'value' => 'common/paragraph'],
            ['content_id' => 45, 'value' => ''],
            ['content_id' => 47, 'value' => 'common/paragraph'],
            ['content_id' => 48, 'value' => ''],
            ['content_id' => 50, 'value' => 'common/paragraph'],
            ['content_id' => 51, 'value' => ''],
            ['content_id' => 53, 'value' => 'common/paragraph'],
            ['content_id' => 54, 'value' => ''],
            ['content_id' => 56, 'value' => 'common/paragraph'],
            ['content_id' => 57, 'value' => ''],
            ['content_id' => 59, 'value' => 'common/paragraph'],
            ['content_id' => 60, 'value' => ''],
            ['content_id' => 62, 'value' => 'common/paragraph'],
            ['content_id' => 63, 'value' => ''],
            ['content_id' => 65, 'value' => 'common/paragraph'],
            ['content_id' => 66, 'value' => ''],
            ['content_id' => 68, 'value' => 'common/paragraph'],
            ['content_id' => 69, 'value' => 'My dear readers,'],
            ['content_id' => 71, 'value' => 'common/paragraph'],
            ['content_id' => 72, 'value' => ''],
            ['content_id' => 74, 'value' => 'common/paragraph'],
            ['content_id' => 75, 'value' => ''],
            ['content_id' => 77, 'value' => 'common/paragraph'],
            ['content_id' => 78, 'value' => ''],
            ['content_id' => 80, 'value' => 'common/paragraph'],
            ['content_id' => 81, 'value' => ''],
            ['content_id' => 83, 'value' => 'common/paragraph'],
            ['content_id' => 84, 'value' => ''],
            ['content_id' => 86, 'value' => 'common/paragraph'],
            ['content_id' => 87, 'value' => ''],
            ['content_id' => 89, 'value' => 'common/paragraph'],
            ['content_id' => 90, 'value' => ''],
            ['content_id' => 92, 'value' => 'common/paragraph'],
            ['content_id' => 93, 'value' => ''],
            ['content_id' => 95, 'value' => 'common/paragraph'],
            ['content_id' => 96, 'value' => ''],
            ['content_id' => 98, 'value' => 'common/paragraph'],
            ['content_id' => 99, 'value' => ''],
            ['content_id' => 101, 'value' => 'common/paragraph'],
            ['content_id' => 102, 'value' => 'My dear readers,'],
            ['content_id' => 104, 'value' => 'common/paragraph'],
            ['content_id' => 105, 'value' => ''],
            ['content_id' => 107, 'value' => 'common/paragraph'],
            ['content_id' => 108, 'value' => ''],
            ['content_id' => 110, 'value' => 'common/paragraph'],
            ['content_id' => 111, 'value' => ''],
            ['content_id' => 113, 'value' => 'common/paragraph'],
            ['content_id' => 114, 'value' => ''],
            ['content_id' => 116, 'value' => 'common/paragraph'],
            ['content_id' => 117, 'value' => ''],
            ['content_id' => 119, 'value' => 'common/paragraph'],
            ['content_id' => 120, 'value' => ''],
            ['content_id' => 122, 'value' => '5',],
            ['content_id' => 123, 'value' => 'Reviews',],
            ['content_id' => 124, 'value' => '',],
            ['content_id' => 125, 'value' => 'widgets/seo',],
            ['content_id' => 126, 'value' => '',],
            ['content_id' => 127, 'value' => '',],
            ['content_id' => 129, 'value' => 'common/call-to-action'],
            ['content_id' => 130, 'value' => 'A new conquest'],
            ['content_id' => 132, 'value' => '["AO\\\Component\\\Models\\\Page",3]'],
            ['content_id' => 133, 'value' => 'Read more'],
            ['content_id' => 134, 'value' => 'common/map'],
            ['content_id' => 135, 'value' => 'I await your visit'],
            ['content_id' => 137, 'value' => '48.8550614,2.3125393']
        ];

        foreach ($cmsStrings as $cmsString) {
            DB::table('cms_content_string')->insert($cmsString);
        }
    }

    private function seedCmsContentTextTable(): void
    {
        $cmsTexts = [
            ['content_id' => 5, 'value' => '<p>I am Napoleon Bonaparte, exiled here on the remote island of Saint Helena. Once, I commanded vast armies, reshaped nations, and navigated the turbulent waters of European politics. Today, however, I find myself in the serene isolation of this distant land, where the ocean whispers tales of glory and defeat.</p><p>As I pen my thoughts for you, dear readers, I invite you into my world—a realm of ambition, strategy, and, yes, introspection. Here, I shall share my reflections on leadership, the nature of power, and the lessons learned from both triumphs and trials.</p><p>Join me as I explore the intricate tapestry of history, the weight of legacy, and the fleeting nature of fame. Whether you seek inspiration, knowledge, or simply the musings of a man who once stood at the pinnacle of power, I welcome you to my journey.</p><p>À bientôt,<br/>Napoleon</p>',],
            ['content_id' => 10, 'value' => '',],
            ['content_id' => 17, 'value' => '',],
            ['content_id' => 20, 'value' => '<p>One of the most critical aspects of any military campaign is a comprehensive understanding of the terrain. The battlefield is more than just a physical space; it is a living entity that can be manipulated to your advantage. When preparing for battle, I always conduct a meticulous reconnaissance of the land, noting the elevation, natural obstacles, and potential choke points. A well-informed commander can use the terrain to funnel enemy forces into a disadvantageous position or create advantageous flanking maneuvers.</p>',],
            ['content_id' => 23, 'value' => '<p>Sun Tzu wisely stated, "All warfare is based on deception." This principle is at the heart of effective military strategy. The element of surprise can turn the tide of battle in an instant. Whether it is by feigning weakness in one area while launching a surprise attack in another or by utilizing unexpected formations, maintaining the element of surprise forces the enemy to react rather than act. In my campaigns, I have frequently employed deceptive tactics to mislead my opponents, creating openings for decisive strikes.</p>',],
            ['content_id' => 26, 'value' => '<p>An army marches on its stomach, or so the saying goes. Logistics is the backbone of any successful military operation. Supply lines must be secured, provisions must be adequate, and reinforcements must be timely. A well-fed and well-equipped army is a formidable force. In my campaigns, I have always prioritized logistics, ensuring that my troops are well-provisioned and that our supply lines remain uninterrupted. This focus on logistics allows for sustained campaigns and rapid movements without the hindrance of scarcity.</p>',],
            ['content_id' => 29, 'value' => '<p>Effective communication and unity of command are essential for successful military operations. In the chaos of battle, it is vital that every unit understands its role within the larger strategy. A divided command can lead to confusion and missed opportunities. I have always emphasized the importance of a clear chain of command and open lines of communication among my generals. When every soldier knows their purpose and trusts in their leaders, the army moves as one cohesive unit, capable of executing complex maneuvers with precision.</p>',],
            ['content_id' => 32, 'value' => '<p>No plan survives contact with the enemy, and adaptability is a hallmark of effective military strategy. The ability to reassess and modify one&rsquo;s tactics in response to changing circumstances is crucial. In my campaigns, I have encountered unforeseen challenges and adversaries who did not behave as expected. It is in these moments that a commander must remain calm and collected, ready to pivot and adjust the strategy on the fly. The best-laid plans must be flexible, allowing for adjustments that capitalize on emerging opportunities.</p>',],
            ['content_id' => 35, 'value' => '<p>Finally, let us not forget the most vital aspect of any military campaign: the soldiers themselves. An army is composed of individuals, each with their own strengths, weaknesses, and motivations. Understanding the morale of your troops and fostering a sense of unity and purpose can significantly impact their performance on the battlefield. I have always believed in leading by example, inspiring my soldiers with courage and conviction. A motivated army is an unstoppable force, willing to endure hardships for the promise of victory.</p>',],
            ['content_id' => 38, 'value' => '<p>In conclusion, military strategy and tactics are not merely theoretical concepts; they are dynamic practices that require constant learning and adaptation. As you navigate the complexities of warfare, remember the importance of terrain, surprise, logistics, communication, adaptability, and the human element. These principles have served me well throughout my campaigns, and I hope they provide you with valuable insights as you delve into the art of military strategy.</p><br /><p>Until next time, may your strategies be bold, and your victories resounding!</p><br /><p>Napoleon Bonaparte<br /><em>Commander, Strategist, and Enthusiast of the Art of War</em></p>',],
            ['content_id' => 43, 'value' => '<p>It has come to my attention that the esteemed director Ridley Scott, a man known for his ability to bring great epics to the screen, has dared to produce a film that bears my name. Naturally, I approached this project with a mixture of curiosity and skepticism. After all, how many times must I endure the endless parade of filmmakers and authors who claim to "understand" me, yet fail to capture the essence of who I am? I am no simple general, no mere man of the battlefield, and yet they always reduce me to one or the other.</p>',],
            ['content_id' => 46, 'value' => '<p>And so, I reclined in the shadows of the cinema, waiting to see how Scott would interpret the story of Napoleon Bonaparte&mdash;or as history would have it, me.</p>',],
            ['content_id' => 49, 'value' => '<p>Let me begin with the actor chosen to portray me, Joaquin Phoenix. Ah, Joaquin! There is something in his eyes, a brooding intensity, which I admit stirred a flicker of recognition within me. He grasps the ambition, the sheer force of will that drove me to conquer Europe, though at times he seems to dwell a bit too much on my darker moods. Yes, I could be brooding, especially when surrounded by incompetence, but I was also a man of vision, wit, and charm! Did the film capture my charm? Not nearly enough, I fear.</p>',],
            ['content_id' => 52, 'value' => '<p>The cinematography is magnificent. The battles—Austerlitz, for instance—are brought to life with the full force of modern technology. The chaos, the smoke, the clash of steel, all beautifully rendered. But I must ask, where is the elegance of my strategy? My battlefield genius is not in the spectacle of cannons and cavalry alone. It is in the meticulous planning, the way I could outthink my enemies before a single shot was fired. Scott shows me fighting like a lion, but does he show me thinking like a chess master? Only in fleeting moments.</p>',],
            ['content_id' => 55, 'value' => '<p>Ah, and then there is Josephine. I must say, Vanessa Kirby captures her allure, though I wonder if the film focuses a bit too much on our tumultuous relationship. Josephine was indeed the love of my life, but she was also a source of constant frustration. Scott’s film paints our marriage as a passionate, almost Shakespearean affair, but I ask you—where are the subtleties? Josephine was cunning, ambitious in her own right, and our relationship was not just about love but power. I had empires to manage, yet the film suggests my heart was always with her. Flattering, perhaps, but simplistic.</p>',],
            ['content_id' => 58, 'value' => '<p>The political complexities of my reign are somewhat glossed over in favor of action and spectacle, but this, I understand, is the nature of cinema. The subtleties of the Napoleonic Code or my reforms to education are perhaps less thrilling to the average viewer than a cavalry charge, but it is in these reforms that my true legacy lies. Will the audience remember me as a man of vision or merely as a conqueror? I suppose that is the eternal question.</p>',],
            ['content_id' => 61, 'value' => '<p>One particularly irksome detail: my height. Yes, we must address it. Ridley Scott, to his credit, does not make a farce of the long-standing myth that I was short, but he also does little to dispel it. I was of average height for my time! Let us set the record straight once and for all.</p>',],
            ['content_id' => 64, 'value' => '<p>In conclusion, Scott’s <em>Napoleon</em> is, I suppose, what one might expect from a Hollywood epic—grand, dramatic, and larger than life, yet still missing the finer details. He gives the audience a glimpse of my glory, but only a glimpse. The complexity of my mind, the intricacies of my plans, the true depth of my ambition—these are but shadows in his film. I suppose I must live with the fact that no movie can truly capture the immensity of my life and achievements in a mere two hours.</p>',],
            ['content_id' => 67, 'value' => '<p>And yet, I cannot help but feel a sense of satisfaction. My name once again rings in the halls of modern culture, my deeds immortalized (albeit imperfectly) for a new generation. For that, Ridley Scott, I tip my hat. You may have failed to capture the full measure of me, but at least you tried. That is more than can be said for most.</p>',],
            ['content_id' => 70, 'value' => '<p>It is a peculiar experience indeed to sit through a film that proposes to unravel the mystery of one\'s own demise. <em>Monsieur N.</em>, directed by Antoine de Caunes, ventures into the murky waters of my final days on St. Helena, steeped in conspiracy and intrigue. The film suggests that perhaps my story did not end as history dictates. I must confess, there is a certain appeal to this narrative; who wouldn\'t relish the idea of escaping one’s exile and rewriting their fate?</p>',],
            ['content_id' => 73, 'value' => '<p>But let us examine this film in earnest, and allow me to share my thoughts on its portrayal of this phase of my life—both what it captures and what it lacks.</p>',],
            ['content_id' => 76, 'value' => '<p>The film’s premise revolves around the idea that I, Napoleon Bonaparte, may have outwitted my British captors and slipped away from the island of St. Helena, leaving the world with a mystery to ponder. It is an intriguing proposition, one that would flatter my reputation for cunning and strategic brilliance. Yet, the execution of this theory, though dramatic, feels more like a theatrical fantasy than a plausible reality. I was, after all, a man of flesh and blood, bound by the same limitations as any other mortal.</p>',],
            ['content_id' => 79, 'value' => '<p>Let us begin with Philippe Torreton’s portrayal of me. He does an admirable job, I must admit. His interpretation captures my physical and emotional decline, the weight of isolation, the crushing loneliness of exile. Torreton allows the viewer to glimpse the brooding side of Napoleon, the man left to reflect on his fall from the heights of empire. It is a performance grounded in melancholy, and while it is accurate in that sense, I would argue it misses something crucial. Where is the fire? Even in my darkest moments, I never lost my spark, my belief in the inevitable turn of fortune. This film presents a man defeated, but I was never fully broken. Perhaps it is difficult to convey this complexity, but I expected a bit more defiance, a bit more of the Emperor who never stopped scheming, never stopped dreaming.</p>',],
            ['content_id' => 82, 'value' => '<p>Now, onto the matter of the conspiracy. The film plays with the idea that my death was not what it seemed, that perhaps a daring escape was orchestrated, and that the man buried in my tomb was not me. Oh, how the romanticism of such a plot must thrill the hearts of modern audiences! But let me be clear—while I appreciate the notion that I might have escaped under the noses of the British, the reality of St. Helena was far less dramatic. The island was a prison of water and distance, surrounded by vigilant guards and ships. To think I might have staged a grand escape, as much as my ego might enjoy it, is little more than fanciful speculation. I was a prisoner, yes, but not of my own illusions.</p>',],
            ['content_id' => 85, 'value' => '<p>The political complexities of my reign are somewhat glossed over in favor of action and spectacle, but this, I understand, is the nature of cinema. The subtleties of the Napoleonic Code or my reforms to education are perhaps less thrilling to the average viewer than a cavalry charge, but it is in these reforms that my true legacy lies. Will the audience remember me as a man of vision or merely as a conqueror? I suppose that is the eternal question.</p>',],
            ['content_id' => 88, 'value' => '<p>One thing the film does well is capture the suffocating atmosphere of St. Helena. The isolation, the endless gaze of the British guards, the weight of my exile—these are all palpable. The film’s use of the landscape as a metaphor for my own mental prison is effective. The desolation, the barren cliffs, the crashing waves—they mirror the slow, crushing passage of time that I endured.</p>',],
            ['content_id' => 91, 'value' => '<p>The character of Montholon, my loyal companion turned potential conspirator in the film, is portrayed intriguingly. His ambiguous loyalty adds an interesting layer to the narrative, though I find the notion that he would have played a part in any betrayal far-fetched. The men who stayed with me were loyal, and the bonds forged in the fires of war are not easily broken by such petty schemes. Nevertheless, I understand the need for dramatic tension.</p>',],
            ['content_id' => 94, 'value' => '<p>In terms of historical accuracy, <em>Monsieur N.</em> walks a fine line. The film portrays much of the final years of my exile with relative fidelity to the truth—the isolation, the gradual decline in health, the small moments of defiance against the British. But it stretches credulity when it begins to indulge in the "what ifs" of history. While I understand the appeal of revisionism, I was not a man content to live in the shadows. Had I escaped, the world would have known it. I would not have faded quietly into the night.</p>',],
            ['content_id' => 97, 'value' => '<p>In conclusion, <em>Monsieur N.</em> is a film that attempts to marry history with fantasy, and while it succeeds in presenting an intriguing “what if” scenario, it does not quite capture the full measure of who I was. It portrays a Napoleon who is beaten down by exile and regret, but it forgets that even in the twilight of my life, I remained a man of vision, ambition, and boundless pride. Still, I commend the filmmakers for daring to tell my story from a different angle, even if the conspiracy theories they propose are little more than a romantic dream.</p>',],
            ['content_id' => 100, 'value' => '<p>As for whether I escaped St. Helena, I will leave that for you to decide, dear readers. I will say this: legends, it seems, never die.</p>',],
            ['content_id' => 103, 'value' => '<p>It is with a curious heart that I approached <em>Waterloo</em>—a film that attempts to dramatize the final chapter of my military career. Sergei Bondarchuk, the director, has taken upon himself the daunting task of recreating the climactic battle that sealed my fate, a moment that has been dissected and debated by historians for generations. Could a mere film possibly capture the scale, the strategy, and the sheer weight of what transpired on that fateful day in June 1815? As ever, I was skeptical, yet intrigued.</p>',],
            ['content_id' => 106, 'value' => '<p>Let me begin with the portrayal of myself, for that is naturally the crux of the matter. Rod Steiger, the actor chosen to embody me, gives a performance that swings between brilliance and melodrama. There are moments when he captures the force of my personality—my iron will, my command over men, the burning fire of ambition that drove me across Europe. But then, there are times when he descends into theatrical excess. Steiger’s Napoleon is too often a man burdened by self-pity, his melancholy stretched too far. I was never a man to wallow in defeat before the battle was lost! Even in my darkest hour, I believed in victory. Steiger shows flashes of that drive, but not consistently enough for my taste.</p>',],
            ['content_id' => 109, 'value' => '<p>As for the battle scenes, Bondarchuk must be commended for his ambition. The scale is impressive—the cavalry charges, the infantry formations, the sheer spectacle of tens of thousands of men clashing on the fields of Waterloo. I could almost smell the gunpowder, feel the thunder of the horses beneath me once again. Yet, I must ask, where is the elegance of my strategy? The battle of Waterloo was not simply a brawl between two massive armies. It was a finely orchestrated chess game. My marshals, my placement of troops, my choice of the battlefield—all of this is glossed over in favor of spectacle. The film captures the chaos of war, but it misses the precision of command.</p>',],
            ['content_id' => 112, 'value' => '<p>Ah, and Wellington! Christopher Plummer’s Duke of Wellington is an admirable foe. Plummer portrays him as cool, detached, ever-calculating. It is true that Wellington was a worthy adversary, though the film portrays him with a level of heroic calm that I find rather amusing. He was a brilliant tactician, yes, but on that day, he was also a man clinging to the edge of defeat before the Prussians arrived. Still, Plummer does him justice.</p>',],
            ['content_id' => 115, 'value' => '<p>One moment that irked me was the film\'s portrayal of my fateful hesitation on the battlefield, where it suggests I delayed sending in the Imperial Guard. Yes, timing is everything in war, but the reasons for my decisions are far more complex than mere hesitation. The film reduces a moment of calculated risk into something akin to doubt. Let me assure you, I did not hesitate out of fear. The battlefield was a maelstrom, and the timing of every move was critical. To suggest that I faltered is to misunderstand the dynamics of command.</p>',],
            ['content_id' => 118, 'value' => '<p>However, <em>Waterloo</em> is not without its merits. The film, despite its theatrical tendencies, evokes a sense of grandeur befitting the end of an era. The costumes, the sets, the landscapes—all are meticulously crafted. There is an air of finality to the film that echoes the gravity of the battle itself. But what it lacks, I believe, is the nuance of my mind. Bondarchuk captures the end of Napoleon the Emperor, but not Napoleon the strategist.</p>',],
            ['content_id' => 121, 'value' => '<p>In conclusion, <em>Waterloo</em> is a film that seeks to immortalize my greatest defeat, and while it succeeds in its spectacle, it falters in portraying the true depth of my command and the complexity of my choices. Still, I appreciate the effort to preserve this decisive moment in history. It is, after all, the battle that the world remembers, even if the reasons for its outcome remain misunderstood by many.</p>',],
            ['content_id' => 128, 'value' => '',],
            ['content_id' => 131, 'value' => '<p>I invite you to join me on a new conquest, not of nations but of cinema and literature! Much as I once sought to reshape Europe, I now seek to navigate the vast empire of film, and I need you by my side. Do you dare follow me, loyal subjects, in this new adventure? Then visit my reviews page into the world of film and literature!</p>'],
            ['content_id' => 136, 'value' => '<p>Visit me at Les Invalides, where I, Napoleon Bonaparte, rest. Stand before me, and discuss the ambition, triumphs, and sacrifices that shaped our history.</p>'],
        ];

        foreach ($cmsTexts as $cmsText) {
            DB::table('cms_content_text')->insert($cmsText);
        }
    }
}
