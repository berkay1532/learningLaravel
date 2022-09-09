<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Projects') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <a href="{{route('projects.create')}}">Add new project</a>
                <br /><br />
                <table>
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($projects as $project)
                        <tr>
                            <td>{{ $project->project_name }}</td>
                            <td>
                                <a href="{{route('projects.edit', $project)}}">Edit</a>
                            <form method="POST" action="{{route('projects.destroy', $project)}}">
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
