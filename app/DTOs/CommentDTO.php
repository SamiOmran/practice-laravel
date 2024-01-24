<?php

declare(strict_types=1);

namespace App\DTOs;

use Spatie\LaravelData\{
    Data,
    Optional,
};

class CommentDTO extends Data
{
    public function __construct(
        public readonly string|Optional $text,
        public readonly string|Optional $article_id,
        public readonly string|Optional $userId,
    ) {
        //
    }
}
