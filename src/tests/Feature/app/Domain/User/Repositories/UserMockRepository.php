<?php

namespace Tests\Feature\App\Domain\User\Repositories;

use App\Domain\User\Entities\User;
use App\Domain\User\Repositories\UserRepository;

// UseCaseヘルパークラス
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
