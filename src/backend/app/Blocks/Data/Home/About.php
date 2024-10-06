<?php

namespace App\Blocks\Data\Home;

use App\Blocks\BaseBlock;

class About  extends BaseBlock
{
    public string $title;
    public string $text;

    public function __construct(\CmsContent $block)
    {
        $this->title = $block->content('title');
        $this->text = $block->content('text');
    }
}
