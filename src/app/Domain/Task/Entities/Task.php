<?php

namespace App\Domain\Task\Entities;

use App\Domain\Task\Values\TaskStatus;
use Ramsey\Uuid\Uuid;

class Task
{
    private $id;
    private $taskStatus;
    private $name;
    private $dueDate;
    private $postponeCount;

    const POSTPONE_MAX_COUNT = 3;

    public function __construct($name, $dueDate)
    {
        if ($name === null | $dueDate === null) {
            throw new \InvalidArgumentException;
        }

        $this->id = Uuid::uuid4()->toString();
        $this->taskStatus = TaskStatus::UNDONE();
        $this->name = $name;
        $this->dueDate = $dueDate;
        $this->postponeCount = 0;
    }

    public function postpone()
    {
        if ($this->postponeCount >= self::POSTPONE_MAX_COUNT) {
            throw new \InvalidArgumentException('最大延期回数を超過しました。');
        }

        $this->dueDate->addDay();
        $this->postponeCount++;
    }

    public function done()
    {
        $this->taskStatus = TaskStatus::DONE();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTaskStatus()
    {
        return $this->taskStatus;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDueDate()
    {
        return $this->dueDate;
    }

    public function getPostponeCount()
    {
        return $this->postponeCount;
    }
}
