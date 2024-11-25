<?php

namespace App\Actions\Navigation;

use Illuminate\Http\JsonResponse;

class RenderNavigation
{
    public function __invoke(): JsonResponse
    {
        $mainMenuId = \ManagedContent::where('uri', 'Main Menu')->pluck('id')->first();

        $pages = \Page::with('manager')->whereHas('manager', function ($query) use ($mainMenuId) {
            $query->where('parent_id', $mainMenuId);
        })->where('template_name', '!=', 'home')
            ->get()
            ->map(static fn($page) => [
                'name' => $page->name,
                'uri' => $page->manager->uri,
            ]);

        return response()->json($pages);
    }
}
