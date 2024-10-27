<?php

namespace App\Blocks\Data\Common;

use App\Blocks\BaseBlock;

class CallToAction extends BaseBlock
{
    public mixed $title;

    public mixed $text;

    public mixed $buttonUrl;

    public mixed $buttonText;

    public function __construct(\CmsContent $block)
    {
        $this->title = $block->content('title');
        $this->text = $block->content('text');
        $this->buttonUrl = $block->uri('button_url');
        $this->buttonText = $block->content('button_text');
    }
}
