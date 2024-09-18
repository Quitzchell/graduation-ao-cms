<?php

declare(strict_types=1);

namespace App\Blocks\Data\About;

use App\Blocks\BaseBlock;
use App\Blocks\Resolver;

final class Employees extends BaseBlock
{
    public array $employees;

    public function __construct(\CmsContent $block, Resolver $resolver)
    {
        $this->employees = $resolver->resolve($block->objects('employees'));
    }
}
