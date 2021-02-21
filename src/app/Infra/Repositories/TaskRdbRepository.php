<?php

namespace App\Infra\Repositories;

use App\domain\Repositories\TaskRepository;

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
