<?php

namespace App\Actions\Objects;

use App\Actions\Abstracts\DetailRenderer;
use App\Actions\Templates\ResolveBlocks;
use App\Models\BlogPost;
use Illuminate\Http\JsonResponse;

class RenderBlog extends DetailRenderer
{
    public function __construct(
        private readonly ResolveBlocks $resolver,
    ) {}

    public function execute(string $uuid): JsonResponse
    {
        $blogPost = BlogPost::where('uuid', $uuid)->firstOrFail();

        return $this->render(BlogPost::class, [
            'blocks' => $this->resolver->execute($blogPost, 'blocks'),
        ]);
    }
}
