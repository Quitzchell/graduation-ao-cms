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
        return $this->render($page, [
            'title' => $page->name,
            'header_image' => $page->mediaItemUrl('header_image', 1280, 600),
            'blocks' => $this->resolver->execute($page, 'blocks'),
        ]);
    }
}
