<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add New Task') }}
            </h2>

            <a href="{{route('task.index')}}" class="rounded bg-sky-400 text-white px-3 py-1">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ( count( $clients) == 0 )
                        <div class="text-white bg-orange-500 text-center py-3 rounded-md text-xs font-medium">
                            <p>You have to define any client</p>
                            <p>You don't have any client </p>
                            <a href="{{route('client.create')}}" class="inline-block bg-sky-400 text-xs mt-2 px-3 py-1 rounded-md">Add new client</a>
                        </div>
                    @endif
                    <form action="{{route('task.store')}}" method="POST" enctype="multipart/form-data">@csrf
                        <div class="mt-6 flex justify-between gap-4">
                            <div class="mt-6 flex-1">
                                <label for="name" class="techedu-label">Name</label>
                                <input type="text" name="name" id="name" value="{{old('name')}}" class="techedu-input">

                                @error('name')
                                    <p class="text-red-600">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-between gap-4">
                            <div class="mt-6 flex-1">
                                <label for="price" class="techedu-label">Price</label>
                                <input type="number" name="price" value="{{old('price')}}" id="price" class="techedu-input">
                                @error('price')
                                    <p class="text-red-600">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mt-6 flex-1">
                                <label for="client_id" class="techedu-label">Client Name</label>
                                <select name="client_id" id="client_id" class="techedu-input">
                                    <option value="none">Select a Client</option>
                                    @foreach ($clients as $client )
                                    <option value="{{$client->id}}" {{$client->id == old('client_id') ? 'selected' : ''}}>{{$client->name}}</option>
                                    @endforeach

                                </select>
                                @error('client_id')
                                    <p class="text-red-600">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex justify-between gap-4">
                            <div class="mt-6 flex-1">
                                <label for="description" class="techedu-label">description</label>
                                <textarea type="text" rows="8" name="description" id="description" class="techedu-input">{{old('description')}}</textarea>
                                @error('description')
                                    <p class="text-red-600">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-6">
                            <button class="rounded bg-sky-400 uppercase text-white px-6 py-2">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
