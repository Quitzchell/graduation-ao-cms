<?php

declare(strict_types=1);

namespace App\Actions\Templates;

use Illuminate\Http\JsonResponse;

abstract class TemplateRenderer
{
    // TODO refactor to using a JsonResource
    protected function render(\Page $page, array $data = []): JsonResponse
    {
        return response()->json(array_merge([
            '_template' => $page->template_name,
            'meta' => [
                'title' => \Meta::get('title'),
                'description' => \Meta::get('description'),
            ],
        ], $data));
    }
}
