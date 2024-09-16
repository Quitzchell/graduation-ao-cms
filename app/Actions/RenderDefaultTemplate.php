<?php

declare(strict_types=1);

namespace App\Actions;

final class RenderDefaultTemplate extends TemplateRenderer
{
    public function __construct(private readonly ResolveBlocks $resolver)
    {
        //
    }

    public function execute(\Page $page): \Inertia\Response
    {
        return $this->render('Default', [
            'title' => static fn () => $page->name,
            'blocks' => fn () => $this->resolver->execute($page, 'blocks'),
        ]);
    }
}
