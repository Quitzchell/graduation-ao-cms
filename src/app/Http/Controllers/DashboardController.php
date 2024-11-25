<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function getIndex(): \Illuminate\Http\RedirectResponse
    {
        return redirect(config('component-skins.prefix').'content');
    }
}
