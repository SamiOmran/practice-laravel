<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Comment\{
    DestroyCommentRequest,
    IndexCommentRequest,
    ShowCommentRequest,
    StoreCommentRequest,
    UpdateCommentRequest,
};
use App\Http\Resources\API\Comment\{
    ListCommentsResource,
    ShowCommentResource,
};
use App\Models\Comment;
use App\Services\CommentServices;
use Illuminate\Http\JsonResponse;

class CommentController extends APIController
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexCommentRequest $request, CommentServices $service): JsonResponse
    {
        $data = $service->getComments($request->toDTO());

        return $this->sendResponse('Success retrieving comments', 200, ListCommentsResource::collection($data));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request, CommentServices $service): JsonResponse
    {
        $comment = $service->storeComment($request->toDTO());

        return $this->sendResponse('Success storing new comment', 201, new ShowCommentResource($comment));
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowCommentRequest $request, Comment $comment, CommentServices $service): JsonResponse
    {
        $comment = $service->showComment($comment);

        return $this->sendResponse('Success retrieving comment', 200, new ShowCommentResource($comment));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment, CommentServices $service): JsonResponse
    {
        $updated = $service->updateComment($comment, $request->toDTO());

        if ($updated) {
            return $this->sendResponse('Comment updated successfully', 202, new ShowCommentResource($comment));
        }

        return $this->sendFailure('Error occuered while updating comment', 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestroyCommentRequest $request, Comment $comment, CommentServices $service): JsonResponse
    {
        $destroyed = $service->destroyComment($comment);

        if ($destroyed) {
            return $this->sendResponse('Comment deleted successfully', 200);
        }

        return $this->sendFailure('Error occuered while deleting comment', 500);
    }
}
