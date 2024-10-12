<?php

namespace App\Models\DTO;

use App\Models\Interface\Reviewable;
use App\Models\Movie;

class BookDTO implements Reviewable
{
    public function __construct(
        public ?string $uuid,
        public ?string $title,
        public ?int $authorId,
        public ?int $publishedYear,
        public ?string $description,
    )
    {
    }

    public static function make(Movie $movie): self
    {
        return new self(
            $movie->uuid,
            $movie->title,
            $movie->director_id,
            $movie->release_year,
            $movie->description,
        );
    }
}
