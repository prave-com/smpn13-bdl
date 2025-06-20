<x-guest-layout>
    @include('layouts.navigation')

    @isset($header)
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <main class="w-full bg-gray-50 dark:bg-gray-900 py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Judul -->
            <div class="text-center mb-12">
                <h1 class="text-3xl sm:text-4xl font-bold text-gray-800 dark:text-white">
                    Guru & Pegawai
                </h1>
                <p class="mt-2 text-lg text-gray-600 dark:text-gray-300">
                    Daftar guru dan tenaga kependidikan SMPN 13 Bandar Lampung
                </p>
            </div>

            <!-- Grid Staff -->
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
                @foreach ($staff as $person)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden text-center p-3">
                        <img src="{{ $person->avatar ? asset('storage/' . $person->avatar) : asset('images/avatar.png') }}"
                            alt="{{ $person->name }}"
                            class="w-full aspect-[3/4] object-cover object-top rounded-md mb-3 dark:bg-white">
                        <div class="text-sm font-semibold text-gray-800 dark:text-white">
                            {{ $person->name }}
                        </div>
                        <div class="text-xs text-gray-700 dark:text-gray-300 mt-1">
                            {{ $person->position }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

    <x-footer />
</x-guest-layout>
