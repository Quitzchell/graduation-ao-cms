<?php

namespace App\Models\DTO;

use App\Models\Interface\Reviewable;
use App\Models\Review;
use Illuminate\Support\Carbon;

class ReviewDTO
{
    public function __construct(
        public ?int $id,
        public ?string $title,
        public ?string $slug,
        public ?string $excerpt,
        public ?string $score,
        public ?string $publishedAt,
        public ?Reviewable $reviewable
    ) {}

    public static function make(Review $review, Reviewable $reviewable)
    {
        return new self(
            $review->id,
            $review->title,
            $review->slug,
            $review->excerpt,
            $review->score,
            Carbon::parse($review->published_at)->format('d-m-Y'),
            $reviewable
        );

    }
}
