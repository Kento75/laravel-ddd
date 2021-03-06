<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request; // TODO: 専用のRequestを作成 TaskRequest or TaskCreateRequest
use Illuminate\Http\Response; // TODO: 専用のResponseを作成 TaskResponse or TaskCreateResponse
use App\Http\Controllers\Controller;

use App\UseCase\Task\TaskCreateUseCase;

class TaskController extends Controller
{
    private $taskCreateUseCase;

    public function __construct(TaskCreateUseCase $taskCreateUseCase)
    {
        $this->taskCreateUseCase = $taskCreateUseCase;
    }

    public function taskCreate(Request $request)
    {
        $taskName = $request->input('task_name');
        $dueDate = new Carbon($request->input('due_date'));

        $createdTaskId = $this->taskCreateUseCase->createTask($taskName, $dueDate);

        return response()->json([
            'message'=> '作成成功',
            'task_id'=> $createdTaskId
          ]);
    }
}
