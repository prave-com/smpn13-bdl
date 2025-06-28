<x-app-layout>
    <x-slot name="header">
        Edit Statistik
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if (session('success'))
                        <div class="bg-green-500 text-white p-2 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.statistics.update') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="students_count"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                    Jumlah Siswa <span class="text-red-500">*</span>
                                </label>
                                <input type="number" name="students_count" id="students_count" min="0"
                                    value="{{ old('students_count', $statistic->students_count ?? 0) }}"
                                    class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm dark:bg-gray-700 dark:text-white"
                                    required>
                                @error('students_count')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="teachers_count"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                    Jumlah Guru <span class="text-red-500">*</span>
                                </label>
                                <input type="number" name="teachers_count" id="teachers_count" min="0"
                                    value="{{ old('teachers_count', $statistic->teachers_count ?? 0) }}"
                                    class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm dark:bg-gray-700 dark:text-white"
                                    required>
                                @error('teachers_count')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="staff_count"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                    Jumlah Staf <span class="text-red-500">*</span>
                                </label>
                                <input type="number" name="staff_count" id="staff_count" min="0"
                                    value="{{ old('staff_count', $statistic->staff_count ?? 0) }}"
                                    class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm dark:bg-gray-700 dark:text-white"
                                    required>
                                @error('staff_count')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="alumni_count"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                    Jumlah Alumni <span class="text-red-500">*</span>
                                </label>
                                <input type="number" name="alumni_count" id="alumni_count" min="0"
                                    value="{{ old('alumni_count', $statistic->alumni_count ?? 0) }}"
                                    class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm dark:bg-gray-700 dark:text-white"
                                    required>
                                @error('alumni_count')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:shadow-outline dark:bg-blue-600 dark:hover:bg-blue-700">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
