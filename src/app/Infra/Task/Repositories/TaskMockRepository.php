<?php

namespace App\Infra\Task\Repositories;

use App\Domain\Task\Entities\Task;
use App\domain\Task\Repositories\TaskRepository;

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
