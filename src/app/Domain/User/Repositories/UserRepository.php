<?php

namespace App\Domain\User\Repositories;

use App\Domain\User\Entities\User;

interface UserRepository
{
    public function save(User $user);

    public function findById(string $userId): User;
}
