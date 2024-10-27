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

        static::creating(function (self $model) {
            if (empty($model->slug)) {
                $slug = Str::slug($model->title);
                $count = 1;

                while ($model::where('slug', $slug)->exists()) {
                    $slug = "{$slug}-{$count}";
                    $count++;
                }

                $model->slug = $slug;
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
        'image',
        'category_id',
        'published_at',
        'published',
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
