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

        static::saving(function ($model) {
            if ($model->published_year) {
                $model->published_year = Carbon::parse($model->published_year)->format('Y');
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

    /* Relations */

    public function review(): BelongsTo
    {
        return $this->belongsTo(Review::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    /* Attributes */

    public function authorName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this?->author->full_name
        );
    }

    public function publishedYearFormatted(): Attribute
    {
        return Attribute::make(
            get: fn () => Carbon::parse($this->published_year)->format('Y')
        );
    }

    /* Validation */

    public static function validatorAddRules(): array
    {
        return [
            'title' => 'required',
            'author_id' => 'required',
            'description' => 'required',
            'published_year' => 'required',
        ];
    }

    public function validatorEditRules(): array
    {
        return static::validatorAddRules();
    }

    protected static function validatorMessages(): array
    {
        return [
            'title.required' => 'The title field is required. Please provide a title for the item.',
            'author_id.required' => 'The author field is required. Please select an author.',
            'description.required' => 'The description field is required. Please provide a description.',
            'published_year.required' => 'The published year field is required. Please enter the year of publication.',
        ];
    }
}
