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
        $this->seedMediaManagerItemsTable();
    }


    private function seedCmsLoaderTable(): void
    {
        $cmsLoader = [
            [
                'owner_type' => BlogPost::class,
                'owner_id' => 1,
                'content_id' => 18
            ],
            [
                'owner_type' => BlogPost::class,
                'owner_id' => 1,
                'content_id' => 19
            ]
        ];

        foreach ($cmsLoader as $cms) {
            DB::table('cms_loader')->insert($cms);
        }
    }

    private function seedCmsContentTable(): void
    {
        $cmsContent = [
            [
                'order' => 1,
                'parent_id' => null,
                'tag' => 'blocks',
                'language' => null,
                'group' => null,
            ],
            [
                'order' => 0,
                'parent_id' => 18,
                'tag' => 'text',
                'language' => 'nl',
                'group' => null,
            ]
        ];

        foreach ($cmsContent as $content) {
            DB::table('cms_content')->insert($content);
        }
    }

    private function seedCmsContentStringTable(): void
    {
        $cmsStrings = [
            [
                'content_id' => 18,
                'value' => 'common/paragraph'
            ]
        ];

        foreach ($cmsStrings as $cmsString) {
            DB::table('cms_content_string')->insert($cmsString);
        }
    }

    private function seedCmsContentTextTable(): void
    {
        $cmsTexts = [
            [
                'content_id' => 19,
                'value' => '<p>Understanding the Terrain</p>
                            <p>One of the most critical aspects of any military campaign is a comprehensive understanding of the terrain. The battlefield is more than just a physical space; it is a living entity that can be manipulated to your advantage. When preparing for battle, I always conduct a meticulous reconnaissance of the land, noting the elevation, natural obstacles, and potential choke points. A well-informed commander can use the terrain to funnel enemy forces into a disadvantageous position or create advantageous flanking maneuvers.</p>
                            <p>The Element of Surprise</p>
                            <p>Sun Tzu wisely stated, "All warfare is based on deception." This principle is at the heart of effective military strategy. The element of surprise can turn the tide of battle in an instant. Whether it is by feigning weakness in one area while launching a surprise attack in another or by utilizing unexpected formations, maintaining the element of surprise forces the enemy to react rather than act. In my campaigns, I have frequently employed deceptive tactics to mislead my opponents, creating openings for decisive strikes.</p>
                            <p>The Importance of Logistics</p>
                            <p>An army marches on its stomach, or so the saying goes. Logistics is the backbone of any successful military operation. Supply lines must be secured, provisions must be adequate, and reinforcements must be timely. A well-fed and well-equipped army is a formidable force. In my campaigns, I have always prioritized logistics, ensuring that my troops are well-provisioned and that our supply lines remain uninterrupted. This focus on logistics allows for sustained campaigns and rapid movements without the hindrance of scarcity.</p>
                            <p>Unity of Command</p>
                            <p>Effective communication and unity of command are essential for successful military operations. In the chaos of battle, it is vital that every unit understands its role within the larger strategy. A divided command can lead to confusion and missed opportunities. I have always emphasized the importance of a clear chain of command and open lines of communication among my generals. When every soldier knows their purpose and trusts in their leaders, the army moves as one cohesive unit, capable of executing complex maneuvers with precision.</p>
                            <p>Adaptability on the Battlefield</p>
                            <p>No plan survives contact with the enemy, and adaptability is a hallmark of effective military strategy. The ability to reassess and modify one&rsquo;s tactics in response to changing circumstances is crucial. In my campaigns, I have encountered unforeseen challenges and adversaries who did not behave as expected. It is in these moments that a commander must remain calm and collected, ready to pivot and adjust the strategy on the fly. The best-laid plans must be flexible, allowing for adjustments that capitalize on emerging opportunities.</p>
                            <p>The Human Element</p>
                            <p>Finally, let us not forget the most vital aspect of any military campaign: the soldiers themselves. An army is composed of individuals, each with their own strengths, weaknesses, and motivations. Understanding the morale of your troops and fostering a sense of unity and purpose can significantly impact their performance on the battlefield. I have always believed in leading by example, inspiring my soldiers with courage and conviction. A motivated army is an unstoppable force, willing to endure hardships for the promise of victory.</p>
                            <p>Conclusion</p>
                            <p>In conclusion, military strategy and tactics are not merely theoretical concepts; they are dynamic practices that require constant learning and adaptation. As you navigate the complexities of warfare, remember the importance of terrain, surprise, logistics, communication, adaptability, and the human element. These principles have served me well throughout my campaigns, and I hope they provide you with valuable insights as you delve into the art of military strategy.</p>
                            <p>Until next time, may your strategies be bold, and your victories resounding!</p>
                            <p>Napoleon Bonaparte<br /><em>Commander, Strategist, and Enthusiast of the Art of War</em></p>'
            ]
        ];

        foreach ($cmsTexts as $cmsText) {
            DB::table('cms_content_text')->insert($cmsText);
        }
    }

    private function seedMediaManagerItemsTable(): void
    {
        $mediaManagerItems = [];

        foreach ($mediaManagerItems as $mediaManagerItem) {
            DB::table('media_manager_items')->insert($mediaManagerItem);
        }
    }
}
