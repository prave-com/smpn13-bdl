<x-guest-layout>
    @include('components.navbar')

    <main class="w-full">
        {{-- Hero Section --}}
        <section class="py-16 px-4 sm:px-6 lg:px-8 w-full mx-auto bg-white dark:bg-gray-800 shadow-inner">
            <div class="flex flex-col-reverse lg:flex-row items-center justify-between gap-12 max-w-7xl mx-auto">
                <div class="w-full lg:w-1/2 text-center lg:text-left px-4 sm:px-8 lg:px-12">
                    <h1
                        class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-[#1B1B18] dark:text-white mb-4 leading-tight">
                        Selamat Datang di <br>
                        <span class="text-[#1D6F42]">SMP Negeri 13 Bandar Lampung</span>
                    </h1>
                    <p class="text-base sm:text-lg text-gray-700 dark:text-gray-300 mb-6">
                        "Menumbuhkan sikap ulet, gigih serta siap berkompetisi meraih prestasi belajar."
                        <br>Kami berkomitmen untuk mendidik generasi muda berprestasi dan berkarakter.
                    </p>
                    <div class="mt-8 flex flex-col sm:flex-row justify-center lg:justify-start gap-4">
                        <a href="{{ route('vision-mission') }}"
                            class="bg-[#1D6F42] hover:bg-[#1A5C37] text-white font-bold py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                            Visi & Misi Kami
                        </a>
                        <a href="{{ route('contact') }}"
                            class="border border-[#1D6F42] text-[#1D6F42] hover:bg-[#1D6F42] hover:text-white font-bold py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                            Hubungi Kami
                        </a>
                    </div>
                </div>

                <div class="w-full lg:w-1/2">
                    <img src="{{ asset('images/gerbang-sekolah.jpg') }}" alt="Ilustrasi Gerbang Sekolah"
                        class="w-full h-auto max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg xl:max-w-xl mx-auto rounded-lg shadow-2xl transition-transform duration-500 hover:scale-105">
                </div>
            </div>
        </section>

        {{-- Section: Mengapa Memilih Kami? --}}
        <section class="py-16 px-4 sm:px-6 lg:px-8 w-full mx-auto bg-white dark:bg-gray-800">
            <div class="max-w-7xl mx-auto text-center">
                <h2 class="text-2xl sm:text-3xl font-bold text-[#1B1B18] dark:text-white mb-8">
                    Mengapa Memilih SMP Negeri 13 Bandar Lampung?
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div
                        class="bg-gray-100 dark:bg-gray-700 p-8 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                        <i class="fas fa-graduation-cap text-5xl text-[#1D6F42] mb-4"></i>
                        <h3 class="text-xl font-semibold text-[#1B1B18] dark:text-white mb-2">Kurikulum Unggulan</h3>
                        <p class="text-gray-700 dark:text-gray-300">
                            Menyediakan pendidikan berkualitas tinggi dengan kurikulum yang relevan.
                        </p>
                    </div>
                    <div
                        class="bg-gray-100 dark:bg-gray-700 p-8 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                        <i class="fas fa-users text-5xl text-[#1D6F42] mb-4"></i>
                        <h3 class="text-xl font-semibold text-[#1B1B18] dark:text-white mb-2">Lingkungan Kondusif</h3>
                        <p class="text-gray-700 dark:text-gray-300">
                            Suasana belajar yang aman, nyaman, dan mendukung perkembangan siswa.
                        </p>
                    </div>
                    <div
                        class="bg-gray-100 dark:bg-gray-700 p-8 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                        <i class="fas fa-medal text-5xl text-[#1D6F42] mb-4"></i>
                        <h3 class="text-xl font-semibold text-[#1B1B18] dark:text-white mb-2">Prestasi Gemilang</h3>
                        <p class="text-gray-700 dark:text-gray-300">
                            Beragam pencapaian siswa di bidang akademik dan non-akademik.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Section: Statistik Sekolah --}}
        @if ($stats)
            <section class="py-16 px-4 sm:px-6 lg:px-8 w-full mx-auto bg-[#1A5C37] text-white">
                <div class="max-w-7xl mx-auto text-center">
                    <h2 class="sr-only">Statistik Sekolah</h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                        <div class="flex flex-col items-center">
                            <i class="fas fa-user-graduate text-5xl text-green-200 mb-3"></i>
                            <span class="text-4xl sm:text-5xl font-bold">{{ $stats->students_count }}</span>
                            <p class="text-lg text-green-100">Peserta Didik</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <i class="fas fa-chalkboard-teacher text-5xl text-green-200 mb-3"></i>
                            <span class="text-4xl sm:text-5xl font-bold">{{ $stats->teachers_count }}</span>
                            <p class="text-lg text-green-100">Guru</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <i class="fas fa-users-cog text-5xl text-green-200 mb-3"></i>
                            <span class="text-4xl sm:text-5xl font-bold">{{ $stats->staff_count }}</span>
                            <p class="text-lg text-green-100">Staf</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <i class="fas fa-user-friends text-5xl text-green-200 mb-3"></i>
                            <span class="text-4xl sm:text-5xl font-bold">{{ $stats->alumni_count }}</span>
                            <p class="text-lg text-green-100">Alumni</p>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        {{-- Section: Program Ekstrakurikuler --}}
        @if ($extracurriculars->count() > 0)
            <section class="py-16 px-4 sm:px-6 lg:px-8 w-full mx-auto bg-gray-50 dark:bg-gray-900">
                <div class="max-w-7xl mx-auto text-center">
                    <h2 class="text-3xl sm:text-4xl font-bold text-[#1B1B18] dark:text-white mb-10">Program
                        Ekstrakurikuler</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        @foreach ($extracurriculars as $extra)
                            <div
                                class="relative bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden
                                transform transition-all duration-300 hover:scale-105 hover:shadow-xl
                                cursor-pointer group">

                                @if ($extra->image1)
                                    <img src="{{ asset('storage/' . $extra->image1) }}" alt="{{ $extra->name }}"
                                        class="w-full h-64 object-cover object-center transition-transform duration-330 group-hover:scale-110">
                                @else
                                    <div
                                        class="w-full h-64 bg-gray-200 dark:bg-gray-600 flex items-center justify-center">
                                        <i class="fas fa-question text-5xl text-gray-500"></i>
                                    </div>
                                @endif

                                <div
                                    class="absolute bottom-0 right-0 bg-gradient-to-tl from-[#1D6F42] to-transparent p-4
                                            rounded-tl-lg text-right text-white
                                            opacity-90 group-hover:opacity-100 transition-opacity duration-300 ease-out
                                            group-hover:from-[#1A5C37] transition-colors duration-300">
                                    <h3 class="text-lg font-semibold whitespace-nowrap overflow-hidden text-ellipsis">
                                        {{ $extra->name }}
                                    </h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-10">
                        <a href="{{ route('extracurriculars.index') }}"
                            class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-[#1D6F42] hover:bg-[#1A5C37] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1D6F42] transition-colors duration-200">
                            Lihat Semua Ekstrakurikuler
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </section>
        @endif

        {{-- Section: Guru & Pegawai --}}
        @if ($staffs->count() > 0)
            <section class="py-16 px-4 sm:px-6 lg:px-8 w-full mx-auto bg-gray-100 dark:bg-gray-800">
                <div class="max-w-7xl mx-auto text-center">
                    <h2 class="text-3xl sm:text-4xl font-bold text-[#1B1B18] dark:text-white mb-10">Guru & Pegawai</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                        @foreach ($staffs as $staff)
                            <div
                                class="bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                                @if ($staff->avatar)
                                    <img src="{{ asset('storage/' . $staff->avatar) }}" alt="{{ $staff->name }}"
                                        class="w-full h-64 object-cover">
                                @else
                                    <img src="{{ asset('images/default-avatar.jpg') }}" alt="Default Avatar"
                                        class="w-full h-64 object-cover">
                                @endif
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-[#1B1B18] dark:text-white mb-2">
                                        {{ $staff->name }}</h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-10">
                        <a href="{{ route('staff.index') }}"
                            class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-[#1D6F42] hover:bg-[#1A5C37] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1D6F42] transition-colors duration-200">
                            Lihat Semua Guru & Pegawai
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </section>
        @endif

        {{-- Section: Berita Terbaru --}}
        <section class="py-16 px-4 sm:px-6 lg:px-8 w-full mx-auto bg-white dark:bg-gray-800">
            <div class="max-w-7xl mx-auto text-center">
                <h2 class="text-3xl sm:text-4xl font-bold text-[#1B1B18] dark:text-white mb-10">Berita Terbaru</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 text-left">
                    @foreach ($latestNews as $newsItem)
                        <x-news-card :news="$newsItem" />
                    @endforeach
                </div>

                <div class="mt-10">
                    <a href="{{ route('news.index') }}"
                        class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-[#1D6F42] hover:bg-[#1A5C37] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1D6F42] transition-colors duration-200">
                        Lihat Semua Berita
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </section>

        {{-- Section: Prestasi Gemilang (Tombol diselaraskan warnanya) --}}
        @if ($achievements->count() > 0)
            <section class="py-16 px-4 sm:px-6 lg:px-8 w-full mx-auto bg-gray-50 dark:bg-gray-900">
                <div class="max-w-7xl mx-auto text-center">
                    <h2 class="text-3xl sm:text-4xl font-bold text-[#1B1B18] dark:text-white mb-10">PRESTASI KAMI</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                        @foreach ($achievements as $achievement)
                            @if ($achievement->attachment)
                                <a href="{{ asset('storage/' . $achievement->attachment) }}" target="_blank"
                                    rel="noopener noreferrer"
                                    class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-xl flex flex-col p-6 text-center group">
                                    {{-- Fixed height for the visual placeholder --}}
                                    <div
                                        class="w-full h-48 bg-gray-200 dark:bg-gray-700 flex items-center justify-center mb-4 rounded-md flex-shrink-0">
                                        <i
                                            class="fas fa-trophy text-5xl text-[#1D6F42] group-hover:text-[#1A5C37] transition-colors duration-300"></i>
                                    </div>

                                    {{-- Content area that will take available space --}}
                                    <div class="flex flex-col flex-grow">
                                        <h3
                                            class="text-xl font-bold text-[#1B1B18] dark:text-white mb-2 uppercase group-hover:text-[#1D6F42] transition-colors duration-300 line-clamp-2">
                                            {{ $achievement->name }}
                                        </h3>

                                        <p class="text-gray-700 dark:text-gray-300 text-sm mb-4 line-clamp-3">
                                            Informasi detail terkait prestasi ini dapat dilihat pada lampiran.
                                        </p>
                                        {{-- PDF hint at the bottom, pushed by mt-auto --}}
                                        <p
                                            class="text-gray-500 dark:text-gray-400 text-xs mt-auto pt-2 border-t border-gray-200 dark:border-gray-700">
                                            Klik untuk mengunduh lampiran <i class="fas fa-file-pdf ml-1"></i>
                                        </p>
                                    </div>
                                </a>
                            @else
                                <div
                                    class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden flex flex-col p-6 text-center">
                                    {{-- Fixed height for the visual placeholder --}}
                                    <div
                                        class="w-full h-48 bg-gray-200 dark:bg-gray-700 flex items-center justify-center mb-4 rounded-md flex-shrink-0">
                                        <i class="fas fa-trophy text-5xl text-gray-500"></i>
                                    </div>

                                    {{-- Content area with a fixed height or max height for consistency --}}
                                    <div class="flex flex-col flex-grow">
                                        <h3
                                            class="text-xl font-bold text-[#1B1B18] dark:text-white mb-2 uppercase line-clamp-2">
                                            {{ $achievement->name }}
                                        </h3>
                                        <p class="text-gray-700 dark:text-gray-300 text-sm mb-4 line-clamp-3">
                                            Detail prestasi tidak tersedia sebagai lampiran.
                                        </p>
                                        <p
                                            class="text-gray-500 dark:text-gray-400 text-sm mt-auto pt-2 border-t border-gray-200 dark:border-gray-700">
                                            Lampiran tidak tersedia.</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="mt-10">
                        {{-- DISINI PENYESUAIAN WARNA TOMBOL PRESTASI --}}
                        <a href="{{ route('achievements.index') }}"
                            class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-[#1D6F42] hover:bg-[#1A5C37] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1D6F42] transition-colors duration-200">
                            TAMPILKAN SEMUA PRESTASI
                        </a>
                    </div>
                </div>
            </section>
        @endif

        {{-- Section: Informasi Lebih Lanjut (Call to Action) --}}
        <section class="py-16 px-4 sm:px-6 lg:px-8 w-full mx-auto bg-[#1D6F42] text-white">
            <div class="max-w-7xl mx-auto text-center">
                <h2 class="text-3xl sm:text-4xl font-bold text-white mb-6">Informasi Lebih Lanjut</h2>
                <p class="text-lg text-green-100 mb-8">
                    Jelajahi lebih banyak tentang program kami, fasilitas, dan berbagai kegiatan.
                </p>
                <a href="{{ route('contact') }}"
                    class="inline-flex items-center px-8 py-4 border border-transparent text-base font-medium rounded-md shadow-lg text-[#1B1B18] bg-green-300 hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-300 transition-colors duration-300 transform hover:scale-105">
                    Hubungi Kami Sekarang
                    <i class="fas fa-phone-alt ml-3"></i>
                </a>
            </div>
        </section>

    </main>

    <x-footer />

</x-guest-layout>
