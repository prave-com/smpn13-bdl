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
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h1 class="text-3xl sm:text-4xl font-bold text-gray-800 dark:text-white">
                    Fasilitas & Layanan
                </h1>
                <p class="mt-2 text-lg text-gray-600 dark:text-gray-300">
                    Sarana pendukung kegiatan belajar mengajar di SMPN 13 Bandar Lampung
                </p>
            </div>

            <div class="space-y-16">
                @foreach ($facilities as $facility)
                    <section class="p-4 md:p-6">
                        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-3">
                            {{ $facility->name }}
                        </h2>
                        <p class="text-gray-700 dark:text-gray-300 mb-4 leading-relaxed">
                            {!! nl2br(e($facility->description)) !!}
                        </p>

                        <div class="flex flex-wrap -m-1">
                            @foreach (['image1', 'image2', 'image3', 'image4', 'image5'] as $imgField)
                                @if (!empty($facility->$imgField))
                                    <div class="m-1">
                                        <img src="{{ asset('storage/' . $facility->$imgField) }}"
                                            alt="{{ $facility->name }}"
                                            class="max-w-full h-auto max-h-[400px] rounded-md hover:scale-105 transition-transform duration-300"
                                            loading="lazy">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </section>
                @endforeach
            </div>
        </div>
    </main>

    <x-footer />
</x-guest-layout>
