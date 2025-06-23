<x-guest-layout>
    @include('components.navbar')

    {{-- @isset($header)
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset --}}

    <main class="w-full">
        <section class="py-16 px-4 sm:px-6 lg:px-8 w-full mx-auto dark:bg-gray-950 shadow-inner">
            <div class="flex flex-col-reverse lg:flex-row items-center justify-between gap-12 max-w-7xl mx-auto">
                <div class="w-full lg:w-1/2 text-center lg:text-left px-4 sm:px-8 lg:px-12">
                    <h1
                        class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-[#1B1B18] dark:text-white mb-4 leading-tight">
                        Selamat Datang di <br>
                        <span class="text-yellow-500">SMP Negeri 13 Bandar Lampung</span>
                    </h1>
                    <p class="text-base sm:text-lg text-gray-700 dark:text-gray-300 mb-6">
                        "Menumbuhkan sikap ulet, gigih serta siap berkompetisi meraih prestasi belajar."
                        <br>Kami berkomitmen untuk mendidik generasi muda berprestasi dan berkarakter.
                    </p>
                    <div class="mt-8 flex flex-col sm:flex-row justify-center lg:justify-start gap-4">
                        <a href="{{ route('vision-mission') }}"
                            class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                            Visi & Misi Kami
                        </a>
                        <a href="{{ route('contact') }}"
                            class="border border-yellow-500 text-yellow-500 hover:bg-yellow-500 hover:text-gray-900 font-bold py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                            Hubungi Kami
                        </a>
                    </div>
                </div>

                <div class="w-full lg:w-1/2">
                    {{-- Anda bisa mengganti 'hero-illustration.png' dengan gambar sekolah Anda --}}
                    {{-- Pastikan gambar ini ada di folder public/images/ --}}
                    <img src="{{ asset('images/school-hero.png') }}" alt="Ilustrasi Gedung Sekolah"
                        class="w-full h-auto max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg xl:max-w-xl mx-auto rounded-lg shadow-2xl transition-transform duration-500 hover:scale-105">
                </div>
            </div>
        </section>

        {{-- Bagian tambahan untuk informasi sekolah (opsional, bisa diperluas) --}}
        <section class="py-16 px-4 sm:px-6 lg:px-8 w-full mx-auto bg-white dark:bg-gray-800">
            <div class="max-w-7xl mx-auto text-center">
                <h2 class="text-2xl sm:text-3xl font-bold text-[#1B1B18] dark:text-white mb-8">
                    Mengapa Memilih SMP Negeri 13 Bandar Lampung?
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div
                        class="bg-gray-100 dark:bg-gray-700 p-8 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                        <i class="fas fa-graduation-cap text-5xl text-yellow-500 mb-4"></i>
                        <h3 class="text-xl font-semibold text-[#1B1B18] dark:text-white mb-2">Kurikulum Unggulan</h3>
                        <p class="text-gray-700 dark:text-gray-300">
                            Menyediakan pendidikan berkualitas tinggi dengan kurikulum yang relevan.
                        </p>
                    </div>
                    <div
                        class="bg-gray-100 dark:bg-gray-700 p-8 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                        <i class="fas fa-users text-5xl text-yellow-500 mb-4"></i>
                        <h3 class="text-xl font-semibold text-[#1B1B18] dark:text-white mb-2">Lingkungan Kondusif</h3>
                        <p class="text-gray-700 dark:text-gray-300">
                            Suasana belajar yang aman, nyaman, dan mendukung perkembangan siswa.
                        </p>
                    </div>
                    <div
                        class="bg-gray-100 dark:bg-gray-700 p-8 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                        <i class="fas fa-medal text-5xl text-yellow-500 mb-4"></i>
                        <h3 class="text-xl font-semibold text-[#1B1B18] dark:text-white mb-2">Prestasi Gemilang</h3>
                        <p class="text-gray-700 dark:text-gray-300">
                            Beragam pencapaian siswa di bidang akademik dan non-akademik.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <x-footer />

</x-guest-layout>
