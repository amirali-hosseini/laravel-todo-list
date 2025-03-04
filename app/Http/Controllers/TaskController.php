<?php

namespace App\Http\Controllers;

use App\Models\{Task, Project};
use App\Http\Requests\{StoreTaskRequest, UpdateTaskRequest};

class TaskController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $project = Project::query()->find($request->project_id);

        $project->tasks()->create($request->validated());

        toast('تسک جدید ایجاد شد.', 'success');

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        toast('تسک موردنظر آپدیت شد.', 'success');

        return to_route('projects.tasks', $task->project->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        toast('تسک موردنظر حذف شد.', 'info');

        return back();
    }
}
