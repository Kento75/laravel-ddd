<?php

namespace App\Infra\Task\Repositories;

use App\Domain\Task\Entities\Task;
use App\domain\Task\Repositories\TaskRepository;

class TaskRdbRepository implements TaskRepository
{
    public function save(Task $task): Task
    {
        return null;
    }

    public function findById(string $taskId)
    {
    }
}
