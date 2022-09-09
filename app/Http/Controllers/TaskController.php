<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(): Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $tasks = Task::with('project')->get();

        return view('tasks.index',compact('tasks'));
    }

    public function create()
    {
        $projects = Project::all();

        return view('tasks.create',compact('projects'));
    }

    public function store(StoreTaskRequest $request)
    {
        Task::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'project_id'=>$request->project_id
        ]);

        return redirect()->route('tasks.index');
    }

    public function show(Task $task)
    {
        //
    }

    public function edit(Task $task)
    {
        $projects = Project::all();

        return view('tasks.edit',compact('task','projects'));
    }

    public function update(Request $request, Task $task)
    {
        $task->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'project_id'=>$request->project_id
        ]);

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
