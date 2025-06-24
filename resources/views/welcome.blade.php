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
                    <img src="{{ asset('images/school-hero.png') }}" alt="Ilustrasi Gedung Sekolah"
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

        {{-- Section: Prestasi Kami --}}
        @if ($achievements->count() > 0)
            <section class="py-16 px-4 sm:px-6 lg:px-8 w-full mx-auto bg-gray-100 dark:bg-gray-800">
                <div class="max-w-7xl mx-auto text-center">
                    <h2 class="text-3xl sm:text-4xl font-bold text-[#1B1B18] dark:text-white mb-10">Prestasi Kami</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                        @foreach ($achievements as $achievement)
                            <div
                                class="bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                                @if ($achievement->attachment)
                                    <img src="{{ asset('storage/' . $achievement->attachment) }}"
                                        alt="{{ $achievement->name }}" class="w-full h-48 object-cover">
                                @else
                                    <img src="{{ asset('images/default-achievement.jpg') }}"
                                        alt="Default Achievement Image" class="w-full h-48 object-cover">
                                @endif
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-[#1B1B18] dark:text-white mb-2">
                                        {{ $achievement->name }}</h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-10">
                        <a href="{{ route('achievements.index') }}"
                            class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-[#1D6F42] hover:bg-[#1A5C37] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1D6F42] transition-colors duration-200">
                            Lihat Semua Prestasi
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </section>
        @endif

        {{-- Section: Program Ekstrakurikuler --}}
        @if ($extracurriculars->count() > 0)
            <section class="py-16 px-4 sm:px-6 lg:px-8 w-full mx-auto bg-white dark:bg-gray-900">
                <div class="max-w-7xl mx-auto text-center">
                    <h2 class="text-3xl sm:text-4xl font-bold text-[#1B1B18] dark:text-white mb-10">Program
                        Ekstrakurikuler</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        @foreach ($extracurriculars as $extra)
                            <div
                                class="bg-gray-100 dark:bg-gray-700 p-8 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 flex flex-col items-center">
                                @if ($extra->image1)
                                    <img src="{{ asset('storage/' . $extra->image1) }}" alt="{{ $extra->name }}"
                                        class="w-32 h-32 object-cover rounded-full mb-4 border-4 border-[#1D6F42]">
                                @else
                                    <div
                                        class="w-32 h-32 rounded-full bg-gray-300 dark:bg-gray-600 flex items-center justify-center mb-4 border-4 border-[#1D6F42]">
                                        <i class="fas fa-question text-4xl text-gray-500"></i>
                                    </div>
                                @endif
                                <h3 class="text-xl font-semibold text-[#1B1B18] dark:text-white mb-2">
                                    {{ $extra->name }}</h3>
                                <p class="text-gray-700 dark:text-gray-300 text-sm line-clamp-3">
                                    {{ $extra->description }}</p>
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
        @if ($latestNews->count() > 0)
            <section class="py-16 px-4 sm:px-6 lg:px-8 w-full mx-auto bg-white dark:bg-gray-800">
                <div class="max-w-7xl mx-auto text-center">
                    <h2 class="text-3xl sm:text-4xl font-bold text-[#1B1B18] dark:text-white mb-10">Berita Terbaru</h2>

                    <!-- Swiper untuk berita, menggunakan class unik -->
                    <div class="swiper swiper-news-homepage"> {{-- Class diubah di sini --}}
                        <div class="swiper-wrapper">
                            @foreach ($latestNews as $newsItem)
                                <div class="swiper-slide h-auto">
                                    <div
                                        class="bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md overflow-hidden h-full flex flex-col">
                                        <a href="{{ route('news.show', $newsItem->slug) }}" class="block h-full">
                                            @if ($newsItem->images->first())
                                                <img src="{{ asset('storage/' . $newsItem->images->first()->image) }}"
                                                    alt="{{ $newsItem->title }}" class="w-full h-48 object-cover">
                                            @else
                                                <img src="{{ asset('images/default-news.jpg') }}"
                                                    alt="Default News Image" class="w-full h-48 object-cover">
                                            @endif
                                            <div class="p-6 flex flex-col flex-grow">
                                                <h3
                                                    class="text-xl font-semibold text-[#1B1B18] dark:text-white mb-2 leading-tight">
                                                    {{ Str::limit($newsItem->title, 70) }}
                                                </h3>
                                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">
                                                    {{ $newsItem->published_at ? \Carbon\Carbon::parse($newsItem->published_at)->locale('id')->isoFormat('D MMMM Y') : 'Tanggal Tidak Tersedia' }}
                                                    | {{ $newsItem->category->name ?? 'Tanpa Kategori' }}
                                                </p>
                                                <p
                                                    class="text-gray-700 dark:text-gray-300 text-sm flex-grow line-clamp-3">
                                                    {{ Str::limit(strip_tags($newsItem->content), 120) }}
                                                </p>
                                                <div class="mt-4 text-center">
                                                    <span
                                                        class="text-[#1D6F42] hover:text-[#1A5C37] font-medium text-sm inline-flex items-center">
                                                        Baca Selengkapnya
                                                        <i class="fas fa-arrow-right ml-1 text-xs"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination mt-8"></div>
                        <!-- Add Navigation -->
                        <div class="swiper-button-next text-[#1D6F42] dark:text-green-200"></div>
                        <div class="swiper-button-prev text-[#1D6F42] dark:text-green-200"></div>
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
