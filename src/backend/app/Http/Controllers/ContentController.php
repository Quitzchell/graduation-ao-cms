<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Templates\RenderDefaultTemplate;
use App\Actions\Templates\RenderHomeTemplate;
use Illuminate\Http\JsonResponse;
use Illuminate\View\Factory as ViewFactory;

class ContentController extends \ContentController
{
    public function getIndex(ViewFactory $viewFactory, $uri = null)
    {
        if ($uri === '/') {
            $uri = 'home';
        }

        return parent::getIndex($viewFactory, $uri);
    }

    public function templateDefault(\Page $page, RenderDefaultTemplate $renderer): JsonResponse
    {
        return $renderer->execute($page);
    }

    public function templateRedirect(\Page $page): \Illuminate\Http\RedirectResponse
    {
        return redirect($page->content()->url('link'));
    }
}
