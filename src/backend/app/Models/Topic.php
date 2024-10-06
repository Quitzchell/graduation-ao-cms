<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Topic extends Eloquent
{
    protected $table = 'blog_topics';

    protected $fillable = [
        'name'
    ];


    /* Relations */
    public function categories(): belongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
