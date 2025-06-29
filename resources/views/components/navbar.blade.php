<nav class="bg-[#1D6F42] dark:bg-gray-900 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <img class="h-10 w-auto" src="{{ asset('images/logo.png') }}"
                            alt="Logo SMP Negeri 13 Bandar Lampung">
                    </a>
                </div>
            </div>

            <div class="hidden md:flex md:items-center md:ml-6 space-x-8">
                <a href="{{ route('home') }}"
                    class="text-white hover:text-green-200 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Beranda</a>

                <div class="relative group">
                    <button
                        class="text-white hover:text-green-200 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 flex items-center">
                        Profil
                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div
                        class="absolute z-10 hidden group-hover:block bg-[#104710] shadow-lg rounded-md w-48 py-2 top-full transition-opacity duration-200 opacity-0 group-hover:opacity-100">
                        <a href="{{ route('greeting') }}"
                            class="block px-4 py-2 text-white hover:bg-green-700 hover:text-white">Sambutan</a>
                        <a href="{{ route('vision-mission') }}"
                            class="block px-4 py-2 text-white hover:bg-green-700 hover:text-white">Visi &
                            Misi</a>
                        <a href="{{ route('organization-structure') }}"
                            class="block px-4 py-2 text-white hover:bg-green-700 hover:text-white">Struktur
                            Organisasi</a>
                        <a href="{{ route('history') }}"
                            class="block px-4 py-2 text-white hover:bg-green-700 hover:text-white">Sejarah</a>
                    </div>
                </div>

                <div class="relative group">
                    <button
                        class="text-white hover:text-green-200 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 flex items-center">
                        Keunggulan
                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div
                        class="absolute z-10 hidden group-hover:block bg-[#104710] shadow-lg rounded-md w-48 py-2 top-full transition-opacity duration-200 opacity-0 group-hover:opacity-100">
                        <a href="{{ route('facilities.index') }}"
                            class="block px-4 py-2 text-white hover:bg-green-700 hover:text-white">Fasilitas</a>
                        <a href="{{ route('achievements.index') }}"
                            class="block px-4 py-2 text-white hover:bg-green-700 hover:text-white">Prestasi</a>
                        <a href="{{ route('extracurriculars.index') }}"
                            class="block px-4 py-2 text-white hover:bg-green-700 hover:text-white">Ekstrakurikuler</a>
                    </div>
                </div>

                <div class="relative group">
                    <button
                        class="text-white hover:text-green-200 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 flex items-center">
                        Direktori
                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div
                        class="absolute z-10 hidden group-hover:block bg-[#104710] shadow-lg rounded-md w-48 py-2 top-full transition-opacity duration-200 opacity-0 group-hover:opacity-100">
                        <a href="{{ route('staff.index') }}"
                            class="block px-4 py-2 text-white hover:bg-green-700 hover:text-white">Guru &
                            Pegawai</a>
                        <a href="{{ route('external-service-links.index') }}"
                            class="block px-4 py-2 text-white hover:bg-green-700 hover:text-white">Link Eksternal</a>
                    </div>
                </div>

                <a href="{{ route('gallery.index') }}"
                    class="text-white hover:text-green-200 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Galeri</a>
                <a href="{{ route('contact') }}"
                    class="text-white hover:text-green-200 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Kontak</a>
                <a href="{{ route('news.index') }}"
                    class="text-white hover:text-green-200 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Berita</a>
            </div>

            <div class="-mr-2 flex items-center md:hidden">
                <button type="button"
                    class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false" id="mobile-menu-button">
                    <span class="sr-only">Open main menu</span>
                    <svg class="block h-6 w-6" id="menu-icon-closed" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="hidden h-6 w-6" id="menu-icon-open" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="md:hidden origin-top transition-all ease-in-out duration-300 max-h-0 overflow-hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{ route('home') }}"
                class="text-white hover:bg-green-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Beranda</a>

            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open"
                    class="text-white hover:bg-green-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium w-full text-left flex items-center justify-between">
                    Profil
                    <svg x-bind:class="{ 'rotate-180': open }"
                        class="ml-2 h-4 w-4 transform transition-transform duration-200"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div x-show="open" @click.away="open = false"
                    class="pl-6 py-1 space-y-1 bg-[#1A5C37] rounded-md transition-all duration-200"
                    {{-- Warna dropdown mobile --}} x-transition:enter="max-h-0 opacity-0"
                    x-transition:enter-start="max-h-0 opacity-0" x-transition:enter-end="max-h-screen opacity-100"
                    x-transition:leave="max-h-screen opacity-100" x-transition:leave-end="max-h-0 opacity-0">
                    <a href="{{ route('greeting') }}"
                        class="block px-3 py-2 text-white hover:bg-green-600 hover:text-white rounded-md">Sambutan</a>
                    <a href="{{ route('vision-mission') }}"
                        class="block px-3 py-2 text-white hover:bg-green-600 hover:text-white rounded-md">Visi
                        & Misi</a>
                    <a href="{{ route('organization-structure') }}"
                        class="block px-3 py-2 text-white hover:bg-green-600 hover:text-white rounded-md">Struktur
                        Organisasi</a>
                    <a href="{{ route('history') }}"
                        class="block px-3 py-2 text-white hover:bg-green-600 hover:text-white rounded-md">Sejarah</a>
                </div>
            </div>

            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open"
                    class="text-white hover:bg-green-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium w-full text-left flex items-center justify-between">
                    Keunggulan
                    <svg x-bind:class="{ 'rotate-180': open }"
                        class="ml-2 h-4 w-4 transform transition-transform duration-200"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div x-show="open" @click.away="open = false"
                    class="pl-6 py-1 space-y-1 bg-[#1A5C37] rounded-md transition-all duration-200"
                    x-transition:enter="max-h-0 opacity-0" x-transition:enter-start="max-h-0 opacity-0"
                    x-transition:enter-end="max-h-screen opacity-100" x-transition:leave="max-h-screen opacity-100"
                    x-transition:leave-end="max-h-0 opacity-0">
                    <a href="{{ route('facilities.index') }}"
                        class="block px-3 py-2 text-white hover:bg-green-600 hover:text-white rounded-md">Fasilitas</a>
                    <a href="{{ route('achievements.index') }}"
                        class="block px-3 py-2 text-white hover:bg-green-600 hover:text-white rounded-md">Prestasi</a>
                    <a href="{{ route('extracurriculars.index') }}"
                        class="block px-3 py-2 text-white hover:bg-green-600 hover:text-white rounded-md">Ekstrakurikuler</a>
                </div>
            </div>

            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open"
                    class="text-white hover:bg-green-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium w-full text-left flex items-center justify-between">
                    Direktori
                    <svg x-bind:class="{ 'rotate-180': open }"
                        class="ml-2 h-4 w-4 transform transition-transform duration-200"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div x-show="open" @click.away="open = false"
                    class="pl-6 py-1 space-y-1 bg-[#1A5C37] rounded-md transition-all duration-200"
                    x-transition:enter="max-h-0 opacity-0" x-transition:enter-start="max-h-0 opacity-0"
                    x-transition:enter-end="max-h-screen opacity-100" x-transition:leave="max-h-screen opacity-100"
                    x-transition:leave-end="max-h-0 opacity-0">
                    <a href="{{ route('staff.index') }}"
                        class="block px-3 py-2 text-white hover:bg-green-600 hover:text-white rounded-md">Guru &
                        Pegawai</a>
                    <a href="{{ route('external-service-links.index') }}"
                        class="block px-3 py-2 text-white hover:bg-green-600 hover:text-white rounded-md">Link
                        Eksternal</a>
                </div>
            </div>

            <a href="{{ route('gallery.index') }}"
                class="text-white hover:bg-green-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Galeri</a>
            <a href="{{ route('contact') }}"
                class="text-white hover:bg-green-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Kontak</a>
            <a href="{{ route('news.index') }}"
                class="text-white hover:bg-green-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Berita</a>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIconClosed = document.getElementById('menu-icon-closed');
        const menuIconOpen = document.getElementById('menu-icon-open');

        mobileMenu.classList.add('max-h-0');
        mobileMenu.classList.remove('max-h-screen');
        menuIconClosed.classList.add('block');
        menuIconClosed.classList.remove('hidden');
        menuIconOpen.classList.add('hidden');
        menuIconOpen.classList.remove('block');

        mobileMenuButton.addEventListener('click', function() {
            const isExpanded = this.getAttribute('aria-expanded') === 'true';

            this.setAttribute('aria-expanded', !isExpanded);

            if (!isExpanded) {
                menuIconClosed.classList.add('hidden');
                menuIconClosed.classList.remove('block');
                menuIconOpen.classList.add('block');
                menuIconOpen.classList.remove('hidden');
            } else {
                menuIconClosed.classList.add('block');
                menuIconClosed.classList.remove('hidden');
                menuIconOpen.classList.add('hidden');
                menuIconOpen.classList.remove('block');
            }

            if (!isExpanded) {
                mobileMenu.classList.remove('max-h-0');
                mobileMenu.classList.add('max-h-screen');
            } else {
                mobileMenu.classList.remove('max-h-screen');
                mobileMenu.classList.add('max-h-0');
            }
        });
    });
</script>
