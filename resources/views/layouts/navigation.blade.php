<nav x-data="{ open: false }" class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            {{-- Bagian Kiri: Tombol Hamburger Sidebar (Mobile) dan Judul Halaman --}}
            <div class="flex items-center">
                {{-- Tombol Hamburger Sidebar, hanya muncul di mobile --}}
                <button id="mobile-menu-button"
                    class="md:hidden p-2 text-gray-700 hover:text-gray-900 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                {{-- Judul Halaman (akan selalu terlihat di samping hamburger mobile atau di kiri di desktop) --}}
                @if (isset($header))
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight ms-3"> {{-- ms-3 untuk spasi --}}
                        {{ $header }}
                    </h2>
                @endif
            </div>

            {{-- Link navigasi utama di tengah (Fitur Lain) sudah dihapus --}}
            <div class="hidden sm:flex sm:justify-center sm:grow">
                <div class="flex space-x-8">
                    {{-- Tidak ada lagi tautan di sini --}}
                </div>
            </div>

            {{-- Bagian Kanan: Dropdown Profil & Logout (Hanya Desktop) DIHAPUS --}}
            {{-- <div class="hidden sm:flex sm:items-center">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth
            </div> --}}

            {{-- Hapus mobile navigation button bawaan Breeze karena sudah dipindahkan ke sidebar --}}
        </div>
    </div>

    {{-- Hapus Responsive Navigation Menu karena sudah dipindahkan ke sidebar --}}
</nav>
