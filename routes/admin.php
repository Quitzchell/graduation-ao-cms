<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where the cms/admin routes are registered. Routes are loaded by the
| RouteServiceProvider within a group which contains the "web" middleware
| group and are prefixed with admin. Now create something great!
|
*/

if (!function_exists('createRoutesForMenuItem')) {
    function createRoutesForMenuItem(array $menuItem)
    {
        if (array_key_exists('href', $menuItem)) {
            ObjectManagerRoutes($menuItem);

            if ($menuItem['href'] === 'content') {
                contentManagerRoutes($menuItem);
            } elseif ($menuItem['href'] === 'settings') {
                $controller = $menuItem['controller'] ?? studly_case($menuItem['href']) . 'Controller';
                $controller = 'App\\Http\\Controllers\\' . $controller;
                Route::post("/{$menuItem['href']}", [$controller, 'postIndex']);
            }
        }
    }
}

if (!function_exists('contentManagerRoutes')) {
    function contentManagerRoutes(array $menuItem)
    {
        Route::group(['prefix' => $menuItem['href']], function () use ($menuItem) {
            $controller = $menuItem['controller'] ?? studly_case($menuItem['href']) . 'Controller';
            $controller = 'App\\Http\\Controllers\\' . $controller;
            Route::post("/update", [$controller, 'postUpdate']);
            Route::get("/lock", [$controller, 'getLock']);
            Route::get("/copy", [$controller, 'getCopy']);
            Route::get("/edit-child/{id}/{child}", [$controller, 'getEditChild']);
            Route::post("/edit-child/{id}/{child}", [$controller, 'postEditChild']);
        });
        /* ContentManager routes */
    }
}

if (!function_exists('ObjectManagerRoutes')) {
    function ObjectManagerRoutes(array $menuItem)
    {
        Route::group(['prefix' => $menuItem['href']], function () use ($menuItem) {
            $controller = $menuItem['controller'] ?? studly_case($menuItem['href']) . 'Controller';
            $controller = 'App\\Http\\Controllers\\' . $controller;
            /* ObjectManager routes */
            Route::get("", [$controller, 'getIndex']);
            Route::get("/overview", [$controller, 'getOverview']);
            Route::get("/sortable-overview", [$controller, 'SortableOver']);
            Route::get("/view/{id}", [$controller, 'getView']);
            Route::get("/add", [$controller, 'getAdd']);
            Route::post("/add", [$controller, 'postAdd']);
            Route::get("/edit/{id}", [$controller, 'getEdit']);
            Route::post("/edit/{id}/{view?}", [$controller, 'postEdit']);
            Route::get("/lock/{id}", [$controller, 'getLock']);
            Route::get("/delete/{id}", [$controller, 'getDelete']);
            Route::post("/delete", [$controller, 'postDelete']);
            Route::get("/new-relation/{id}/{call}", [$controller, 'getNewRelation']);
            Route::post("/new-relation/{id}/{call}", [$controller, 'postNewRelation']);
            Route::get("/toggle-relation/{id}/{call}", [$controller, 'getToggleRelation']);
            Route::get("/edit-relations/{id}/{call}", [$controller, '@etEditRelations']);
            Route::get("/edit-relations-items/{modelId}/{call}", [$controller, 'getEditRelationsItems']);
            Route::post("/order", [$controller, 'postOrder']);
            Route::post("/toggle-property/{id}/{property}", [$controller, 'postToggleProperty']);
            Route::get("/overview-items", [$controller, 'getOverviewItems']);
            Route::get("/export-excel/{list?}", [$controller, 'getExportExcel']);
        });
    }
}

Route::group(['middleware' => 'auth'], function () {
    // Admin menu items
    foreach (config('component-skins.menu') as $menuItem) {
        if (array_key_exists('href', $menuItem) && !array_key_exists('sub_menus', $menuItem)) {
            createRoutesForMenuItem($menuItem);
        } elseif (array_key_exists('sub_menus', $menuItem)) {
            foreach ($menuItem['sub_menus'] as $submenuItem) {
                createRoutesForMenuItem($submenuItem);
            }
        }
    }
});

// Login
Route::group(['prefix' => 'login'], function () {
    $controller = \AO\Component\Http\Controllers\LoginController::class;

    Route::group(['middleware' => 'auth'], function () use ($controller) {
        Route::get('/choose-password/{token?}', [$controller, 'getChoosePassword']);
        Route::get('/choose-password-box/{token?}', [$controller, 'getChoosePasswordBox']);
        Route::get('/logout', [$controller, 'getLogout']);
    });

    Route::get('', [$controller, 'getIndex'])->name('login');
    Route::get('/box', [$controller, 'getBox']);
    Route::post('/process', [$controller, 'postProcess']);
    Route::post('/register', [$controller, 'postRegister']);
    Route::get('/forgot-password', [$controller, 'getForgotPassword']);
    Route::get('/forgot-box', [$controller, 'getForgotBox']);
    Route::get('/reset-box/{token?}', [$controller, 'getResetBox']);
    Route::get('/reset/{token?}', [$controller, 'getReset'])->name('password.reset');
});

Route::group(['prefix' => 'password'], function () {
    $controller = \App\Http\Controllers\RemindersController::class;
    Route::post('/remind', [$controller, 'postRemind']);
    Route::post('/reset', [$controller, 'postReset']);
});

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'getIndex']);
Route::get('', [\AO\Component\Http\Controllers\LoginController::class, 'getIndex']);
