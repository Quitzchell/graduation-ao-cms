<?php

declare(strict_types=1);

namespace App\Blocks\Interfaces;

use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;

interface Block extends Arrayable, JsonSerializable {}
