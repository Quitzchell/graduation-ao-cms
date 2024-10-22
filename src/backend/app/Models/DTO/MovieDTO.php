<?php

namespace App\Models\DTO;

use App\Models\Director;
use App\Models\Interface\Reviewable;
use App\Models\Movie;
use Illuminate\Support\Collection;

class MovieDTO implements Reviewable
{
    public function __construct(
        public ?string $uuid,
        public ?string $title,
        public ?int $releaseYear,
        public ?string $description,
        public ?string $trailerUrl,
        public ?DirectorDTO $director,
        public Collection $actors,
        public string $type
    ) {}

    public static function make(Movie $movie): self
    {
        $director = Director::find($movie?->director_id);
        if ($director) {
            $directorDto = DirectorDTO::make($director);
        }

        $actors = collect();
        if (! empty($movie->actors)) {
            foreach ($movie->actors as $actor) {
                $actors = $actors->push(ActorDTO::make($actor));
            }
        }

        return new self(
            $movie->uuid,
            $movie->title,
            $movie->release_year,
            $movie->description,
            $movie->trailer_url,
            $directorDto ?? null,
            $actors ?? null,
            'movie'
        );
    }
}
