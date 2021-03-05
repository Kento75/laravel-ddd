<?php

namespace Tests\Feature\App\Domain\Task\Repositories;

use App\Domain\Task\Entities\Task;
use App\Domain\Task\Repositories\TaskRepository;

// UseCaseヘルパークラス
class TaskMockRepository implements TaskRepository
{
    private $data = [];

    public function findById(string $taskId): Task
    {
        return $this->data[$taskId];
    }

    public function save(Task $task)
    {
        $this->data[$task->getId()] = $task;
    }
}
