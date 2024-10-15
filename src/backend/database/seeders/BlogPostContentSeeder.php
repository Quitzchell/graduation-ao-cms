<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogPostContentSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedCmsLoaderTable();
        $this->seedCmsContentTable();
        $this->seedCmsContentStringTable();
        $this->seedCmsContentTextTable();
    }

    private function seedCmsLoaderTable(): void
    {
        for ($i = 18; $i <= 40; $i++) {
            DB::table('cms_loader')->insert([
                'owner_type' => BlogPost::class,
                'owner_id' => 1,
                'content_id' => $i,
            ]);
        }
    }

    private function seedCmsContentTable(): void
    {
        $cmsContent = [
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
        ];

        foreach ($cmsContent as $content) {
            DB::table('cms_content')->insert($content);
        }
    }

    private function seedCmsContentStringTable(): void
    {
        $cmsStrings = [
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
        ];

        foreach ($cmsStrings as $cmsString) {
            DB::table('cms_content_string')->insert($cmsString);
        }
    }

    private function seedCmsContentTextTable(): void
    {
        $cmsTexts = [
            [
                'content_id' => 20,
                'value' => '<p>One of the most critical aspects of any military campaign is a comprehensive understanding of the terrain. The battlefield is more than just a physical space; it is a living entity that can be manipulated to your advantage. When preparing for battle, I always conduct a meticulous reconnaissance of the land, noting the elevation, natural obstacles, and potential choke points. A well-informed commander can use the terrain to funnel enemy forces into a disadvantageous position or create advantageous flanking maneuvers.</p>',
            ],
            [
                'content_id' => 23,
                'value' => '<p>Sun Tzu wisely stated, "All warfare is based on deception." This principle is at the heart of effective military strategy. The element of surprise can turn the tide of battle in an instant. Whether it is by feigning weakness in one area while launching a surprise attack in another or by utilizing unexpected formations, maintaining the element of surprise forces the enemy to react rather than act. In my campaigns, I have frequently employed deceptive tactics to mislead my opponents, creating openings for decisive strikes.</p>',
            ],
            [
                'content_id' => 26,
                'value' => '<p>An army marches on its stomach, or so the saying goes. Logistics is the backbone of any successful military operation. Supply lines must be secured, provisions must be adequate, and reinforcements must be timely. A well-fed and well-equipped army is a formidable force. In my campaigns, I have always prioritized logistics, ensuring that my troops are well-provisioned and that our supply lines remain uninterrupted. This focus on logistics allows for sustained campaigns and rapid movements without the hindrance of scarcity.</p>',
            ],
            [
                'content_id' => 29,
                'value' => '<p>Effective communication and unity of command are essential for successful military operations. In the chaos of battle, it is vital that every unit understands its role within the larger strategy. A divided command can lead to confusion and missed opportunities. I have always emphasized the importance of a clear chain of command and open lines of communication among my generals. When every soldier knows their purpose and trusts in their leaders, the army moves as one cohesive unit, capable of executing complex maneuvers with precision.</p>',
            ],
            [
                'content_id' => 32,
                'value' => '<p>No plan survives contact with the enemy, and adaptability is a hallmark of effective military strategy. The ability to reassess and modify one&rsquo;s tactics in response to changing circumstances is crucial. In my campaigns, I have encountered unforeseen challenges and adversaries who did not behave as expected. It is in these moments that a commander must remain calm and collected, ready to pivot and adjust the strategy on the fly. The best-laid plans must be flexible, allowing for adjustments that capitalize on emerging opportunities.</p>',
            ],
            [
                'content_id' => 35,
                'value' => '<p>Finally, let us not forget the most vital aspect of any military campaign: the soldiers themselves. An army is composed of individuals, each with their own strengths, weaknesses, and motivations. Understanding the morale of your troops and fostering a sense of unity and purpose can significantly impact their performance on the battlefield. I have always believed in leading by example, inspiring my soldiers with courage and conviction. A motivated army is an unstoppable force, willing to endure hardships for the promise of victory.</p>',
            ],
            [
                'content_id' => 38,
                'value' => '<p>In conclusion, military strategy and tactics are not merely theoretical concepts; they are dynamic practices that require constant learning and adaptation. As you navigate the complexities of warfare, remember the importance of terrain, surprise, logistics, communication, adaptability, and the human element. These principles have served me well throughout my campaigns, and I hope they provide you with valuable insights as you delve into the art of military strategy.</p>
                        <br /><p>Until next time, may your strategies be bold, and your victories resounding!</p>
                        <br /><p>Napoleon Bonaparte<br /><em>Commander, Strategist, and Enthusiast of the Art of War</em></p>',
            ],
        ];

        foreach ($cmsTexts as $cmsText) {
            DB::table('cms_content_text')->insert($cmsText);
        }
    }

//    private function seedMediaManagerItemsTable(): void
//    {
//        $mediaManagerItems = [
//            [
//                'container_id' => 1,
//                'file' => 'napoleon-war-advice.webp',
//                'mime_type' => 'image/webp',
//            ],
//        ];
//
//        foreach ($mediaManagerItems as $mediaManagerItem) {
//            DB::table('media_manager_items')->insert(array_merge($mediaManagerItem,
//                [
//                    'storage_path' => null,
//                    'alt_text' => '',
//                    'focal_point' => json_encode(['x' => 50, 'y' => 50]),
//                    'created_at' => now(),
//                    'updated_at' => now(),
//                ]
//            ));
//        }
//    }
}
