<?php

namespace App\Http\Controllers\API;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Http\Requests\API\StoreTaskRequest;

class TaskController extends Controller
{
    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->validated());

        return TaskResource::make($task);
    }
}
