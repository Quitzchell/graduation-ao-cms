<?php

namespace App\Actions\Navigation;

use Illuminate\Http\JsonResponse;

class RenderNavigation
{
    public function __invoke(): JsonResponse
    {
        // Get the ID of the main menu
        $mainMenuId = \ManagedContent::where('uri', 'Main Menu')->pluck('id')->first();

        // Query the pages associated with the main menu
        $pages = \Page::with('manager')->whereHas('manager', function ($query) use ($mainMenuId) {
            $query->where('parent_id', $mainMenuId);
        })->get()->map(function ($page) {
            return [
                'name' => $page->name,
                'uri' => $page->manager->uri,
            ];
        });

        // Return the pages as a JSON response
        return response()->json($pages);
    }
}
