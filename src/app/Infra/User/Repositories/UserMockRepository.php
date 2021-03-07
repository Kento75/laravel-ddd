<?php

namespace App\Infra\User\Repositories;

use App\Domain\User\Entities\User;
use App\domain\User\Repositories\UserRepository;

class UserMockRepository implements UserRepository
{
    private $data = [];

    public function findById(string $userId): User
    {
        return $this->data[$userId];
    }

    public function save(User $user)
    {
        $this->data[$user->getUserId()] = $user;
    }
}
