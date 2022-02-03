<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Task') }}
            </h2>

            <a href="{{route('task.create')}}" class="rounded bg-sky-400 text-white px-3 py-1">Add New Task</a>
        </div>
    </x-slot>
    @if (Session('success'))
        <div class="text-center bg-green-300 text-white py-2 mt-12" id="stMsg">
            <p>{{Session('success')}}</p>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <table class="w-full border-collapse">
                        <thead>
                            <tr>
                                <th class="border py-3">ID</th>
                                <th class="border py-3">Name</th>
                                <th class="border py-3">Price</th>
                                <th class="border py-3">Client</th>
                                <th class="border py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($tasks as $task)
                            <tr>
                                <td class="border py-2 text-center px-4">{{$task->id}}</td>
                                <td class="border py-2 text-left px-4">{{$task->name}}</td>
                                <td class="border py-2 text-center">{{$task->price}}</td>
                                <td class="border py-2 text-center">{{$task->client->username}}</td>
                                <td class="border py-2 text-center">
                                    <div class="flex justify-center gap-3">
                                        <a class="text-white bg-green-600 px-3 py-1 rounded" href="{{route('task.edit', $task->id)}}">Edit</a> ||
                                        <form onsubmit="return confirm('Do you want to delete this client!')" action="{{route('task.destroy', $task->id)}}" method="POST">@csrf @method('DELETE')
                                            <button type="submit" class="text-white bg-red-600 px-3 py-1 rounded" href="">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                   </table>
                   <div class="mt-6">
                       {{$tasks->links();}}
                   </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
