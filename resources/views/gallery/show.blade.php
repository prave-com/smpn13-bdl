<x-guest-layout>
    @include('layouts.navigation')

    {{-- Header with Breadcrumb --}}
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{-- Breadcrumb Navigation --}}
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li>
                        <a href="{{ route('gallery.index') }}"
                            class="text-sm font-medium text-gray-700 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-white">
                            Galeri
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fa fa-angle-right text-gray-400 mx-2"></i> {{-- Font Awesome Angle Right --}}
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-500">
                                {{ $galleryCategory->name }}
                            </span>
                        </div>
                    </li>
                </ol>
            </nav>

            {{-- Page Title --}}
            <div class="text-center mt-6">
                <h1 class="text-3xl sm:text-4xl font-bold text-gray-800 dark:text-white">
                    Galeri: {{ $galleryCategory->name }}
                </h1>
                <p class="mt-2 text-lg text-gray-600 dark:text-gray-300">
                    Menampilkan semua gambar untuk kategori "{{ $galleryCategory->name }}".
                </p>
            </div>
        </div>
    </header>

    <main class="w-full bg-gray-50 dark:bg-gray-900 py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($galleryCategory->galleries as $gallery)
                <div
                    class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden transform transition-transform duration-300 hover:scale-105 hover:shadow-xl">
                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $galleryCategory->name }}"
                        class="w-full h-64 object-cover" loading="lazy">
                    {{-- If you want a small caption below each image, you can add it here --}}
                    {{-- <div class="p-2">
                        <p class="text-xs text-gray-600 dark:text-gray-400">
                            {{ $galleryCategory->name }}
                        </p>
                    </div> --}}
                </div>
            @empty
                <div class="col-span-full text-center py-10">
                    <p class="text-gray-600 dark:text-gray-400 text-lg">Tidak ada gambar untuk kategori ini.</p>
                </div>
            @endforelse
        </div>
    </main>

    <x-footer />
</x-guest-layout>
