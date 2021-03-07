<?php

namespace App\Infra\User\Repositories;

use App\Domain\User\Entities\User;
use App\domain\User\Repositories\UserRepository;

class UserRdbRepository implements UserRepository
{
    public function save(User $user): User
    {
        return null;
    }

    public function findById(string $userId)
    {
    }
}
