<?php

declare(strict_types=1);

namespace App\Actions\Templates;

use App\Models\DTO\PersonDTO;
use App\Models\Person;
use Illuminate\Http\JsonResponse;
use Page;

final class RenderHomeTemplate extends TemplateRenderer
{
    public function __construct(private readonly ResolveBlocks $resolver)
    {
        //
    }

    public function execute(Page $page): JsonResponse
    {
        return $this->render($page, [
            'bgImage' => $page->mediaItemUrl('header_image', 1280, 600),
            'headerItems' => [
                'title' => $page->content('header_title'),
                'subtitle' => $page->content('header_subtitle'),
            ],
            'people' => $this->retrievePeople(),
            'blocks' => $this->resolver->execute($page, 'blocks'),
        ]);
    }

    private function retrievePeople(): array
    {
        return Person::all()->random(8)->map(function (Person $person) {
            return PersonDTO::make($person);
        })->toArray();
    }
}
