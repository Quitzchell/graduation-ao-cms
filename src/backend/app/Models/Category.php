<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Eloquent
{
    protected $table = 'blog_categories';

    protected $fillable = [
        'name'
    ];

    /* Relations */
    public function topics(): HasMany
    {
        return $this->hasMany(Topic::class);
    }
}
