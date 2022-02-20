<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Client') }}
            </h2>

            <a href="{{route('client.create')}}" class="rounded bg-sky-400 text-white px-3 py-1">Add New Client</a>
        </div>
    </x-slot>

    @include('layouts.messages')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <table class="w-full border-collapse">
                        <thead>
                            <tr>
                                <th class="border py-3 w-32">ID</th>
                                <th class="border py-3 w-32">Thumbnail</th>
                                <th class="border py-3">Name</th>
                                <th class="border py-3">Username</th>
                                <th class="border py-3">Phone</th>
                                <th class="border py-3">Country</th>
                                <th class="border py-3">Total Task</th>
                                <th class="border py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                                function getImgUrl($img){
                                    if (str_starts_with($img, 'http')) {
                                       return $img;
                                    }
                                    return asset('storage/uploads') .'/'. $img;
                                }
                            @endphp

                            @foreach ($clients as $client)
                            <tr>
                                <td class="border py-2 text-center">{{$client->id}}</td>
                                <td class="border py-2 w-32 text-center"><img class="rounded-md w-20 mx-auto" src="{{ getImgUrl($client->thumbnail) }}" alt=""></td>
                                <td class="border py-2 text-center">{{$client->name}}</td>
                                <td class="border py-2 text-center">{{$client->username}}</td>
                                <td class="border py-2 text-center">{{$client->phone}}</td>
                                <td class="border py-2 text-center">{{$client->country}}</td>
                                <td class="border py-2 text-center"><a class="inline-block bg-pink-600 text-white rounded-full w-6" href="{{route('searchTaskByClient', $client)}}">{{count($client->tasks)}}</a></td>
                                <td class="border py-2 text-center">
                                    <div class="flex justify-center gap-3">
                                        <a class="text-white bg-green-600 px-3 py-1 rounded" href="{{route('client.edit', $client->id)}}">Edit</a> ||
                                        <form onsubmit="return confirm('Do you want to delete this client!')" action="{{route('client.destroy', $client->id)}}" method="POST">@csrf @method('DELETE')
                                            <button type="submit" class="text-white bg-red-600 px-3 py-1 rounded" href="">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                   </table>
                   <div class="mt-6">
                       {{$clients->links();}}
                   </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
