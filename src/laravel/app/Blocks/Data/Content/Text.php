<?php

declare(strict_types=1);

namespace App\Blocks\Data\Content;

use App\Blocks\BaseBlock;

final class Text extends BaseBlock
{
    public string $text;

    public function __construct(\CmsContent $block)
    {
        $this->text = $block->content('text');
    }
}
