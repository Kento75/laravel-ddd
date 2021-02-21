<?php

namespace App\UseCase;

use App\Infra\Repositories\TaskRdbRepository;

class TaskCreateUseCase
{
    private $taskRdbRepository;

    public function __construct(TaskRdbRepository $taskRdbRepository)
    {
        $this->taskRdbRepository = $taskRdbRepository;
    }

    /**
     * タスクを作成する
     */
    public function createTask($name, $dueDate)
    {
        return null;
    }
}
