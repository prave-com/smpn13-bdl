<nav class="bg-[#1B1B1B] dark:bg-gray-900 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                {{-- Logo --}}
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <img class="h-10 w-auto" src="{{ asset('images/logo.png') }}"
                            alt="Logo SMP Negeri 13 Bandar Lampung">
                    </a>
                </div>
            </div>

            {{-- Desktop Navigation --}}
            <div class="hidden md:flex md:items-center md:ml-6 space-x-8">
                <a href="{{ route('home') }}"
                    class="text-gray-300 hover:text-yellow-500 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Beranda</a>
                <div class="relative group">
                    <button
                        class="text-gray-300 hover:text-yellow-500 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 flex items-center">
                        Profil
                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div
                        class="absolute z-10 hidden group-hover:block bg-[#2a2a2a] shadow-lg rounded-md w-48 py-2 mt-2 transition-opacity duration-200 opacity-0 group-hover:opacity-100">
                        <a href="{{ route('greeting') }}"
                            class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-yellow-500">Sambutan</a>
                        <a href="{{ route('vision-mission') }}"
                            class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-yellow-500">Visi &
                            Misi</a>
                        <a href="{{ route('organization-structure') }}"
                            class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-yellow-500">Struktur
                            Organisasi</a>
                        <a href="{{ route('history') }}"
                            class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-yellow-500">Sejarah</a>
                    </div>
                </div>
                <a href="{{ route('facilities.index') }}"
                    class="text-gray-300 hover:text-yellow-500 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Fasilitas</a>
                <a href="{{ route('achievements.index') }}"
                    class="text-gray-300 hover:text-yellow-500 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Prestasi</a>
                <a href="{{ route('extracurriculars.index') }}"
                    class="text-gray-300 hover:text-yellow-500 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Ekstrakurikuler</a>
                <a href="{{ route('staff.index') }}"
                    class="text-gray-300 hover:text-yellow-500 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Guru
                    & Pegawai</a>
                <a href="{{ route('gallery.index') }}"
                    class="text-gray-300 hover:text-yellow-500 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Galeri</a>
                <a href="{{ route('external-service-links.index') }}"
                    class="text-gray-300 hover:text-yellow-500 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Link
                    Eksternal</a>
                <a href="{{ route('contact') }}"
                    class="text-gray-300 hover:text-yellow-500 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Kontak</a>
            </div>

            {{-- Mobile menu button --}}
            <div class="-mr-2 flex items-center md:hidden">
                <button type="button"
                    class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false" id="mobile-menu-button">
                    <span class="sr-only">Open main menu</span>
                    {{-- Icon when menu is closed. --}}
                    <svg class="block h-6 w-6" id="menu-icon-closed" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    {{-- Icon when menu is open. --}}
                    <svg class="hidden h-6 w-6" id="menu-icon-open" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile menu, show/hide based on menu state. --}}
    <div class="md:hidden origin-top transition-all ease-in-out duration-300 max-h-0 overflow-hidden" id="mobile-menu">
        {{-- Added transition classes here --}}
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{ route('home') }}"
                class="text-gray-300 hover:bg-gray-700 hover:text-yellow-500 block px-3 py-2 rounded-md text-base font-medium">Beranda</a>

            {{-- Mobile Dropdown for Profil --}}
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open"
                    class="text-gray-300 hover:bg-gray-700 hover:text-yellow-500 block px-3 py-2 rounded-md text-base font-medium w-full text-left flex items-center justify-between">
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
                    class="pl-6 py-1 space-y-1 bg-[#3a3a3a] rounded-md transition-all duration-200"
                    x-transition:enter="max-h-0 opacity-0" x-transition:enter-start="max-h-0 opacity-0"
                    x-transition:enter-end="max-h-screen opacity-100" x-transition:leave="max-h-screen opacity-100"
                    x-transition:leave-end="max-h-0 opacity-0">
                    <a href="{{ route('greeting') }}"
                        class="block px-3 py-2 text-sm text-gray-300 hover:bg-gray-600 hover:text-yellow-500 rounded-md">Sambutan</a>
                    <a href="{{ route('vision-mission') }}"
                        class="block px-3 py-2 text-sm text-gray-300 hover:bg-gray-600 hover:text-yellow-500 rounded-md">Visi
                        & Misi</a>
                    <a href="{{ route('organization-structure') }}"
                        class="block px-3 py-2 text-sm text-gray-300 hover:bg-gray-600 hover:text-yellow-500 rounded-md">Struktur
                        Organisasi</a>
                    <a href="{{ route('history') }}"
                        class="block px-3 py-2 text-sm text-gray-300 hover:bg-gray-600 hover:text-yellow-500 rounded-md">Sejarah</a>
                </div>
            </div>

            <a href="{{ route('facilities.index') }}"
                class="text-gray-300 hover:bg-gray-700 hover:text-yellow-500 block px-3 py-2 rounded-md text-base font-medium">Fasilitas</a>
            <a href="{{ route('achievements.index') }}"
                class="text-gray-300 hover:bg-gray-700 hover:text-yellow-500 block px-3 py-2 rounded-md text-base font-medium">Prestasi</a>
            <a href="{{ route('extracurriculars.index') }}"
                class="text-gray-300 hover:bg-gray-700 hover:text-yellow-500 block px-3 py-2 rounded-md text-base font-medium">Ekstrakurikuler</a>
            <a href="{{ route('staff.index') }}"
                class="text-gray-300 hover:bg-gray-700 hover:text-yellow-500 block px-3 py-2 rounded-md text-base font-medium">Guru
                & Pegawai</a>
            <a href="{{ route('gallery.index') }}"
                class="text-gray-300 hover:bg-gray-700 hover:text-yellow-500 block px-3 py-2 rounded-md text-base font-medium">Galeri</a>
            <a href="{{ route('external-service-links.index') }}"
                class="text-gray-300 hover:bg-gray-700 hover:text-yellow-500 block px-3 py-2 rounded-md text-base font-medium">Link
                Eksternal</a>
            <a href="{{ route('contact') }}"
                class="text-gray-300 hover:bg-gray-700 hover:text-yellow-500 block px-3 py-2 rounded-md text-base font-medium">Kontak</a>
        </div>
    </div>
