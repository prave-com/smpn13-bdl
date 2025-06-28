<x-guest-layout>
    @include('components.navbar')

    @isset($header)
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <main class="w-full bg-gray-50 dark:bg-gray-900 py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto">
            <div class="text-center mb-12">
                <h1 class="text-3xl sm:text-4xl font-bold text-gray-800 dark:text-white">K B M</h1>
                <p class="mt-2 text-lg text-gray-600 dark:text-gray-300">
                    Daftar layanan eksternal yang mendukung kegiatan belajar mengajar di SMPN 13 Bandar Lampung
                </p>
            </div>

            <ul
                class="grid grid-cols-1 sm:grid-cols-2 gap-y-4 gap-x-10 text-lg text-green-600 hover:text-green-500 dark:text-green-400 dark:hover:text-green-300 list-disc pl-5">
                @foreach ($externalServiceLink as $link)
                    <li>
                        <a href="{{ $link->url }}" target="_blank"
                            class="text-green-600 hover:text-green-500 dark:text-green-400 dark:hover:text-green-300 transition-colors duration-200">
                            {{ $link->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </main>

    <x-footer />
</x-guest-layout>
