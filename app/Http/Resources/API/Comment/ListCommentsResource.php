<?php

namespace App\Http\Resources\API\Comment;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class ListCommentsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var \App\Models\Comment */
        $comment = $this;

        return [
            'id' => $comment->id,
            'text' => Str::limit($comment->text),
            'article_id' => $comment->article_id
        ];
    }
}
