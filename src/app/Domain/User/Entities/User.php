<?php

namespace App\Domain\User\Entities;

use App\Domain\User\Values\UserStatus;
use Ramsey\Uuid\Uuid;

class User
{
    // TODO: 書き換えできないようなしくみを実装したい javaのfinal相当
    private $userId;
    private $name;
    private $userStatus;

    public function __construct(string $name)
    {
        $this->userId = Uuid::uuid4();
        $this->name = $name;
        $this->userStatus = UserStatus::ACTIVE();
    }

    public function deactive()
    {
        $this->userStatus = UserStatus::INACTIVE();
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getUserStatus()
    {
        return $this->userStatus;
    }
}
