<?php

namespace App\UseCase\Task;

use App\domain\Task\Repositories\TaskRepository;

class TaskPostponeUseCase
{
    private $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        if ($taskRepository === null) {
            throw new \InvalidArgumentException;
        }

        $this->taskRepository = $taskRepository;
    }

    /**
     * タスクステータスを完了にする
     */
    public function postponeTask(string $taskId)
    {
        try {
            $task = $this->taskRepository->findById($taskId);
            $task->postpone();
            $this->taskRepository->save($task);
        } catch (\Exception $e) {
            throw new $e($e->getMessage());
        }
    }
}