</nav>

{{-- JavaScript for Mobile Menu Toggle (add this script to your main layout file or a dedicated JS file) --}}
{{-- If you're using Alpine.js, the mobile dropdown will work automatically. --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIconClosed = document.getElementById('menu-icon-closed');
        const menuIconOpen = document.getElementById('menu-icon-open');

        // Initially hide the mobile menu and ensure correct icon is shown
        // We'll manage display based on max-height for smooth transitions
        mobileMenu.classList.add('max-h-0');
        mobileMenu.classList.remove('max-h-screen'); // Ensure it starts collapsed
        menuIconClosed.classList.add('block');
        menuIconClosed.classList.remove('hidden');
        menuIconOpen.classList.add('hidden');
        menuIconOpen.classList.remove('block');


        mobileMenuButton.addEventListener('click', function() {
            const isExpanded = this.getAttribute('aria-expanded') === 'true'; // Get current state

            // Toggle aria-expanded attribute
            this.setAttribute('aria-expanded', !isExpanded);

            // Toggle icon visibility
            if (!isExpanded) { // If menu is now open
                menuIconClosed.classList.add('hidden');
                menuIconClosed.classList.remove('block');
                menuIconOpen.classList.add('block');
                menuIconOpen.classList.remove('hidden');
            } else { // If menu is now closed
                menuIconClosed.classList.add('block');
                menuIconClosed.classList.remove('hidden');
                menuIconOpen.classList.add('hidden');
                menuIconOpen.classList.remove('block');
            }

            // Toggle mobile menu visibility with max-height for smooth transition
            if (!isExpanded) { // If menu is now open
                mobileMenu.classList.remove('max-h-0');
                mobileMenu.classList.add('max-h-screen'); // Expand
            } else { // If menu is now closed
                mobileMenu.classList.remove('max-h-screen');
                mobileMenu.classList.add('max-h-0'); // Collapse
            }
        });
    });
</script>
