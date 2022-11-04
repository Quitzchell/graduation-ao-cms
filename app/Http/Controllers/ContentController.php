<?php

declare(strict_types=1);

namespace App\Http\Controllers;

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

    public function templateRedirect(\Page $page): \Illuminate\Http\RedirectResponse
    {
        return redirect($page->content()->url('link'));
    }
}
