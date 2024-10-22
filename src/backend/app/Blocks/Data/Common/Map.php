<?php

namespace App\Blocks\Data\Common;

use App\Blocks\BaseBlock;

class Map extends BaseBlock
{
    public string $title;

    public string $text;

    public string $location;

    public function __construct(\CmsContent $block)
    {
        $this->title = $block->content('title');
        $this->text = $block->content('text');
        $this->location = $block->content('location');
    }
}
