<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Task;

interface TaskRepository
{
    public function save(Task $task): Task;

    public function findById(int $taskId): Task;
}
