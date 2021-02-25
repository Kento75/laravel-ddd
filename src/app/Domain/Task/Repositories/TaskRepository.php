<?php

namespace App\Domain\Task\Repositories;

use App\Domain\Task\Entities\Task;

interface TaskRepository
{
    public function save(Task $task);

    public function findById(string $taskId): Task;
}
