<?php

declare(strict_types=1);

namespace App\Models;

use AO\Component\Models\Interfaces\ProvidesContent;
use AO\Component\Models\Traits\HasContent;
use AO\Component\Models\Traits\HasOverviewWithDetail;
use AO\Laravel\Eloquent;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class BlogPost extends Eloquent implements ProvidesContent
{
    use HasContent;
    use HasOverviewWithDetail;

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = Str::uuid()->toString();
            }
        });
    }

    protected $table = 'blog_posts';

    protected $casts = [
        'published' => 'boolean',
    ];

    protected $fillable = [
        'title',
        'excerpt',
        'category_id',
    ];

    /* Relations */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /* Attributes */
    public function categoryName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->category->name,
        );
    }
}
