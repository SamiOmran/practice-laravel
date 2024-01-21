<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Article\{
    DestroyArticleRequest,
    IndexArticleRequest,
    ShowArticleRequest,
    StoreArticleRequest,
    UpdateArticleRequest,
};
use App\Http\Resources\API\Article\{
    ListArticlesResource,
    ShowArticleResource,
};
use App\Models\Article;
use App\Services\ArticleServices;
use Illuminate\Http\JsonResponse;

class ArticleController extends APIController
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexArticleRequest $request, ArticleServices $service): JsonResponse
    {
        $data = $service->getArticles($request->toDTO());

        return $this->sendResponse('Success retrieving articles', 200, ListArticlesResource::collection($data));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request, ArticleServices $service): JsonResponse
    {
        $article = $service->storeArticle($request->toDTO());

        return $this->sendResponse('Success storing new article', 201, new ShowArticleResource($article));
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowArticleRequest $request, Article $article, ArticleServices $service): JsonResponse
    {
        $article = $service->showArticle($article);

        return $this->sendResponse('Success retrieving article', 200, new ShowArticleResource($article));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article, ArticleServices $service): JsonResponse
    {
        $updated = $service->updateArticle($article, $request->toDTO());

        if ($updated) {
            return $this->sendResponse('Article updated successfully', 202, new ShowArticleResource($article));
        }

        return $this->sendFailure('Error occuered while updating article', 500);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestroyArticleRequest $request, Article $article, ArticleServices $service): JsonResponse
    {
        $destroyed = $service->destroyArticle($article);

        if ($destroyed) {
            return $this->sendResponse('Article deleted successfully', 200);
        }

        return $this->sendFailure('Error occuered while deleting article', 500);

    }
}
