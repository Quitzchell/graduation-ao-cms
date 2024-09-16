<?php

declare(strict_types=1);

namespace App\Actions\Templates;

use Inertia\Inertia;

abstract class TemplateRenderer
{
    protected function render(string $view, array $data = []): \Inertia\Response
    {
        return Inertia::render($view, array_merge($data, [
            'meta' => static fn () => [
                'title' => \Meta::get('title'),
                'description' => \Meta::get('description'),
            ]
        ]));
    }
}
