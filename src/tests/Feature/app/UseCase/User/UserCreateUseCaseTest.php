<?php

namespace Tests\Feature\App\UseCase\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Domain\User\Values\UserStatus;
use App\UseCase\User\UserCreateUseCase;
use Tests\Feature\App\Domain\User\Repositories\UserMockRepository;

class UserCreateUseCaseTest extends TestCase
{
    private $userRepository;
    private $userCreateUseCase;

    public function setUp(): void
    {
        parent::setUp();
        $this->userRepository = new UserMockRepository();
        $this->userCreateUseCase = new UserCreateUseCase($this->userRepository);
    }

    /**
     * @test
     */
    public function createUser()
    {
        // Arrange
        $userName = 'user名';

        // Act
        $createUserId = $this->userCreateUseCase->createUser($userName);

        // Assert
        $createdUser = $this->userRepository->findById($createUserId);
        $this->assertEquals($userName, $createdUser->getName());
        $this->assertEquals(UserStatus::ACTIVE(), $createdUser->getUserStatus());
    }
}
