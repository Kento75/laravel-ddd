<?php

namespace Tests\Feature\App\UseCase\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Domain\User\Values\UserStatus;
use App\UseCase\User\UserCreateUseCase;
use App\UseCase\User\UserDeactivateUseCase;
use Tests\Feature\App\Domain\User\Repositories\UserMockRepository;

class UserDeactivateUseCaseTest extends TestCase
{
    private $userRepository;
    private $userDeactivateUseCase;

    public function setUp(): void
    {
        parent::setUp();
        $this->userRepository = new UserMockRepository();
        $this->userDeactivateUseCase = new UserDeactivateUseCase($this->userRepository);
    }

    /**
     * @test
     */
    public function createUser()
    {
        // Arrange
        $userName = 'user名';
        $createUserId = $this->prepareUser($userName);

        // Act
        $this->userDeactivateUseCase->deactivateUser($createUserId);

        // Assert
        $createdUser = $this->userRepository->findById($createUserId);
        $this->assertEquals(UserStatus::INACTIVE(), $createdUser->getUserStatus());
    }

    // テストヘルパー
    private function prepareUser($name)
    {
        $userCreateUseCase = new UserCreateUseCase($this->userRepository);
        return $userCreateUseCase->createUser($name);
    }
}
