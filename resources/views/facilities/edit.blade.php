<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Fasilitas
        </h2>
    </x-slot>

    <div class="md:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('facilities.update', $facility) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="mb-4">
                            <label for="name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Nama
                                Fasilitas</label>
                            <input type="text" name="name" id="name"
                                value="{{ old('name', $facility->name) }}"
                                class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm dark:bg-gray-700 dark:text-white"
                                required autofocus>
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Deskripsi</label>
                            <textarea name="description" id="description"
                                class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm dark:bg-gray-700 dark:text-white" required>{{ old('description', $facility->description) }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div class="mb-4">
                            <label for="image"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Gambar</label>
                            <input type="file" name="image" id="image"
                                class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm dark:bg-gray-700 dark:text-white">
                            <p class="text-gray-500 text-xs mt-1">Gambar Saat Ini: <img
                                    src="{{ route('facilities.image.show', $facility) }}" alt="{{ $facility->name }}"
                                    class="w-16 h-16 md:w-24 md:h-24 object-cover"></p>
                            @error('image')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:shadow-outline">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
