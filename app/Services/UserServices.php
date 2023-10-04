<?php

declare(strict_types=1);

namespace App\Services;

use App\DTOs\UserDTO;
use App\Models\User;

class UserServices
{
    public function storeUser(UserDTO $userDTO): User
    {
        return User::create($userDTO->toArray());
    }
}
