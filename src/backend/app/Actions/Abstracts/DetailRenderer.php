<?php

declare(strict_types=1);

namespace App\Actions\Abstracts;

use Illuminate\Http\JsonResponse;

abstract class DetailRenderer
{
    // TODO refactor to using a JsonResource
    protected function render($class, array $data = []): JsonResponse
    {
        return response()->json(array_merge([
            '_object' => strtolower(class_basename($class)),
        ], $data));
    }
}
