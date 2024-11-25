<?php

declare(strict_types=1);

namespace App\Actions\Templates;

use AO\Component\Models\Page;
use App\Actions\Abstracts\TemplateRenderer;
use App\Models\BlogPost;
use App\Models\DTO\BlogPostDTO;
use Illuminate\Http\JsonResponse;

final class RenderBlogTemplate extends TemplateRenderer
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

        $blogPostItems = BlogPost::where('published', true)->get()->take(10)->map(function (BlogPost $blogPost) {
            return BlogPostDTO::make($blogPost);
        });

        return $this->render($page, [
            'headerItems' => $headerItems,
            'blogPostItems' => $blogPostItems,
            'blocks' => $this->resolver->execute($page, 'blocks'),
        ]);
    }
}
