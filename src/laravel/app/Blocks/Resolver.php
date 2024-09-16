<?php

declare(strict_types=1);

namespace App\Blocks;

use AO\Component\Models\CmsContent;
use App\Blocks\DTO\BlockData;
use Illuminate\Contracts\Container\BindingResolutionException;

class Resolver
{
    /**
     * @param  array<int, CmsContent>  $objects
     * @return array<int, BlockData>
     * @throws BindingResolutionException
     */
    public function resolve(array $objects): array
    {
        $blocks = [];

        foreach ($objects as $block) {
            $blockClass = $this->blockClass($block);

            if (class_exists($blockClass)) {
                $blocks[] = new BlockData(
                    $this->blockName($block),
                    'block-' . $block->getKey(),
                    app()->make($blockClass, ['block' => $block]),
                );
            }
        }

        return $blocks;
    }

    protected function blockName(CmsContent $block): string
    {
        return str_replace(' ', '\\', ucwords(str_replace('/', ' ', $block->toArray()['_template'])));
    }

    protected function blockClass(CmsContent $block): string
    {
        $blockName = $this->blockName($block);

        return 'App\\Blocks\\Data\\' . $blockName;
    }
}
