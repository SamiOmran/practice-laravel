<?php

declare(strict_types=1);

namespace App\Services;

use App\DTOs\CommentDTO;
use App\DTOs\PaginationDTO;
use App\Models\Comment;
use Illuminate\Pagination\LengthAwarePaginator;

class CommentServices
{
    public function getComments(PaginationDTO $paginationDTO): LengthAwarePaginator
    {
        $page = $paginationDTO->page;
        $pageSize = $paginationDTO->pageSize;

        return Comment::query()->paginate($pageSize, page: $page);
    }

    public function storeComment(CommentDTO $commentDTO): Comment
    {
        /** @var \App\Models\User */
        $author = auth()->user();
        $commentData = [...$commentDTO->toArray(), 'user_id' => $author->id];

        return Comment::create($commentData);
    }

    public function showComment(Comment $comment): Comment
    {
        return $comment;
    }

    public function updateComment(Comment $comment, CommentDTO $commentDTO): bool
    {
        return $comment->update($commentDTO->toArray());
    }

    public function destroyComment(Comment $comment): ?bool
    {
        return $comment->delete();
    }
}
