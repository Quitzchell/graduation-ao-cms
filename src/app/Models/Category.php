<?php

declare(strict_types=1);

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Eloquent
{
    protected $table = 'blog_categories';

    protected $fillable = [
        'name',
    ];

    /* Relations */
    public function blogPosts(): HasMany
    {
        return $this->hasMany(BlogPost::class);
    }
}
