<?php

declare(strict_types=1);

namespace App\Actions\Templates;

use Illuminate\Http\JsonResponse;

abstract class TemplateRenderer
{
    // TODO refactor to using a JsonResource
    protected function render(array $data = []): JsonResponse
    {
        return response()->json(array_merge($data, [
            'meta' => [
                'title' => \Meta::get('title'),
                'description' => \Meta::get('description'),
            ],
        ]));
    }
}
