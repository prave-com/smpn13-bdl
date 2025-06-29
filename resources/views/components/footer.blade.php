<footer
    class="bg-gradient-to-r from-[#1D6F42] to-[#1A5C37] dark:from-gray-900 dark:to-gray-800 text-white py-12 shadow-inner">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-12 items-start">
        <div class="flex flex-col items-center md:items-start text-center md:text-left">
            <a href="{{ route('home') }}" class="mb-6 block">
                <img src="{{ asset('images/logo.png') }}" alt="Logo SMP Negeri 13 Bandar Lampung"
                    class="h-16 w-auto object-contain transition-transform duration-300 hover:scale-105">
            </a>
            <p class="text-base text-green-100 leading-relaxed mb-6">
                "Menumbuhkan sikap ulet, gigih serta siap berkompetisi meraih prestasi belajar."
            </p>
            <div class="flex space-x-6">
                {{-- Instagram --}}
                <a href="https://www.instagram.com/smpn13_bdl/" target="_blank"
                    class="text-green-200 hover:text-white transform hover:scale-110 transition-all duration-300"
                    aria-label="Instagram">
                    <i class="fab fa-instagram text-3xl"></i>
                </a>
                {{-- Facebook --}}
                <a href="https://www.facebook.com/people/Spantiglas-Balam/pfbid0mTGWWgYCpFAzkfPJq7FxQcNTmGuJih8HsMvnWQR7n4GKgtq2EZQc1ewSD2LvuLhcl/"
                    target="_blank"
                    class="text-green-200 hover:text-blue-400 transform hover:scale-110 transition-all duration-300"
                    aria-label="Facebook">
                    <i class="fab fa-facebook text-3xl"></i>
                </a>
                {{-- YouTube --}}
                <a href="https://www.youtube.com/@SMPN13BandarLampung" target="_blank"
                    class="text-green-200 hover:text-red-400 transform hover:scale-110 transition-all duration-300"
                    aria-label="YouTube">
                    <i class="fab fa-youtube text-3xl"></i>
                </a>
                {{-- TikTok --}}
                <a href="https://www.tiktok.com/@spantiglasbalam" target="_blank"
                    class="text-green-200 hover:text-white transform hover:scale-110 transition-all duration-300"
                    aria-label="TikTok">
                    <i class="fab fa-tiktok text-3xl"></i>
                </a>
            </div>
        </div>

        <div class="text-center md:text-left">
            <h4 class="text-xl font-bold text-white mb-6 border-b-2 border-green-300 pb-2 inline-block">Sitemap</h4>
            <ul class="space-y-3 text-white text-base">
                <li><a href="{{ route('home') }}"
                        class="hover:text-green-300 transition-colors duration-200 block">Beranda</a></li>
                <li><a href="{{ route('greeting') }}"
                        class="hover:text-green-300 transition-colors duration-200 block">Sambutan</a></li>
                <li><a href="{{ route('vision-mission') }}"
                        class="hover:text-green-300 transition-colors duration-200 block">Visi & Misi</a></li>
                <li><a href="{{ route('organization-structure') }}"
                        class="hover:text-green-300 transition-colors duration-200 block">Struktur Organisasi</a>
                </li>
                <li><a href="{{ route('history') }}"
                        class="hover:text-green-300 transition-colors duration-200 block">Sejarah</a></li>
            </ul>
        </div>

        <div class="text-center md:text-left">
            <h4 class="text-xl font-bold text-white mb-6 border-b-2 border-green-300 pb-2 inline-block">Hubungi Kami
            </h4>
            <address class="space-y-3 text-green-100 text-base not-italic">
                <p class="flex items-start md:items-center justify-center md:justify-start">
                    <i class="fas fa-map-marker-alt text-lg mr-3 mt-1 md:mt-0 text-green-300"></i>
                    <span>Jalan Marga Nomor 57, Kelurahan Beringin Raya, Kecamatan Kemiling, Kota Bandar Lampung,
                        Provinsi Lampung, 35158</span>
                </p>
                <p class="flex items-center justify-center md:justify-start">
                    <i class="fas fa-phone-alt text-lg mr-3 text-green-300"></i>
                    <span>Telepon/Fax: (0721) 271054/271054</span>
                </p>
            </address>
        </div>

    </div>

    <div class="text-center text-green-200 text-sm border-t border-green-700 pt-8 mt-12">
        © {{ date('Y') }} SMP Negeri 13 Bandar Lampung. All rights reserved.
    </div>
</footer>
