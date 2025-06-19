<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Fasilitas
        </h2>
    </x-slot>

    <div class="md:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('facilities.update', $facility) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-6">
                            <label for="name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Nama
                                Fasilitas <span class="text-red-500">*</span></label>
                            <input type="text" name="name" id="name" maxlength="255"
                                value="{{ old('name', $facility->name) }}"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-white dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                                required autofocus>
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="description"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Deskripsi</label>
                            <textarea name="description" id="description" rows="4"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-white dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500">{{ old('description', $facility->description) }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Gambar 1 --}}
                        <div class="mb-6">
                            <label for="image1"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-2">Gambar Fasilitas
                                1 <span class="text-red-500">*</span></label>
                            <input type="file" name="image1" id="image1" class="hidden"
                                onchange="previewImage(event, 'image1')" accept="image/*">
                            <div class="mt-1">
                                <img id="image1-preview"
                                    src="{{ $facility->image1 ? asset('storage/' . $facility->image1) : '#' }}"
                                    alt="Pratinjau Gambar 1"
                                    class="w-full md:w-64 h-48 object-cover rounded-lg cursor-pointer shadow-md transition duration-300 ease-in-out transform hover:scale-105 border-2 border-dashed border-transparent focus:border-blue-500 {{ $facility->image1 ? '' : 'hidden' }}"
                                    onclick="document.getElementById('image1').click()">
                                <div id="image1-placeholder"
                                    class="w-full md:w-64 h-48 flex items-center justify-center border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer text-gray-500 dark:text-gray-400 text-center transition duration-300 ease-in-out hover:border-blue-400 dark:hover:border-blue-400 hover:text-blue-400 dark:hover:text-blue-400 {{ $facility->image1 ? 'hidden' : '' }}"
                                    onclick="document.getElementById('image1').click()">
                                    <span class="text-lg">Klik untuk memilih gambar</span>
                                </div>
                            </div>
                            @error('image1')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Gambar 2 - Gambar 5 --}}
                        @foreach (['image2', 'image3', 'image4', 'image5'] as $image)
                            <div class="mb-6">
                                <label for="{{ $image }}"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-2">Gambar
                                    Fasilitas {{ $loop->index + 2 }}</label>
                                <input type="file" name="{{ $image }}" id="{{ $image }}"
                                    class="hidden" onchange="previewImage(event, '{{ $image }}')"
                                    accept="image/*">
                                <div class="mt-1">
                                    <img id="{{ $image }}-preview"
                                        src="{{ $facility->{$image} ? asset('storage/' . $facility->{$image}) : '#' }}"
                                        alt="Pratinjau {{ $image }}"
                                        class="w-full md:w-64 h-48 object-cover rounded-lg cursor-pointer shadow-md transition duration-300 ease-in-out transform hover:scale-105 border-2 border-dashed border-transparent focus:border-blue-500 {{ $facility->{$image} ? '' : 'hidden' }}"
                                        onclick="document.getElementById('{{ $image }}').click()">
                                    <div id="{{ $image }}-placeholder"
                                        class="w-full md:w-64 h-48 flex items-center justify-center border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer text-gray-500 dark:text-gray-400 text-center transition duration-300 ease-in-out hover:border-blue-400 dark:hover:border-blue-400 hover:text-blue-400 dark:hover:text-blue-400 {{ $facility->{$image} ? 'hidden' : '' }}"
                                        onclick="document.getElementById('{{ $image }}').click()">
                                        <span class="text-lg">Klik untuk memilih gambar</span>
                                    </div>
                                </div>
                                @error($image)
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        @endforeach

                        <div class="flex justify-end mt-8">
                            <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition duration-300 ease-in-out">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event, imageId) {
            const imagePreview = document.getElementById(imageId + '-preview');
            const imagePlaceholder = document.getElementById(imageId + '-placeholder');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.classList.remove('hidden');
                    imagePlaceholder.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '#';
                imagePreview.classList.add('hidden');
                imagePlaceholder.classList.remove('hidden');
            }
        }
    </script>
</x-app-layout>
