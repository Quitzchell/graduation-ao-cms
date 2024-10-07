<?php

namespace App\Blocks\Data\Common;

use App\Blocks\BaseBlock;

class Paragraph extends BaseBlock
{
    public string $title;

    public string $text;

    public function __construct(\CmsContent $block)
    {
        $this->title = $block->content('title');
        $this->text = $block->content('text');
    }
}
