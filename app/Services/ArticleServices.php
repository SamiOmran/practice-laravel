<?php

declare(strict_types=1);

namespace App\Services;

use App\DTOs\{
    ArticleDTO,
    PaginationDTO,
};
use App\Models\{
    Article,
    User,
};
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleServices
{
    public function getArticles(PaginationDTO $paginationDTO, User $user = null): LengthAwarePaginator
    {
        if ($user) {
            $query = $user->articles();
        } else {
            $query = Article::query();
        }

        $page = $paginationDTO->page;
        $pageSize = $paginationDTO->pageSize;

        return $query->paginate(perPage: $pageSize, page: $page);
    }

    public function storeArticle(ArticleDTO $articleDTO): Article
    {
        /** @var \App\Models\User */
        $author = auth()->user();
        $author->update(['articles_count' => $author->articles_count + 1]);
        $articleData = [...$articleDTO->toArray(), 'author' => $author->id];

        return Article::create($articleData);
    }

    public function showArticle(Article $article): Article
    {
        return $article;
    }

    public function updateArticle(Article $article, ArticleDTO $articleDTO): bool
    {
        return $article->update($articleDTO->toArray());
    }

    public function destroyArticle(Article $article): ?bool
    {
        return $article->delete();
    }
}
