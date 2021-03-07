<?php

namespace Tests\Feature\app\Domain\User\Entities;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Carbon\Carbon;

use App\Domain\User\Entities\User;
use App\Domain\User\Values\UserStatus;

class UserTest extends TestCase
{
    /**
     * @test
     */
    public function constructorTest()
    {
        // Arrange
        $userName = "ユーザー名";

        // Act
        $user = new User($userName);

        // Assert
        $this->assertEquals($userName, $user->getName());
        $this->assertEquals(UserStatus::ACTIVE(), $user->getUserStatus());
    }

    /**
     * @test
     */
    public function deactivate()
    {
        // Arrange
        $userName = "ユーザー名";
        $user = new User($userName);

        // Act
        $user->deactivate();

        // Assert
        $this->assertEquals(UserStatus::INACTIVE(), $user->getUserStatus());
    }
}
