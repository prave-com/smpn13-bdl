<div id="sidebar"
    class="bg-gray-800 text-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out z-50 flex flex-col">
    {{-- Tambah flex flex-col --}}

    <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 px-4 mb-6"> {{-- mb-6 untuk spasi --}}
        <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name', 'Laravel') }} Logo" class="h-10 w-auto">
    </a>

    <nav class="flex-1"> {{-- flex-1 agar nav mengisi sisa ruang --}}
        {{-- Dashboard Link --}}
        <x-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            <x-slot name="icon">
                <i class="fa-solid fa-house w-5 h-5"></i> {{-- FA 6: fa-solid fa-house --}}
            </x-slot>
            Dashboard
        </x-sidebar-link>

        {{-- Berita Link --}}
        <x-sidebar-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
            <x-slot name="icon">
                <i class="fa-solid fa-newspaper w-5 h-5"></i> {{-- FA 6: fa-solid fa-newspaper --}}
            </x-slot>
            Berita
        </x-sidebar-link>

        {{-- Keunggulan Dropdown --}}
        <div class="relative px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md cursor-pointer transition duration-150 ease-in-out"
            x-data="{ open: false }" @click="open = !open">
            <div class="flex items-center justify-between">
                <span class="flex items-center">
                    <i class="fa-solid fa-star w-5 h-5 mr-3"></i> {{-- FA 6: fa-solid fa-star --}}
                    <span>Keunggulan</span>
                </span>
                <svg class="h-4 w-4 transform transition-transform duration-200" :class="{ 'rotate-90': open }"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </div>
            <div x-show="open" x-cloak class="ml-8 mt-2 space-y-2 text-sm"
                x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95">
                <x-dropdown-link :href="route('admin.facilities.index')">
                    Fasilitas dan Layanan
                </x-dropdown-link>
                <x-dropdown-link :href="route('admin.achievements.index')">
                    Prestasi
                </x-dropdown-link>
                <x-dropdown-link :href="route('admin.extracurriculars.index')">
                    Ekstrakurikuler
                </x-dropdown-link>
            </div>
        </div>

        {{-- Personalia Dropdown --}}
        <div class="relative px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md cursor-pointer transition duration-150 ease-in-out"
            x-data="{ open: false }" @click="open = !open">
            <div class="flex items-center justify-between">
                <span class="flex items-center">
                    <i class="fa-solid fa-users w-5 h-5 mr-3"></i> {{-- FA 6: fa-solid fa-users --}}
                    <span>Personalia</span>
                </span>
                <svg class="h-4 w-4 transform transition-transform duration-200" :class="{ 'rotate-90': open }"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </div>
            <div x-show="open" x-cloak class="ml-8 mt-2 space-y-2 text-sm"
                x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95">
                <x-dropdown-link :href="route('admin.staff.index')">
                    Guru dan Pegawai
                </x-dropdown-link>
                <x-dropdown-link :href="route('admin.positions.index')">
                    Posisi
                </x-dropdown-link>
            </div>
        </div>

        {{-- Direktori Dropdown --}}
        <div class="relative px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md cursor-pointer transition duration-150 ease-in-out"
            x-data="{ open: false }" @click="open = !open">
            <div class="flex items-center justify-between">
                <span class="flex items-center">
                    <i class="fa-solid fa-folder w-5 h-5 mr-3"></i> {{-- FA 6: fa-solid fa-folder --}}
                    <span>Direktori</span>
                </span>
                <svg class="h-4 w-4 transform transition-transform duration-200" :class="{ 'rotate-90': open }"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </div>
            <div x-show="open" x-cloak class="ml-8 mt-2 space-y-2 text-sm"
                x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95">
                <x-dropdown-link :href="route('admin.external-service-links.index')">
                    Link Layanan Eksternal
                </x-dropdown-link>
            </div>
        </div>

        {{-- Galeri Link --}}
        <x-sidebar-link :href="route('admin.gallery-categories.index')" :active="request()->routeIs('gallery-categories.index')">
            <x-slot name="icon">
                <i class="fa-solid fa-image w-5 h-5"></i> {{-- FA 6: fa-solid fa-image (alternatif: fa-images) --}}
            </x-slot>
            Galeri
        </x-sidebar-link>

        {{-- Statistik Link --}}
        <x-sidebar-link :href="route('admin.statistics.edit')" :active="request()->routeIs('statistics.edit')">
            <x-slot name="icon">
                <i class="fa-solid fa-chart-bar w-5 h-5"></i> {{-- FA 6: fa-solid fa-chart-bar --}}
            </x-slot>
            Statistik
        </x-sidebar-link>
    </nav>

    {{-- Menu Profil & Logout di bagian bawah sidebar --}}
    @auth
        <div class="mt-auto pt-4 border-t border-gray-700"> {{-- mt-auto akan mendorongnya ke bawah --}}
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-sidebar-link :href="route('profile.edit')"> {{-- Gunakan sidebar-link agar gaya konsisten --}}
                    <x-slot name="icon">
                        <i class="fa-solid fa-user w-5 h-5"></i> {{-- FA 6: fa-solid fa-user --}}
                    </x-slot>
                    {{ __('Profile') }}
                </x-sidebar-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-sidebar-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        <x-slot name="icon">
                            <i class="fa-solid fa-right-from-bracket w-5 h-5"></i> {{-- FA 6: fa-solid fa-right-from-bracket --}}
                        </x-slot>
                        {{ __('Log Out') }}
                    </x-sidebar-link>
                </form>
            </div>
        </div>
    @endauth
</div>

<div id="sidebar-backdrop" class="fixed inset-0 bg-black opacity-50 z-40 hidden md:hidden"></div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            // Tombol mobile-menu-button sekarang ada di navigation.blade.php
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const sidebarBackdrop = document.getElementById('sidebar-backdrop');

            if (mobileMenuButton) { // Pastikan tombol ada sebelum menambahkan event listener
                mobileMenuButton.addEventListener('click', function() {
                    sidebar.classList.toggle('-translate-x-full');
                    sidebarBackdrop.classList.toggle('hidden');
                });
            }

            sidebarBackdrop.addEventListener('click', function() {
                sidebar.classList.add('-translate-x-full');
                sidebarBackdrop.classList.add('hidden');
            });

            // Close sidebar on larger screens
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 768) { // md breakpoint
                    sidebar.classList.remove('-translate-x-full');
                    sidebarBackdrop.classList.add('hidden');
                } else {
                    sidebar.classList.add('-translate-x-full');
                }
            });
        });
    </script>
@endpush
