<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Staff
        </h2>
    </x-slot>

    <div class="md:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('admin.staff.update', $staff) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-6">
                            <label for="name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Nama
                                Staff <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="name" id="name" maxlength="255"
                                value="{{ old('name', $staff->name) }}"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-white dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                                required autofocus>
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="position"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                                Posisi <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="position" id="position" maxlength="255"
                                value="{{ old('position', $staff->position) }}"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-white dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                                required autofocus>
                            @error('position')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="avatar"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-2">Gambar
                                Staff</label>
                            <input type="file" name="avatar" id="avatar" class="hidden" {{-- Keep hidden --}}
                                onchange="previewImage(event)" accept="image/*"> {{-- No 'required' for edit form --}}

                            <div class="mt-1">
                                <img id="image-preview"
                                    src="{{ $staff->avatar ? asset('storage/' . $staff->avatar) : '#' }}"
                                    alt="Pratinjau Avatar {{ $staff->name }}"
                                    class="w-full md:w-64 h-48 object-cover rounded-lg cursor-pointer shadow-md transition duration-300 ease-in-out transform hover:scale-105 border-2 border-dashed border-transparent focus:border-blue-500 {{ $staff->avatar ? '' : 'hidden' }}"
                                    loading="lazy" onclick="document.getElementById('avatar').click()">

                                <div id="image-placeholder"
                                    class="w-full md:w-64 h-48 flex items-center justify-center border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer text-gray-500 dark:text-gray-400 text-center transition duration-300 ease-in-out hover:border-blue-400 dark:hover:border-blue-400 hover:text-blue-400 dark:hover:text-blue-400 {{ $staff->avatar ? 'hidden' : '' }}"
                                    onclick="document.getElementById('avatar').click()">
                                    <span class="text-lg">Klik untuk memilih gambar</span>
                                </div>
                            </div>

                            <p class="text-gray-500 text-xs mt-2 dark:text-gray-400">Biarkan kosong jika tidak ingin
                                mengubah gambar.</p>
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

    <script>
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
