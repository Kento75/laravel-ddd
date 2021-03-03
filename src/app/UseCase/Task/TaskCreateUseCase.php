<?php

namespace App\UseCase\Task;

use App\domain\Task\Repositories\TaskRepository;

class TaskCreateUseCase
{
    private $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * タスクを作成する
     */
    public function createTask($name, $dueDate)
    {
        return null;
    }
}
