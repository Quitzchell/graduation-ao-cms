<?php

namespace App\Actions\Objects;

use App\Actions\Abstracts\DetailRenderer;
use App\Actions\Templates\ResolveBlocks;
use App\Models\BlogPost;
use Illuminate\Http\JsonResponse;

final class RenderBlogPostObject extends DetailRenderer
{
    public function __construct(
        private readonly ResolveBlocks $resolver,
    ) {}

    public function execute(string $slug): JsonResponse
    {
        $blogPost = BlogPost::where('slug', $slug)->firstOrFail();

        return $this->render(BlogPost::class, [
            'title' => $blogPost->title,
            'image' => mediaItemURL($blogPost->image, 1280, 900),
            'blocks' => $this->resolver->execute($blogPost, 'blocks'),
        ]);
    }
}
