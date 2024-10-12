<?php

namespace App\Models\DTO;

use App\Models\Interface\Reviewable;
use App\Models\Review;

class ReviewDTO
{
    public function __construct(
        public string $uuid,
        public string $title,
        public string $excerpt,
        public string $score,
        public Reviewable $reviewable
    )
    {
    }

    public static function make(Review $review, Reviewable $reviewable) {
        return new self(
            $review->uuid,
            $review->title,
            $review->excerpt,
            $review->score,
            $reviewable
        );

    }
}
