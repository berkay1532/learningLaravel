<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Tasks') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <a href="{{route('tasks.create')}}">Add new task</a>
                <br /><br />
                <table>
                    <thead>
                    <tr>
                        <th>Task name</th>
                        <th>Task description</th>
                        <th>Project Name</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->project->project_name }}</td>
                            <td>
                                <a href="{{route('tasks.edit', $task)}}">Edit</a>
                            <form method="POST" action="{{route('tasks.destroy', $task)}}">
                                @csrf
                                @method('DELETE')

                                <button type="submit" onclick="return confirm('Are You Sure?')">Delete</button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
