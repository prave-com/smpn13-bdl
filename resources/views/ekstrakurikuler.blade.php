<x-guest-layout>
    @include('components.navbar')

    @isset($header)
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <main class="w-full bg-white dark:bg-gray-900 py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h1 class="text-3xl sm:text-4xl font-bold text-[#1B1B18] dark:text-white">
                    Ekstrakurikuler
                </h1>
                <p class="mt-2 text-lg text-gray-700 dark:text-gray-300">
                    Ekstrakurikuler merupakan pendidikan dan keterampilan yang diberikan kepada para siswa di luar jam
                    belajar di kelas.
                </p>
                <p class="mt-4 text-lg text-gray-700 dark:text-gray-300"> {{-- Warna teks disesuaikan --}}
                    Berikut ini adalah beberapa program atau kegiatan ekstrakurikuler yang diselenggarakan di SMPN 13
                    Bandar Lampung:
                </p>
            </div>

            <div class="space-y-16">
                @foreach ($extracurriculars as $extracurricular)
                    <div class="text-center">
                        <div class="swiper swiper-extracurricular-page w-full max-w-xl mx-auto relative">
                            <div class="swiper-wrapper">
                                @foreach (['image1', 'image2', 'image3', 'image4', 'image5'] as $imgField)
                                    @if (!empty($extracurricular->$imgField))
                                        <div class="swiper-slide">
                                            <img src="{{ asset('storage/' . $extracurricular->$imgField) }}"
                                                alt="{{ $extracurricular->name }}"
                                                class="w-full h-80 object-cover rounded-md shadow hover:scale-105 transition-transform duration-300"
                                                loading="lazy">
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                            <div class="swiper-button-prev text-[#1D6F42] dark:text-green-200"></div>
                            <div class="swiper-button-next text-[#1D6F42] dark:text-green-200"></div>

                            <div class="swiper-pagination mt-2"></div>
                        </div>

                        <h2 class="mt-4 text-xl font-semibold text-[#1B1B18] dark:text-white uppercase tracking-wide">
                            {{ $extracurricular->name }}
                        </h2>
                        @if (!empty($extracurricular->description))
                            <p class="mt-2 text-gray-700 dark:text-gray-300 max-w-2xl mx-auto text-sm leading-relaxed">
                                {!! nl2br(e($extracurricular->description)) !!}
                            </p>
                        @endif
                    </div>
                @endforeach
            </div>

            <p class="mt-12 text-center text-gray-700 dark:text-gray-300 text-lg">
                Dan masih banyak lagi kegiatan ekstrakurikuler lainnya.
            </p>
        </div>
    </main>

    <x-footer />
</x-guest-layout>
