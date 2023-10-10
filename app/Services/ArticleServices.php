<?php

declare(strict_types=1);

namespace App\Services;

use App\DTOs\UserDTO;
use App\Models\User;

class ArticleServices
{
    public function getArticles(UserDTO $userDTO): User
    {
        return User::create($userDTO->toArray());
    }
}
