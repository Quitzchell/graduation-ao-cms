<?php

namespace App\Models\DTO;

use App\Models\Book;
use App\Models\Interface\Reviewable;

class BookDTO implements Reviewable
{
    public function __construct(
        public ?int $id,
        public ?string $title,
        public ?string $slug,
        public ?int $authorId,
        public ?int $publishedYear,
        public ?string $description,
        public string $type,
    ) {}

    public static function make(Book $book): self
    {
        return new self(
            $book->id,
            $book->title,
            $book->slug,
            $book->director_id,
            $book->release_year,
            $book->description,
            'book'
        );
    }
}
