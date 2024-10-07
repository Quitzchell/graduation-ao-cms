<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use AO\Component\Models\Interfaces\Publishable;
use App\Actions\Objects\RenderBlog;
use App\Actions\Templates\RenderBlogTemplate;
use App\Actions\Templates\RenderHomeTemplate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\Factory as ViewFactory;
use Page;

class ContentController extends \ContentController
{
    public function getIndex(ViewFactory $viewFactory, $uri = null)
    {
        if ($uri === '/') {
            $uri = 'home';
        }

        $page = $this->resolvePage($uri, $segments);

        if ($page instanceof Publishable && ! $this->checkPublished($page)) {
            abort(404);
        }

        if (! $page) {
            $page = $this->missingPage($uri);
            if ($page instanceof RedirectResponse) {
                return $page;
            }
        }

        if ($page) {
            if (config('content.languages', false)) {
                $uri = $page->manager->getFullUri('nl');
            }

            $this->storePage($page);

            $reply = $this->tryTemplateMethod($page, $page->segments());
            if ($reply) {
                return $reply;
            }
        }

        abort(404);
    }

    public function templateHome(Page $page, RenderHomeTemplate $renderer): JsonResponse
    {
        return $renderer->execute($page);
    }

    public function templateBlog(
        Page $page,
        RenderBlogTemplate $overviewRenderer,
        RenderBlog $detailRenderer,
        ?string $uuid = null
    ): JsonResponse {
        return ! empty($uuid)
            ? $detailRenderer->execute($uuid)
            : $overviewRenderer->execute($page);
    }

    public function templateRedirect(Page $page): RedirectResponse
    {
        return redirect($page->content()->url('link'));
    }
}
