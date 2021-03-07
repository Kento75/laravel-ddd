<?php

namespace App\UseCase\User;

use App\Domain\User\Repositories\UserRepository;
use App\Domain\User\Entities\User;

class UserDeactivateUseCase
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
    public function deactivateUser($userId)
    {
        $user = $this->userRepository->findById($userId);
        $user->deactivate();
        $this->userRepository->save($user);
    }
}
