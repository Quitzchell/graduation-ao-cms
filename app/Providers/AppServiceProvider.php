<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register('AO\Module\ModuleServiceProvider');
        $this->app->register('AO\Component\ComponentServiceProvider');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->updatePHPIniFromConfig();

        Schema::defaultStringLength(191);
    }

    /**
     * Sets specific PHP ini parameters based on ENV values
     *
     * @return void
     */
    private function updatePHPIniFromConfig(): void
    {
        foreach (config('phpini', []) as $param => $value) {
            ini_set($param, $value);
        }
    }
}
