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
        <div class="max-w-5xl mx-auto text-center">
            <h1 class="text-3xl sm:text-4xl font-bold text-gray-800 dark:text-white mb-8">
                Struktur Organisasi
            </h1>

            <div class="overflow-x-auto rounded-lg shadow-lg border border-gray-200 dark:border-gray-700">
                <img src="{{ asset('images/struktur-organisasi-smpn-13.png') }}"
                    alt="Struktur Organisasi SMPN 13 Bandar Lampung"
                    class="w-full h-auto object-contain bg-white dark:bg-gray-800">
            </div>
        </div>
    </main>

    <x-footer />
</x-guest-layout>
