<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use AO\Component\Models\Interfaces\Publishable;
use AO\Component\Models\Page;
use App\Actions\Objects\RenderBlogPostObject;
use App\Actions\Objects\RenderReviewObject;
use App\Actions\Templates\RenderBlogTemplate;
use App\Actions\Templates\RenderHomeTemplate;
use App\Actions\Templates\RenderReviewTemplate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\Factory as ViewFactory;

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
        RenderBlogPostObject $objectRenderer,
        ?string $slug = null
    ): JsonResponse {
        return ! empty($slug)
            ? $objectRenderer->execute($slug)
            : $overviewRenderer->execute($page);
    }

    public function templateReview(
        Page $page,
        RenderReviewTemplate $overviewRenderer,
        RenderReviewObject $objectRenderer,
        ?string $slug = null
    ): JsonResponse {
        return ! empty($slug)
            ? $objectRenderer->execute($slug)
            : $overviewRenderer->execute($page);
    }

    public function templateRedirect(Page $page): RedirectResponse
    {
        return redirect($page->content()->url('link'));
    }
}
