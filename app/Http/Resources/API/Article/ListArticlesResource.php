<?php

namespace App\Http\Resources\API\Article;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ListArticlesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var \App\Models\Article */
        $article = $this;

        return [
            'id' => $article->id,
            'title' => $article->title,
            'author' => $article->author
        ];
    }
}
