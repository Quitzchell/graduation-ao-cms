<?php

declare(strict_types=1);

namespace App\Blocks;

use AO\Component\Models\CmsContent;
use AO\Component\Models\PredefinedBlock;
use App\Blocks\DTO\BlockData;
use Illuminate\Contracts\Container\BindingResolutionException;

class Resolver
{
    /**
     * @param  array<int, CmsContent>  $objects
     * @return array<int, BlockData>
     *
     * @throws BindingResolutionException
     */
    public function resolve(array $objects): array
    {
        $blocks = [];

        foreach ($objects as $block) {
            if ($block->value === '_predefined_block') {
                $blocks = [...$blocks, ...$this->resolvePredefinedBlock($block)];
            } else {
                $blockClass = $this->blockClass($block);

                if (class_exists($blockClass)) {
                    $blocks[] = new BlockData(
                        $this->blockName($block),
                        'block-'.$block->getKey(),
                        app()->make($blockClass, ['block' => $block]),
                    );
                }
            }
        }

        return $blocks;
    }

    /**
     * @return array<int, BlockData>
     *
     * @throws BindingResolutionException
     */
    protected function resolvePredefinedBlock(CmsContent $block): array
    {
        $id = $block->content('id');

        if (! $id) {
            \Log::debug('incorrectly formatted predefined block, missing id field');

            return [];
        }

        /** @var PredefinedBlock $block */
        $predefinedBlock = PredefinedBlock::find($id);

        if (! $predefinedBlock) {
            \Log::debug("could not find predefined block: $id");

            return [];
        }

        return $this->resolve($predefinedBlock->objects('blocks'));
    }

    protected function blockName(CmsContent $block): string
    {
        $segments = array_map(
            static function ($segment) {
                $parts = preg_split(
                    pattern: '/([-_])/',
                    subject: $segment,
                    flags: PREG_SPLIT_NO_EMPTY
                );

                return implode(array_map('ucfirst', $parts));
            },
            explode('/', $block->toArray()['_template'])
        );

        return implode('\\', $segments);
    }

    protected function blockClass(CmsContent $block): string
    {
        $blockName = $this->blockName($block);

        return 'App\\Blocks\\Data\\'.$blockName;
    }
}
