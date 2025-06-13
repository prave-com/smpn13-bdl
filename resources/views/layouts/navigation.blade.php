<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 md:block hidden"> {{-- Mengganti bg-gray-900 dan border-gray-700 --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <div class="shrink-0 flex items-center">
                {{-- Logo aplikasi/nama di navigation bar ini sudah dihapus --}}
            </div>

            {{-- Link navigasi utama di tengah (Fitur Lain) sudah dihapus --}}
            <div class="hidden sm:flex sm:justify-center sm:grow">
                <div class="flex space-x-8">
                    {{-- Tidak ada lagi tautan di sini --}}
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                {{-- Mengganti warna teks dan hover --}}
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
            </div>

            {{-- Mobile menu button (hamburger) dari navigasi atas ini sudah dihapus --}}
        </div>
    </div>

    {{-- Responsive Navigation Menu sudah dihapus --}}
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden bg-white"> {{-- Mengganti bg-gray-900 --}}
        {{-- Konten di sini sudah dihapus --}}
    </div>
</nav>
