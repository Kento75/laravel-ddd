<?php

namespace Tests\Feature\app\UseCase\Task;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Carbon\Carbon;

use App\Domain\Task\Values\TaskStatus;
use App\UseCase\Task\TaskCreateUseCase;
use App\UseCase\Task\TaskPostponeUseCase;
use Tests\Feature\App\Domain\Task\Repositories\TaskMockRepository;

class TaskPostponeUseCaseTest extends TestCase
{
    private $taskRepository;
    private $taskPostponeUseCase;

    public function setUp(): void
    {
        parent::setUp();
        $this->taskRepository = new TaskMockRepository();
        $this->taskPostponeUseCase = new TaskPostponeUseCase($this->taskRepository);
    }

    /**
     * @test
     */
    public function postponeTask_success()
    {
        // Arrange
        $taskName = "task111";
        $dueDate = new Carbon('2021-03-10');
        $taskId = $this->prepareTask($taskName, $dueDate);

        // Act
        $this->taskPostponeUseCase->postponeTask($taskId);

        // Assert
        $updatedTask = $this->taskRepository->findById($taskId);
        // 期日が1日後になっていること
        $this->assertEquals($dueDate->addDay(), $updatedTask->getDueDate());
        // 延期回数が1増えていること
        $this->assertEquals(1, $updatedTask->getPostponeCount());
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage 最大延期回数を超過しました。
     */
    public function postponeTask_postpone4times()
    {
        // Arrange
        $taskName = "task111";
        $dueDate = new Carbon('2021-03-10');
        $taskId = $this->prepareTask($taskName, $dueDate);

        // Act
        $this->taskPostponeUseCase->postponeTask($taskId);
        $this->taskPostponeUseCase->postponeTask($taskId);
        $this->taskPostponeUseCase->postponeTask($taskId);
        $this->taskPostponeUseCase->postponeTask($taskId);
    }

    // テストヘルパー
    private function prepareTask($name, $dueDate)
    {
        $taskCreateUseCase = new TaskCreateUseCase($this->taskRepository);
        return $taskCreateUseCase->createTask($name, $dueDate);
    }
}
