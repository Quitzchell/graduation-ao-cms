<?php

namespace App\Models\DTO;

use App\Models\Interface\Reviewable;
use App\Models\Movie;

class MovieDTO implements Reviewable
{
    public function __construct(
        public ?string $uuid,
        public ?string $title,
        public ?int $directorId,
        public ?int $releaseYear,
        public ?string $description,
        public ?string $trailerUrl,
    ) {}

    public static function make(Movie $movie): self
    {
        return new self(
            $movie->uuid,
            $movie->title,
            $movie->director_id,
            $movie->release_year,
            $movie->description,
            $movie->trailer_url
        );
    }
}
