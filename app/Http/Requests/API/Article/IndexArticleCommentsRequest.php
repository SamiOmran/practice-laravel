<?php

namespace App\Http\Requests\API\Article;

use App\Http\Requests\PaginationIndexRequest;

class IndexArticleCommentsRequest extends PaginationIndexRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
