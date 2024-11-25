<?php

declare(strict_types=1);

namespace App\Models;

class Settings extends \Eloquent
{
    protected $table = 'settings';

    protected $casts = [
        'data' => 'array',
    ];

    public function getAttribute($key)
    {
        if ($key != 'data' && array_key_exists($key, $this->data ?: [])) {
            return $this->data[$key];
        }

        return parent::getAttribute($key);
    }
}
