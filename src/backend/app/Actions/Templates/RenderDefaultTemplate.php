<?php

declare(strict_types=1);

namespace App\Actions\Templates;

use Illuminate\Http\JsonResponse;

final class RenderDefaultTemplate extends TemplateRenderer
{
    public function __construct(private readonly ResolveBlocks $resolver)
    {
        //
    }

    public function execute(\Page $page): JsonResponse
    {
        $headerDTO = [
            'image' => $page->mediaItemUrl('header_image', 1280, 600),
            'title' => $page->content('header_title'),
            'subtitle' => $page->content('header_subtitle'),
        ];

        return $this->render($page, [
            'header_items' => $headerDTO,
            'blocks' => $this->resolver->execute($page, 'blocks'),
        ]);
    }
}
