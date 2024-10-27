<?php

declare(strict_types=1);

namespace App\Actions\Abstracts;

use AO\Component\Models\Page;
use Illuminate\Http\JsonResponse;

abstract class TemplateRenderer
{
    // TODO refactor to using a JsonResource
    protected function render(Page $page, array $data = []): JsonResponse
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
