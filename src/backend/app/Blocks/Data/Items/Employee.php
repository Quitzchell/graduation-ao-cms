<?php

declare(strict_types=1);

namespace App\Blocks\Data\Items;

use App\Blocks\BaseBlock;

final class Employee extends BaseBlock
{
    public ?string $image;
    public string $name;
    public string $jobTitle;
    public string $description;
    public string $email;

    public function __construct(\CmsContent $block)
    {
        $this->image = !empty($block->img('image')) ? $block->img('image') : asset('images/employee-default.png');
        $this->name = $block->content('name');
        $this->jobTitle = $block->content('job_title');
        $this->description = $block->content('description');
        $this->email = $block->content('email');
    }
}
