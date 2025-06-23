<footer
    class="bg-gradient-to-r from-[#1B1B1B] to-[#2a2a2a] dark:from-gray-900 dark:to-gray-800 text-[#EDEDEC] py-12 shadow-inner">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-12 items-start">

        {{-- Column 1: Logo and Info --}}
        <div class="flex flex-col items-center md:items-start text-center md:text-left">
            <a href="{{ route('home') }}" class="mb-6 block">
                <img src="{{ asset('images/logo.png') }}" alt="Logo SMP Negeri 13 Bandar Lampung"
                    class="h-16 w-auto object-contain transition-transform duration-300 hover:scale-105">
            </a>
            <p class="text-base text-gray-300 leading-relaxed mb-6">
                Menumbuhkan sikap ulet, gigih serta siap berkompetisi meraih prestasi belajar.
            </p>
            <div class="flex space-x-6">
                {{-- Link to TikTok --}}
                <a href="https://www.tiktok.com/@spantiglasbalam" target="_blank"
                    class="text-gray-300 hover:text-blue-400 transform hover:scale-110 transition-all duration-300"
                    aria-label="TikTok">
                    <i class="fab fa-tiktok text-3xl"></i>
                </a>
                {{-- Link to YouTube --}}
                <a href="https://www.youtube.com/@smpn13bandarlampung" target="_blank"
                    class="text-gray-300 hover:text-red-500 transform hover:scale-110 transition-all duration-300"
                    aria-label="YouTube">
                    <i class="fab fa-youtube text-3xl"></i>
                </a>
            </div>
        </div>

        {{-- Column 2: Grouped Navigation --}}
        <div class="text-center md:text-left grid grid-cols-1 sm:grid-cols-2 gap-y-8 gap-x-4">
            <div>
                <h4 class="text-xl font-bold text-white mb-6 border-b-2 border-yellow-500 pb-2 inline-block">Tentang
                    Kami</h4>
                <ul class="space-y-3 text-gray-300 text-base">
                    <li><a href="{{ route('home') }}"
                            class="hover:text-yellow-500 transition-colors duration-200 block">Beranda</a></li>
                    <li><a href="{{ route('greeting') }}"
                            class="hover:text-yellow-500 transition-colors duration-200 block">Sambutan</a></li>
                    <li><a href="{{ route('vision-mission') }}"
                            class="hover:text-yellow-500 transition-colors duration-200 block">Visi & Misi</a></li>
                    <li><a href="{{ route('organization-structure') }}"
                            class="hover:text-yellow-500 transition-colors duration-200 block">Struktur Organisasi</a>
                    </li>
                    <li><a href="{{ route('history') }}"
                            class="hover:text-yellow-500 transition-colors duration-200 block">Sejarah</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-xl font-bold text-white mb-6 border-b-2 border-yellow-500 pb-2 inline-block">Akademik &
                    Lainnya</h4>
                <ul class="space-y-3 text-gray-300 text-base">
                    <li><a href="{{ route('facilities.index') }}"
                            class="hover:text-yellow-500 transition-colors duration-200 block">Fasilitas</a></li>
                    <li><a href="{{ route('achievements.index') }}"
                            class="hover:text-yellow-500 transition-colors duration-200 block">Prestasi</a></li>
                    <li><a href="{{ route('extracurriculars.index') }}"
                            class="hover:text-yellow-500 transition-colors duration-200 block">Ekstrakurikuler</a></li>
                    <li><a href="{{ route('staff.index') }}"
                            class="hover:text-yellow-500 transition-colors duration-200 block">Guru & Pegawai</a></li>
                    <li><a href="{{ route('gallery.index') }}"
                            class="hover:text-yellow-500 transition-colors duration-200 block">Galeri</a></li>
                    <li><a href="{{ route('external-service-links.index') }}"
                            class="hover:text-yellow-500 transition-colors duration-200 block">Link Layanan
                            Eksternal</a></li>
                    <li><a href="{{ route('contact') }}"
                            class="hover:text-yellow-500 transition-colors duration-200 block">Kontak</a></li>
                </ul>
            </div>
        </div>

        {{-- Column 3: Contact Us --}}
        <div class="text-center md:text-left">
            <h4 class="text-xl font-bold text-white mb-6 border-b-2 border-yellow-500 pb-2 inline-block">Hubungi Kami
            </h4>
            <address class="space-y-3 text-gray-300 text-base not-italic">
                <p class="flex items-start md:items-center justify-center md:justify-start">
                    <i class="fas fa-map-marker-alt text-lg mr-3 mt-1 md:mt-0 text-yellow-500"></i>
                    <span>Jalan Marga Nomor 57, Kelurahan Beringin Raya, Kecamatan Kemiling, Kota Bandar Lampung,
                        Provinsi Lampung, 35158</span>
                </p>
                <p class="flex items-center justify-center md:justify-start">
                    <i class="fas fa-phone-alt text-lg mr-3 text-yellow-500"></i>
                    <span>Telepon/Fax: (0721) 271054</span>
                </p>
            </address>
        </div>

    </div>

    {{-- Copyright --}}
    <div class="text-center text-gray-500 text-sm border-t border-gray-800 pt-8 mt-12">
        © {{ date('Y') }} Prave Inc. All rights reserved.
    </div>
</footer>
