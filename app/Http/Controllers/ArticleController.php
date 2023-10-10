<?php

namespace App\Http\Controllers;

use App\Http\Requests\API\Article\IndexArticlesRequest;
use App\Models\Article;
use App\Services\ArticleServices;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexArticlesRequest $request, ArticleServices $service): JsonResource
    {
        $data = $service->getArticles();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
