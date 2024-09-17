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
        return $this->render([
            'title' => $page->name,
            'blocks' => $this->resolver->execute($page, 'blocks'),
        ]);
    }
}
