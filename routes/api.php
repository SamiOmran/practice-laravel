<?php

use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\WeatherController;
use Illuminate\Http\Request;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'middleware' => 'auth'], function () {
    Route::get('get-weather', [WeatherController::class, 'index']);

    Route::apiResource('users', UserController::class);

    Route::apiResource('articles', ArticleController::class)->except('index');
});

Route::get('v1/articles', [ArticleController::class, 'index'])->name('articles.index');
