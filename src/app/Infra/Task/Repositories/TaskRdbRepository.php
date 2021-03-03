<?php

namespace App\Infra\Task\Repositories;

use App\domain\Task\Repositories\TaskRepository;

class TaskRdbRepository implements TaskRepository
{
    public function save(Task $task): Task
    {
        return null;
    }

    public function findById(int $taskId): Task
    {
        return null;
    }
}
