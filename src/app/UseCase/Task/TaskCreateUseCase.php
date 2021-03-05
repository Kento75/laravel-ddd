<?php

namespace App\UseCase\Task;

use App\domain\Task\Repositories\TaskRepository;
use App\Domain\Task\Entities\Task;

class TaskCreateUseCase
{
    private $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        if($taskRepository === null) {
            throw new \InvalidArgumentException;
        }

        $this->taskRepository = $taskRepository;
    }

    /**
     * タスクを作成する
     */
    public function createTask($name, $dueDate)
    {
        $task = new Task($name, $dueDate);
        $this->taskRepository->save($task);

        return $task->getId();
    }
}
