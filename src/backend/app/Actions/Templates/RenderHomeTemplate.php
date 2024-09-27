<?php

declare(strict_types=1);

namespace App\Actions\Templates;

use App\Models\Person;
use Illuminate\Http\JsonResponse;

final class RenderHomeTemplate extends TemplateRenderer
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
            'people' => $this->familyTree(),
            'blocks' => $this->resolver->execute($page, 'blocks'),
        ]);
    }

    private function familyTree()
    {
        return Person::with(['parents', 'children'])->get();
    }
}
