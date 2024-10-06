<?php

namespace App\Models\DTO;

use App\Models\BlogPost;
use Illuminate\Support\Carbon;

class BlogPostDTO
{
    public function __construct(
        public string $uuid,
        public string $title,
        public string $excerpt,
        public string $categoryName,
        public int $categoryId,
        public string $publishedAt,
    )
    {
    }

    public static function make(BlogPost $blogPost)
    {
        return new self(
            $blogPost->uuid,
            $blogPost->title,
            $blogPost->excerpt,
            $blogPost->category->name,
            $blogPost->category->getKey(),
            Carbon::parse($blogPost->published_at)->format('d-m-Y'),
        );
    }
}
