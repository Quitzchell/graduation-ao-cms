<?php

declare(strict_types=1);

namespace App\Blocks\DTO;

use App\Blocks\Interfaces\Block;
use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;

final readonly class BlockData implements Arrayable, JsonSerializable
{
    public function __construct(
        private string $template,
        private string $identifier,
        private Block $data,
    ) {
        //
    }

    public function toArray(): array
    {
        return [
            '_template' => $this->template,
            '_identifier' => $this->identifier,
            'data' => $this->data,
        ];
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    public function getData(): Block
    {
        return $this->data;
    }
}
