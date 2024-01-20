<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Inertia\Inertia;
use App\Http\Resources\TaskResource;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\StoreTaskRequest;

class TaskController extends Controller
{
    public function index()
    {
        return Inertia::render('Tasks/Index', [
            'tasks' => TaskResource::collection(Task::all()),
        ]);
    }

    public function store(StoreTaskRequest $request)
    {
        $response = Http::post(
            config('app.url') . '/api/tasks',
            $request->validated()
        );

        $statusMessage = $response->successful()
            ? 'Task created Successfully.'
            : 'An Error Occurred while creating the Task, Please try again.';

        return redirect()->route('tasks.index')
            ->with('message', $statusMessage);
    }
}
