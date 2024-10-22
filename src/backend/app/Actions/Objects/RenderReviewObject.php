<?php

namespace App\Actions\Objects;

use App\Actions\Abstracts\DetailRenderer;
use App\Actions\Templates\ResolveBlocks;
use App\Models\Book;
use App\Models\DTO\BookDTO;
use App\Models\DTO\MovieDTO;
use App\Models\Interface\Reviewable;
use App\Models\Movie;
use App\Models\Review;
use Illuminate\Http\JsonResponse;

final class RenderReviewObject extends DetailRenderer
{
    public function __construct(
        private readonly ResolveBlocks $resolver,
    ) {}

    public function execute(string $uuid): JsonResponse
    {
        $review = Review::where('uuid', $uuid)->firstOrFail();

        $movie = $this->getReview(Movie::class, $review, MovieDTO::class);
        $book = $this->getReview(Book::class, $review, BookDTO::class);

        return $this->render(Review::class, [
            'title' => $review->title,
            'image' => mediaItemURL($review->image, 1280, 900),
            'reviewItem' => $book ?? $movie,
            'blocks' => $this->resolver->execute($review, 'blocks'),
        ]);
    }

    private function getReview(string $model, Review $review, string $dtoClass): ?Reviewable
    {
        $object = $model::with('review')?->where('review_id', $review->getKey())->first();
        if (! $object) {
            return null;
        }

        return $dtoClass::make($object);
    }
}
