<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Any route below this one won't reached because of the catch all statement.
Route::any('{all}', [\App\Http\Controllers\ContentController::class, 'getIndex'])
    ->where('all', '.*')
    ->name('content');
