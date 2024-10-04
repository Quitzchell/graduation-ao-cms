<?php

use App\Actions\Person\FetchPersonAction;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('fetch-person/{uuid}', FetchPersonAction::class);

Route::any('{all}', [\App\Http\Controllers\ContentController::class, 'getIndex'])
    ->where('all', '.*')
    ->name('content');
