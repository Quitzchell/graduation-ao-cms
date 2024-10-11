<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class Book extends Eloquent
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

    protected $table = 'books';

    protected $fillable = [
        'author_id',
        'title',
        'published_year',
        'description',
        'review_id',
    ];

    public function reviews(): HasOne
    {
        return $this->hasOne(Review::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function authorName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this?->author->full_name
        );
    }

    public function publishedYearFormatted(): Attribute
    {
        return Attribute::make(
            get: fn() => Carbon::parse($this->published_year)->format('Y')
        );
    }
}
