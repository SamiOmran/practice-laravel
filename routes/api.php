<?php

use App\Http\Controllers\API\{
    ArticleController,
    UserController,
    WeatherController,
    CommentController,
};
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
    Route::apiResource('comments', CommentController::class);

    Route::group(['prefix' => 'users/{user}/'], function() {
        Route::get('articles-count', [UserController::class, 'numberArticles']);
        Route::get('articles', [UserController::class, 'listArticles']);
    });

    Route::apiResource('articles', ArticleController::class)->except('index');
});

Route::get('v1/articles', [ArticleController::class, 'index'])->name('articles.index');
