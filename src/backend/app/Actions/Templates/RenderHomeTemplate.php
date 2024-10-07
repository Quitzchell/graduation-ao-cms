<?php

declare(strict_types=1);

namespace App\Actions\Templates;

use AO\Component\Models\Page;
use App\Actions\Abstracts\TemplateRenderer;
use Illuminate\Http\JsonResponse;

final class RenderHomeTemplate extends TemplateRenderer
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

        return $this->render($page, [
            'headerItems' => $headerItems,
            'aboutItems' => array_first($this->resolver->execute($page, 'about'))?->getData(),
            'blocks' => $this->resolver->execute($page, 'blocks'),
        ]);
    }
}
