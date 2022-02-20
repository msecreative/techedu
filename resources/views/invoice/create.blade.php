<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add New Invoice') }}
            </h2>

            <a href="{{route('invoice.index')}}" class="rounded bg-sky-400 text-white px-3 py-1">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{route('invoice.search')}}" method="GET">@csrf
                        <div class="flex space-x-3 items-end justify-center">
                            <div>
                                @error('client_id')
                                <p class="text-red-600">{{$message}}</p>
                                @enderror
                                <label for="client_id" class="techedu-label">Select Client</label>
                                <select name="client_id" id="client_id" class="techedu-input">
                                    <option value="none">Select a Client</option>
                                    @foreach ($clients as $client)
                                        <option value="{{$client->id}}" {{$client->id == old('client_id') || $client->id == request('client_id') ? "selected" : ""}}>
                                            {{$client->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                @error('status')
                                <p class="text-red-600">{{$message}}</p>
                                @enderror
                                <label for="status" class="techedu-label">Select Status</label>
                                <select name="status" id="status" class="techedu-input">
                                    <option value="none">Select Status</option>
                                    <option value="pending" {{old('status') == 'pending' || request('status') == 'pending' ? "selected" : ""}}>Pending</option>
                                    <option value="complete" {{old('status') == 'complete' || request('status') == 'complete' ? "selected" : ""}}>Complete</option>
                                </select>

                            </div>
                            <div>
                                <label for="fromDate" class="techedu-label">Start Date</label>
                                <input type="date" class="techedu-input" id="fromDate" name="fromDate" max="{{now()->format('Y-m-d')}}" value="{{request('fromDate')}}">
                                @error('fromDate')
                                <p class="text-red-600">{{$message}}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="endDate" class="techedu-label">End Date</label>
                                <input type="date" class="techedu-input" id="endDate" name="endDate" value="{{now()->format('Y-m-d')}}" max="{{now()->format('Y-m-d')}}" value="{{request('endDate') !='' ? request('endDate') : now()->format('Y-m-d')}}">
                                @error('endDate')
                                <p class="text-red-600">{{$message}}</p>
                                @enderror
                            </div>
                            <div>
                                <button type="submit" class="text-white bg-sky-500 px-4 py-2 rounded">Search</button>
                            </div>
                        </div>
                    </form>

                    @if ($tasks)
                    <table class="w-full border-collapse mt-12">
                        <thead>
                            <tr>
                                <th class="border py-3">Task No</th>
                                <th class="border py-3">Task Name</th>
                                <th class="border py-3">Status</th>
                                <th class="border py-3">Price</th>
                            </tr>

                            @foreach ($tasks as $task)
                            <tr>
                                <td class="border py-2 text-center px-4">{{$task->id}}</td>
                                <td class="border py-2 text-center px-4">{{$task->name}}</td>
                                <td class="border py-2 text-center px-4">{{$task->status}}</td>
                                <td class="border py-2 text-center px-4">{{$task->price}}</td>
                            </tr>
                            @endforeach
                        </thead>
                        <tbody>
                    </table>

                    <div class="py-5 text-right text-white">
                        <a href="{{route('invoice.preview')}}{{'?client_id=' .request('client_id') . 'status=' . request('status') . '&fromDate=' . request('fromDate') . 'endDate=' . request('endDate')}}" class="bg-sky-500 px-4 py-2" target="_blank">Preview</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
