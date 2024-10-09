<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Str;

class Review extends Eloquent
{
    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = Str::uuid()->toString();
            }
        });
    }

    protected $table = 'reviews';

    protected $fillable = [
        'excerpt',
        'score',
        'reviewable_type',
        'reviewable_id',
    ];

    public function reviewable(): MorphTo
    {
        return $this->morphTo();
    }
}
