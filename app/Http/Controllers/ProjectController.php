<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $projects = Project::all();

        return view('projects.index',compact('projects'));
    }

    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('projects.create');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        Project::create([
            'project_name' => $request->project_name
        ]);

        return redirect()->route('projects.index');
    }

    public function show(Project $project)
    {
        //
    }

    public function edit(Project $project): \Illuminate\Http\Response
    {
        return view('projects.edit',compact('project'));
    }
    public function update(Request $request, Project $project): \Illuminate\Http\Response
    {
        $project->update([
            'project_name' => $request->project_name
        ]);

        return redirect()->route('projects.index');
    }

    public function destroy(Project $project): \Illuminate\Http\RedirectResponse
    {
        $project->delete();
        return redirect()->route('projects.index');
    }
}
