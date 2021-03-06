<?php

namespace Tests\Feature\app\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Carbon\Carbon;
use Illuminate\Http\Request; // TODO: 専用のRequestを作成 TaskRequest or TaskCreateRequest
use Illuminate\Http\Response; // TODO: 専用のResponseを作成 TaskResponse or TaskCreateResponse

use App\UseCase\Task\TaskCreateUseCase;
use Tests\Feature\App\Domain\Task\Repositories\TaskMockRepository;

class TaskCreateUseCaseTest extends TestCase
{
    private $taskCreateUseCase;

    public function setUp(): void
    {
        parent::setUp();
        $this->taskCreateUseCase = new TaskCreateUseCase(new TaskMockRepository());
    }

    /**
     * @test
     */
    public function taskCreate()
    {
        // Arrange
        $taskName = "task111";
        $dueDate = '2021-03-10';
        $this->app->instance('TaskCreateUseCase', $this->taskCreateUseCase);

        // Act
        $responseData = $this->post('/api/task/create', ['task_name' => $taskName, 'due_date' => $dueDate]);

        // Assert
        $responseData->assertStatus(200);
        $responseData->assertJsonFragment(
            ['message' => '作成成功']
        );
    }
}
