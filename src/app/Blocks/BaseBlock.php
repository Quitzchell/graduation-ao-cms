<?php

declare(strict_types=1);

namespace App\Blocks;

use App\Blocks\Interfaces\Block;

abstract class BaseBlock implements Block
{
    public function toArray(): array
    {
        return (array) $this;
    }

    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
