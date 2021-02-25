<?php

namespace Tests\Feature\app\Domain\Repositories;

use App\Domain\Task\Entities\Task;
use App\Domain\Task\Repository\TaskRepository;

// UseCaseヘルパークラス TaskDB
class TaskMockRepository implements TaskRepository
{
    private $data = [];

    public function findById(string $taskId)
    {
        return $this->data[$taskId];
    }

    public function save(Task $task)
    {
        $data[$task.getTaskId()] = $task;
    }
}
