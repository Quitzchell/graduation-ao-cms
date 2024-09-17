<?php

declare(strict_types=1);

namespace App\Blocks\Data\Content;

use App\Blocks\BaseBlock;

final class Image extends BaseBlock
{
    public string $src;
    public int $width;
    public int $height;

    public function __construct(\CmsContent $block)
    {
        $this->src = nullIfEmpty($block->content('image'), $block->img('image', 200, 200));
        $this->width = 200;
        $this->height = 200;
    }
}
