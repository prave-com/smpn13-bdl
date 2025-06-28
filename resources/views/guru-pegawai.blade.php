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
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <h1 class="text-3xl sm:text-4xl font-bold text-gray-800 dark:text-white">
                    Guru & Pegawai
                </h1>
                <p class="mt-2 text-lg text-gray-600 dark:text-gray-300">
                    Daftar guru dan tenaga kependidikan SMPN 13 Bandar Lampung
                </p>
            </div>

            @forelse ($groupedStaff as $positionName => $data)
                <div class="mb-12">
                    <h2
                        class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-100 border-b-2 border-green-500 mb-6 pb-2">
                        {{ $positionName }}
                    </h2>

                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
                        @foreach ($data['staff'] as $person)
                            <div
                                class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden text-center p-3 transform hover:scale-105 transition-transform duration-200 ease-in-out">
                                <img src="{{ $person->avatar ? asset('storage/' . $person->avatar) : asset('images/avatar.png') }}"
                                    alt="{{ $person->name }}"
                                    class="w-full aspect-3/4 object-cover object-top rounded-md mb-3 dark:bg-white border border-gray-200 dark:border-gray-700"
                                    loading="lazy">
                                <div class="text-sm font-semibold text-gray-800 dark:text-white">
                                    {{ $person->name }}
                                </div>
                                <div class="text-xs text-gray-700 dark:text-gray-300 mt-1">
                                    {{ $person->positions->pluck('name')->join(', ') }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @empty
                <div class="text-center text-gray-600 dark:text-gray-400 text-lg">
                    Belum ada data guru atau pegawai.
                </div>
            @endforelse
        </div>
    </main>

    <x-footer />
</x-guest-layout>
