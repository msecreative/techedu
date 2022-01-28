<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add New Client') }}
            </h2>

            <a href="{{route('client.index')}}" class="rounded bg-sky-400 text-white px-3 py-1">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="#" method="POST" enctype="multipart/form-data">@csrf
                        <div class="mt-6 flex justify-between gap-4">
                            <div class="mt-6 flex-1">
                                <label for="name" class="techedu-label">Name</label>
                                <input type="text" name="name" id="name" class="techedu-input">
                            </div>

                            <div class="mt-6 flex-1">
                                <label for="username" class="techedu-label">Username</label>
                                <input type="text" name="username" id="username" class="techedu-input">
                            </div>
                        </div>

                        <div class="flex justify-between gap-4">
                            <div class="mt-6 flex-1">
                                <label for="email" class="techedu-label">Email</label>
                                <input type="text" name="email" id="email" class="techedu-input">
                            </div>
                            <div class="mt-6 flex-1">
                                <label for="phone" class="techedu-label">Phone</label>
                                <input type="text" name="phone" id="phone" class="techedu-input">
                            </div>
                        </div>
                        <div class="flex justify-between gap-4">
                            <div class="mt-6 flex-1">
                                <label for="country" class="techedu-label">Country</label>
                                <input type="text" name="country" id="country" class="techedu-input">
                            </div>
                            <div class="mt-6 flex-1">
                                <label for="status" class="techedu-label">Status</label>
                                <select name="status" id="status" class="techedu-input">
                                    <option value="">Select Status</option>
                                    <option value="" selected>Active</option>
                                    <option value="">Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-6">
                            <label for="thumbnail" class="techedu-label">Thumbnail</label>
                            <input type="file" name="thumbnail" id="thumbnail" class="techedu-input">
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
