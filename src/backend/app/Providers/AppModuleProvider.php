<?php

namespace App\Providers;

use AO\Module\Providers\DefaultModuleProvider;

class AppModuleProvider extends DefaultModuleProvider
{
    public const MODULES_NAMESPACE = 'App\Modules';

    protected function getModulesDir()
    {
        return app_path('Modules');
    }
}
