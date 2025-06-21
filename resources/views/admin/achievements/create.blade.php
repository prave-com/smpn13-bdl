<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Buat Prestasi
        </h2>
    </x-slot>

    <div class="md:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('admin.achievements.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-6">
                            <label for="name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Nama
                                Prestasi</label>
                            <input type="text" name="name" id="name" maxlength="255"
                                value="{{ old('name') }}"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-white dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                                required autofocus>
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="attachment"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Lampiran
                                Prestasi</label>
                            <input type="file" name="attachment" id="attachment"
                                class="mt-1 block w-full text-sm text-gray-700 dark:text-gray-100 file:bg-blue-600 file:text-white file:rounded file:border-0 file:px-4 file:py-2 dark:file:bg-blue-500"
                                required accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.txt,.odt">
                            @error('attachment')
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
</x-app-layout>
