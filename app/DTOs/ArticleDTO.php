<?php

declare(strict_types=1);

namespace App\DTOs;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ArticleDTO extends Data
{
    public function __construct(
        public readonly string|Optional $title,
        public readonly string|Optional $text,
        public readonly string|Optional $image,
    ) {
        //
    }
}
