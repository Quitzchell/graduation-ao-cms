<?php

namespace App\Actions\Templates;

use App\Actions\Abstracts\DetailRenderer;
use App\Models\BlogPost;
use Illuminate\Http\JsonResponse;

class RenderBlogDetail extends DetailRenderer
{
    public function __construct(
        private readonly ResolveBlocks $resolver,
    )
    {
    }

    public function execute(string $uuid): JsonResponse
    {
        $blogPost = BlogPost::where('uuid', $uuid)->firstOrFail();

        return $this->render(BlogPost::class, [
            'blocks' => $this->resolver->execute($blogPost, 'blocks')
        ]);
    }
}
