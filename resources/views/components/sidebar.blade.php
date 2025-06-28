<div id="sidebar"
    class="bg-gray-800 text-white w-64 space-y-6 py-7 px-2 absolute left-0 transform -translate-x-full transition duration-200 ease-in-out z-50 flex flex-col h-screen md:translate-x-0 md:sticky md:top-0">

    <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 px-4 mb-6">
        <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name', 'Laravel') }} Logo" class="h-10 w-auto">
    </a>

    <nav class="flex-1 overflow-y-auto">
        <x-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            <x-slot name="icon">
                <i class="fas fa-house w-5 h-5"></i>
            </x-slot>
            Dashboard
        </x-sidebar-link>

        <div class="relative px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md cursor-pointer transition duration-150 ease-in-out"
            x-data="{ open: {{ request()->routeIs('admin.news.*') || request()->routeIs('admin.news-categories.*') ? 'true' : 'false' }} }" @click="open = !open">
            <div class="flex items-center justify-between">
                <span class="flex items-center">
                    <i class="fas fa-newspaper w-5 h-5 mr-3"></i>
                    <span>Berita</span>
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
                <x-dropdown-link :href="route('admin.news.index')" :active="request()->routeIs('admin.news.index', 'admin.news.create', 'admin.news.edit')">
                    Kelola Berita
                </x-dropdown-link>
                <x-dropdown-link :href="route('admin.news-categories.index')" :active="request()->routeIs('admin.news-categories.*')">
                    Kategori Berita
                </x-dropdown-link>
            </div>
        </div>

        <div class="relative px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md cursor-pointer transition duration-150 ease-in-out"
            x-data="{ open: {{ request()->routeIs('admin.facilities.*', 'admin.achievements.*', 'admin.extracurriculars.*') ? 'true' : 'false' }} }" @click="open = !open">
            <div class="flex items-center justify-between">
                <span class="flex items-center">
                    <i class="fas fa-star w-5 h-5 mr-3"></i>
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
                <x-dropdown-link :href="route('admin.facilities.index')" :active="request()->routeIs('admin.facilities.*')">
                    Fasilitas dan Layanan
                </x-dropdown-link>
                <x-dropdown-link :href="route('admin.achievements.index')" :active="request()->routeIs('admin.achievements.*')">
                    Prestasi
                </x-dropdown-link>
                <x-dropdown-link :href="route('admin.extracurriculars.index')" :active="request()->routeIs('admin.extracurriculars.*')">
                    Ekstrakurikuler
                </x-dropdown-link>
            </div>
        </div>

        <div class="relative px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md cursor-pointer transition duration-150 ease-in-out"
            x-data="{ open: {{ request()->routeIs('admin.staff.*', 'admin.positions.*') ? 'true' : 'false' }} }" @click="open = !open">
            <div class="flex items-center justify-between">
                <span class="flex items-center">
                    <i class="fas fa-users w-5 h-5 mr-3"></i>
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
                <x-dropdown-link :href="route('admin.staff.index')" :active="request()->routeIs('admin.staff.*')">
                    Guru dan Pegawai
                </x-dropdown-link>
                <x-dropdown-link :href="route('admin.positions.index')" :active="request()->routeIs('admin.positions.*')">
                    Posisi
                </x-dropdown-link>
            </div>
        </div>

        <div class="relative px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md cursor-pointer transition duration-150 ease-in-out"
            x-data="{ open: {{ request()->routeIs('admin.external-service-links.*') ? 'true' : 'false' }} }" @click="open = !open">
            <div class="flex items-center justify-between">
                <span class="flex items-center">
                    <i class="fas fa-folder w-5 h-5 mr-3"></i>
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
                <x-dropdown-link :href="route('admin.external-service-links.index')" :active="request()->routeIs('admin.external-service-links.*')">
                    Link Layanan Eksternal
                </x-dropdown-link>
            </div>
        </div>

        <x-sidebar-link :href="route('admin.gallery-categories.index')" :active="request()->routeIs('admin.gallery-categories.*', 'admin.gallery-categories.galleries.*')">
            <x-slot name="icon">
                <i class="fas fa-image w-5 h-5"></i>
            </x-slot>
            Galeri
        </x-sidebar-link>

        <x-sidebar-link :href="route('admin.statistics.edit')" :active="request()->routeIs('admin.statistics.edit')">
            <x-slot name="icon">
                <i class="fas fa-chart-bar w-5 h-5"></i>
            </x-slot>
            Statistik
        </x-sidebar-link>
    </nav>

    @auth
        <div class="mt-auto pt-4 border-t border-gray-700">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-sidebar-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                    <x-slot name="icon">
                        <i class="fas fa-user w-5 h-5"></i>
                    </x-slot>
                    {{ __('Profile') }}
                </x-sidebar-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-sidebar-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        <x-slot name="icon">
                            <i class="fas fa-right-from-bracket w-5 h-5"></i>
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
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const sidebarBackdrop = document.getElementById('sidebar-backdrop');

            if (mobileMenuButton) {
                mobileMenuButton.addEventListener('click', function() {
                    sidebar.classList.toggle('-translate-x-full');
                    sidebarBackdrop.classList.toggle('hidden');
                    document.body.classList.toggle('overflow-hidden');
                });
            }

            sidebarBackdrop.addEventListener('click', function() {
                sidebar.classList.add('-translate-x-full');
                sidebarBackdrop.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            });

            window.addEventListener('resize', function() {
                if (window.innerWidth >= 768) {
                    sidebar.classList.remove('-translate-x-full');
                    sidebarBackdrop.classList.add('hidden');
                    document.body.classList.remove(
                        'overflow-hidden');
                } else {
                    if (!sidebar.classList.contains('-translate-x-full')) {
                        sidebar.classList.add('-translate-x-full');
                        sidebarBackdrop.classList.add('hidden');
                    }
                    document.body.classList.remove('overflow-hidden');
                }
            });
        });
    </script>
@endpush
