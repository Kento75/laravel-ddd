<?php

namespace Tests\Feature\app\Domain\Entities;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Carbon\Carbon;

use App\Domain\Entities\Task;
use App\Domain\Values\TaskStatus;

class TaskTest extends TestCase
{
    /**
     * @test
     */
    public function constructorTest()
    {
        // Arrange
        $taskName = 'タスク名';
        $dueDate = new Carbon('2021-02-22');

        // Act
        $task = new Task($taskName, $dueDate);

        // Assert
        // タスク名と期日が同じ値であること
        $this->assertEquals($taskName, $task->getName());
        $this->assertEquals($dueDate, $task->getDueDate());

        // 延期回数とステータスは初期状態として0回と未完了であること
        $this->assertEquals(0, $task->getPostponeCount());
        $this->assertEquals(TaskStatus::UNDONE(), $task->getTaskStatus());
    }

    /**
     * @test
     */
    public function postponeSucceed()
    {
        // Arrange
        $dueDate = new Carbon('2021-02-22');
        $task = new Task('testName', $dueDate);

        // Act
        $task->postpone();

        // Assert
        // 延長回数、期限共に1加算されていること。
        $this->assertEquals(1, $task->getPostponeCount());
        $this->assertEquals($dueDate->addDay(), $task->getDueDate());
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage 最大延期回数を超過しました。
     */
    public function postponeFailed()
    {
        // Arrange
        $dueDate = new Carbon('2021-02-22');
        $task = new Task('testName', $dueDate);

        // Act
        $task->postpone();
        $task->postpone();
        $task->postpone();

        // exception発生
        $task->postpone();

        // Assert
        // 延期回数が3から増えていないこと。
        $this->assertEquals(3, $task->getPostponeCount());
    }

    /**
     * @test
     */
    public function postponeComplete()
    {
        // Arrange
        $task = new Task('taskName', new Carbon('2021-02-11'));

        // Act
        $task->done();

        // Assert
        // タスクのステータスが完了になっていること。
        $this->assertEquals(TaskStatus::DONE(), $task->getTaskStatus());
    }
}
