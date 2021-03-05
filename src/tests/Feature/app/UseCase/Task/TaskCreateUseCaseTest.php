<?php

namespace Tests\Feature\app\UseCase\Task;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Carbon\Carbon;

use App\Domain\Task\Values\TaskStatus;
use App\UseCase\User\UserCreateUseCase;
use App\UseCase\Task\TaskCreateUseCase;
use Tests\Feature\App\Domain\User\Repositories\UserMockRepository;
use Tests\Feature\App\Domain\Task\Repositories\TaskMockRepository;

class TaskCreateUseCaseTest extends TestCase
{
    private $userRepository;
    private $taskRepository;
    private $userCreateUseCase;
    private $taskCreateUseCase;

    public function setUp(): void
    {
        parent::setUp();
        $this->userRepository = new UserMockRepository();
        $this->taskRepository = new TaskMockRepository();
        $this->userCreateUseCase = new UserCreateUseCase($this->userRepository);
        $this->taskCreateUseCase = new TaskCreateUseCase($this->taskRepository);
    }

    /**
     * @test
     */
    public function createTask()
    {
        // Arrange
        $taskName = "task111";
        $dueDate = new Carbon('2021-03-10');
        $createdTaskId = $this->taskCreateUseCase->createTask($taskName, $dueDate);

        // Act
        $createdTask = $this->taskRepository->findById($createdTaskId);

        // Assert
        $this->assertEquals($taskName, $createdTask->getName());
        $this->assertEquals($dueDate, $createdTask->getDueDate());
        $this->assertEquals(TaskStatus::UNDONE(), $createdTask->getTaskStatus());
        $this->assertEquals(0, $createdTask->getPostponeCount());
    }
}
