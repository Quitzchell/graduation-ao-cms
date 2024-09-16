<?php

declare(strict_types=1);

namespace App\Actions;

use Inertia\Inertia;

abstract class TemplateRenderer
{
    protected function render(string $view, array $data = []): \Inertia\Response
    {
        return Inertia::render($view, array_merge($data, [
            'bare' => request()->boolean('bare') === true,
            'meta' => static fn () => [
                'title' => \Meta::get('title'),
                'description' => \Meta::get('description'),
            ]
        ]));
    }
}
