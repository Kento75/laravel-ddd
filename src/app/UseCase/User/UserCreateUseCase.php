<?php

namespace App\UseCase\User;

use App\Domain\User\Repositories\UserRepository;
use App\Domain\User\Entities\User;

class UserCreateUseCase
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        if ($userRepository === null) {
            throw new \InvalidArgumentException;
        }

        $this->userRepository = $userRepository;
    }

    /**
     * ユーザーを作成する
     */
    public function createUser($userName)
    {
        $user = new User($userName);
        $this->userRepository->save($user);

        return $user->getUserId();
    }
}
