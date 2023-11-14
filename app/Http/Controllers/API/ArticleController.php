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
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleController extends APIController
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexArticleRequest $request, ArticleServices $service): JsonResource
    {
        $data = $service->getArticles($request->toDTO());

        return ListArticlesResource::collection($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request, ArticleServices $service): JsonResource
    {
        $article = $service->storeArticle($request->toDTO());

        $data = [
            'message' => 'Article created successfully',
            'status' => 201,
            'body' => $article,
        ];

        return new ShowArticleResource($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowArticleRequest $request, Article $article, ArticleServices $service): JsonResource
    {
        $article = $service->showArticle($article);

        return new ShowArticleResource($article);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article, ArticleServices $service): JsonResource
    {
        $updated = $service->updateArticle($article, $request->toDTO());

        if ($updated) {
            return response()->json([
                'message' => 'Article updated successfully',
                'status' => '200',
            ]);
        }

        return response()->json([
            'message' => 'Error occuered while updating article',
            'status' => '500',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestroyArticleRequest $request, Article $article, ArticleServices $service): JsonResource
    {
        $destroyed = $service->destroyArticle($article);

        if ($destroyed) {
            return response()->json([
                'message' => 'Article deleted successfully',
                'status' => '200',
            ]);
        }

        return response()->json([
            'message' => 'Error occuered while deleting article',
            'status' => '500',
        ]);
    }
}
