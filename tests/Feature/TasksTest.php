<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TasksTest extends TestCase
{

    use RefreshDatabase;

    public function test_tasks_page_contains_just_data_fields()
    {


        $response = $this->get('/tasks');
        $response->assertSee('Task name');
        $response->assertSee('Task description');
        $response->assertSee('Project Name');

    }
    public function test_tasks_page_contains_data_fields_with_datas()
    {
        $project = Project::create([
            'project_name'=>'Project name'
        ]);
        $task = Task::create([
            'name'=>'Task-1',
            'description'=>'description of task1',
            'project_id'=>$project->id
        ]);

        $response = $this->get('/tasks');
        $response->assertSee('Add new task');
        $response->assertSee('Task name');
        $response->assertSee('Task description');
        $response->assertSee('Project Name');
        $view_tasks = $response->viewData('tasks');
        $this->assertEquals($task->name,$view_tasks->first()->name);
        $this->assertEquals($task->description,$view_tasks->first()->description);
        $this->assertEquals($task->project->project_name,$view_tasks->first()->project->project_name);
    }
    public function test_projects_page_contains_data_fields_with_datas()
    {
        $project = Project::create([
            'project_name'=>'Project name'
        ]);

        $response = $this->get('/projects');
        $response->assertSee('Name');
        $response->assertSee('Add new project');

        $view_projects = $response->viewData('projects');
        $this->assertEquals($project->project_name,$view_projects->first()->project_name);
    }

}
