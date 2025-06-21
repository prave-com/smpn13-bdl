<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Buat Staff
        </h2>
    </x-slot>

    <div class="md:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('admin.staff.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-6">
                            <label for="name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Nama
                                Staff <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="name" id="name" maxlength="255"
                                value="{{ old('name') }}"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-white dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                                required autofocus>
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="positions"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Posisi
                                Staff <span class="text-red-500">*</span>
                            </label>
                            <select name="positions[]" id="positions" multiple
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-white dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                @foreach ($positions as $position)
                                    <option value="{{ $position->id }}"
                                        {{ in_array($position->id, old('positions', [])) ? 'selected' : '' }}>
                                        {{ $position->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('positions')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            @error('positions.*')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="avatar"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-2">Gambar
                                Staff</label>
                            <input type="file" name="avatar" id="avatar" class="hidden"
                                onchange="previewImage(event)" accept="image/*">

                            <div class="mt-1">
                                <img id="image-preview" src="#" alt="Pratinjau Gambar"
                                    class="hidden w-full md:w-64 h-48 object-cover rounded-lg cursor-pointer shadow-md transition duration-300 ease-in-out transform hover:scale-105 border-2 border-dashed border-transparent focus:border-blue-500"
                                    onclick="document.getElementById('avatar').click()">

                                <div id="image-placeholder"
                                    class="w-full md:w-64 h-48 flex items-center justify-center border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer text-gray-500 dark:text-gray-400 text-center transition duration-300 ease-in-out hover:border-blue-400 dark:hover:border-blue-400 hover:text-blue-400 dark:hover:text-blue-400"
                                    onclick="document.getElementById('avatar').click()">
                                    <span class="text-lg">Klik untuk memilih gambar</span>
                                </div>
                            </div>

                            @error('avatar')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end mt-8">
                            <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition duration-300 ease-in-out">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Script untuk inisialisasi Tom Select dan pratinjau gambar --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi Tom Select jika elemen 'positions' ada dan TomSelect sudah dimuat
            if (typeof window.TomSelect !== 'undefined' && document.getElementById('positions')) {
                new window.TomSelect("#positions", {
                    plugins: ['remove_button'], // Memungkinkan penghapusan item yang dipilih
                    create: false, // Melarang pembuatan opsi baru secara langsung
                    sortField: { // Opsional: mengurutkan opsi dalam dropdown
                        field: "text",
                        direction: "asc"
                    },
                    // Anda dapat menambahkan lebih banyak opsi di sini untuk menyesuaikan tampilan dan perilakunya
                    // Lihat dokumentasi Tom Select untuk opsi lengkap: https://tom-select.js.org/docs/
                });
            }
        });

        // Script pratinjau gambar yang sudah ada
        function previewImage(event) {
            const imagePreview = document.getElementById('image-preview');
            const imagePlaceholder = document.getElementById('image-placeholder');
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
