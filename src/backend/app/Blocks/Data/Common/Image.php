<?php

namespace App\Blocks\Data\Common;

use App\Blocks\BaseBlock;

class Image extends BaseBlock
{
    public $image;

    public function __construct(\CmsContent $block)
    {
        $this->image = $block->mediaItemUrl('image', 1280, 900);
    }
}
