<?php

namespace Tests\Feature\app\Domain\Repositories;

use App\Domain\User\Entities\User;
use App\Domain\User\Repository\UserRepository;

// UseCaseヘルパークラス
class UserMockRepository implements UserRepository
{
    private $data = [];

    public function findById(string $userId)
    {
        return $this->data[$userId];
    }

    public function save(User $user)
    {
        $data[$user.getUserId()] = $user;
    }
}
