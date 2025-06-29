<x-guest-layout>
    @include('components.navbar')

    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Galeri Kami</h1>
            <p class="mt-2 text-lg text-gray-600 dark:text-gray-300">Jelajahi momen-momen berharga kami.</p>
        </div>
    </header>

    <main class="w-full bg-gray-50 dark:bg-gray-900 py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($galleryCategories as $category)
                <a href="{{ route('gallery.show', $category->slug) }}" class="block group">
                    <div
                        class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden transform transition-transform duration-300 hover:scale-105 hover:shadow-xl">
                        @if ($category->galleries->isNotEmpty())
                            <div class="swiper gallery-cover-slider w-full h-64 relative">
                                <div class="swiper-wrapper">
                                    @foreach ($category->galleries->take(5) as $gallery)
                                        <div class="swiper-slide">
                                            <img src="{{ asset('storage/' . $gallery->image) }}"
                                                alt="{{ $category->name }} - {{ $loop->iteration }}"
                                                class="w-full h-full object-cover" loading="lazy">
                                        </div>
                                    @endforeach
                                </div>
                                <div
                                    class="swiper-button-prev text-white group-hover:text-gray-800 transition-colors duration-300">
                                </div>
                                <div
                                    class="swiper-button-next text-white group-hover:text-gray-800 transition-colors duration-300">
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        @else
                            <div
                                class="w-full h-64 flex items-center justify-center bg-gray-200 dark:bg-gray-700 text-gray-500 dark:text-gray-400">
                                No Images
                            </div>
                        @endif
                        <div class="p-4">
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">
                                {{ $category->name }}
                            </h2>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                {{ $category->galleries->count() }} Foto
                            </p>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-full text-center py-10">
                    <p class="text-gray-600 dark:text-gray-400 text-lg">Tidak ada kategori galeri ditemukan.</p>
                </div>
            @endforelse
        </div>
    </main>

    <x-footer />
</x-guest-layout>
