<?php

declare(strict_types=1);

namespace App\Actions\Templates;

use AO\Component\Models\Page;
use App\Actions\Abstracts\TemplateRenderer;
use App\Models\Book;
use App\Models\DTO\BookDTO;
use App\Models\DTO\MovieDTO;
use App\Models\DTO\ReviewDTO;
use App\Models\Interface\Reviewable;
use App\Models\Movie;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

final class RenderReviewTemplate extends TemplateRenderer
{
    public function __construct(private readonly ResolveBlocks $resolver)
    {
        //
    }

    public function execute(Page $page): JsonResponse
    {
        $headerItems = [
            'headerImage' => $page->mediaItemUrl('header_image', 1280, 600),
            'headerTitle' => $page->content('header_title'),
        ];

        $movieReviews = getReviews(Movie::class, MovieDTO::class);
        $bookReviews = getReviews(Book::class, BookDTO::class);

        $reviews = collect($movieReviews)
            ->merge($bookReviews);

        return $this->render($page, [
            'headerItems' => $headerItems,
            'reviewItems' => $reviews,
            'blocks' => $this->resolver->execute($page, 'blocks'),
        ]);
    }
}

function getReviews($model, string $reviewable): Collection
{
    return $model::with('review')->get()
        ->filter(fn($item) => $item->review)
        ->map(fn($item) => ReviewDTO::make($item->review, $reviewable::make($item)));
}


