<?php

namespace App\Http\Resources\API\Article;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ArticlesCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var \App\Models\Article */
        $article = $this;

        return [
            'title' => $article->title,
            'text' => $article->text,
        ];
    }
}
