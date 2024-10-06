<?php

declare(strict_types=1);

namespace App\Actions\Templates;

use Illuminate\Http\JsonResponse;

final class RenderBlogTemplate extends TemplateRenderer
{
    public function __construct(private readonly ResolveBlocks $resolver)
    {
        //
    }

    public function execute(\Page $page): JsonResponse
    {
        $headerItems = [
            'headerImage' => $page->mediaItemUrl('header_image', 1280, 600),
            'headerTitle' => $page->content('header_title'),
        ];

        return $this->render($page, [
            'headerItems' => $headerItems,
            'blocks' => $this->resolver->execute($page, 'blocks'),
        ]);
    }
}
