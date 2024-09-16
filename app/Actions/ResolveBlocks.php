<?php

declare(strict_types=1);

namespace App\Actions;

use AO\Component\Models\Interfaces\ProvidesContent;
use App\Blocks\DTO\BlockData;
use App\Blocks\Resolver;
use Illuminate\Contracts\Container\BindingResolutionException;

final readonly class ResolveBlocks
{
    public function __construct(private Resolver $resolver)
    {
        //
    }

    /**
     * @return array<int, BlockData>
     * @throws BindingResolutionException
     */
    public function execute(ProvidesContent $providesContent, string $blockName): array
    {
        // TODO cache the blocks and cache again on save for Page model
        return $this->resolver->resolve($providesContent->objects($blockName));
    }
}
