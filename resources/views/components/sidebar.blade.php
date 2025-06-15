<div id="sidebar"
    class="bg-gray-800 text-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out z-50">

    <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 px-4">
        {{-- Contoh: Menggunakan logo gambar dari public/images --}}
        <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name', 'Laravel') }} Logo" class="h-10 w-auto">
        {{-- Atau jika ingin teks nama aplikasi disamping logo --}}
        {{-- <span class="text-white text-2xl font-extrabold">{{ config('app.name', 'Laravel') }}</span> --}}

        {{-- Jika Anda ingin menggunakan SVG inline untuk logo utama aplikasi --}}
        {{-- <svg class="h-10 w-auto text-white" fill="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M11 4a2 2 0 012 2v1h5.586a1 1 0 01.707 1.707l-4 4A1 1 0 0113 14.414V19a2 2 0 01-2 2H5a2 2 0 01-2-2v-5.586a1 1 0 01.293-.707l4-4A1 1 0 019 4.414V6a2 2 0 012-2z" />
        </svg>
        <span class="text-2xl font-extrabold">{{ config('app.name', 'Laravel') }}</span> --}}
    </a>

    <nav>
        {{-- Dashboard Link --}}
        <x-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            <x-slot name="icon">
                {{-- Home icon --}}
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 12l8.954-8.955c.42-.42.75-.42 1.17 0L21.75 12M4.5 9.75v10.5a1.5 1.5 0 001.5 1.5h12a1.5 1.5 0 001.5-1.5V9.75M10.5 18.75v-7.5a1.5 1.5 0 011.5-1.5h.75a1.5 1.5 0 011.5 1.5v7.5m-9-6h9" />
                </svg>
            </x-slot>
            Dashboard
        </x-sidebar-link>

        {{-- Berita Link --}}
        <x-sidebar-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
            <x-slot name="icon">
                {{-- Newspaper icon --}}
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18.75a2.25 2.25 0 01-2.25 2.25H12a2.25 2.25 0 01-2.25-2.25V5.625c0-.621.504-1.125 1.125-1.125H15.75c.621 0 1.125.504 1.125 1.125v1.5m0 0H21m-1.5 0H12" />
                </svg>
            </x-slot>
            Berita
        </x-sidebar-link>

        {{-- Keunggulan Dropdown --}}
        <div class="relative px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md cursor-pointer transition duration-150 ease-in-out"
            x-data="{ open: false }" @click="open = !open">
            <div class="flex items-center justify-between">
                <span class="flex items-center">
                    {{-- Star icon for "Keunggulan" --}}
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-5 w-5 mr-3">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.582 0l-4.725 2.885a.562.562 0 01-.84-.61l1.285-5.385a.563.563 0 00-.182-.557L3.929 8.682c-.38-.325-.178-.948.321-.988l5.518-.442a.563.563 0 00.475-.345l2.125-5.111z" />
                    </svg>
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
                <x-dropdown-link :href="route('facilities.index')">
                    Fasilitas dan Layanan
                </x-dropdown-link>
                <x-dropdown-link :href="route('achievements.index')">
                    Prestasi
                </x-dropdown-link>
                <x-dropdown-link :href="route('extracurriculars.index')">
                    Ekstrakurikuler
                </x-dropdown-link>
            </div>
        </div>

        {{-- Direktori Dropdown --}}
        <div class="relative px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md cursor-pointer transition duration-150 ease-in-out"
            x-data="{ open: false }" @click="open = !open">
            <div class="flex items-center justify-between">
                <span class="flex items-center">
                    {{-- Folder icon for "Direktori" --}}
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-5 w-5 mr-3">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-4.5-7.5l-2.25 2.25m-4.5-4.5H9.75M12 18.75h.008v.008H12zm0 3c5.066 0 9.25-3.882 9.25-8.5s-4.184-8.5-9.25-8.5-9.25 3.882-9.25 8.5 4.184 8.5 9.25 8.5z" />
                    </svg>
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
                <x-dropdown-link :href="route('staff.index')">
                    Guru dan Pegawai
                </x-dropdown-link>
                <x-dropdown-link :href="route('external-service-links.index')">
                    Link Layanan Eksternal
                </x-dropdown-link>
                <x-dropdown-link :href="route('gallery-categories.index')">
                    Galeri
                </x-dropdown-link>
            </div>
        </div>
    </nav>
</div>

<div id="sidebar-backdrop" class="fixed inset-0 bg-black opacity-50 z-40 hidden md:hidden"></div>

<button id="mobile-menu-button" class="md:hidden p-4 fixed top-0 left-0 z-50 text-gray-700">
    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
    </svg>
</button>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const sidebarBackdrop = document.getElementById('sidebar-backdrop');

            mobileMenuButton.addEventListener('click', function() {
                sidebar.classList.toggle('-translate-x-full');
                sidebarBackdrop.classList.toggle('hidden');
            });

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

            // Initialize Alpine.js for dropdowns (already loaded by Breeze's app.js)
        });
    </script>
@endpush
