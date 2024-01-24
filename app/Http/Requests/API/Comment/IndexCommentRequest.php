<?php

namespace App\Http\Requests\API\Comment;

use App\Http\Requests\PaginationIndexRequest;

class IndexCommentRequest extends PaginationIndexRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
