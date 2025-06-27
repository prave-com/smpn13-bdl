<x-guest-layout>
    @include('components.navbar')

    <main class="w-full bg-gray-50 dark:bg-gray-900 py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <h1 class="text-3xl sm:text-4xl font-bold text-[#1B1B18] dark:text-white">Berita Sekolah</h1>
                <p class="mt-2 text-lg text-gray-700 dark:text-gray-300">Temukan informasi dan update terbaru dari SMP
                    Negeri 13 Bandar Lampung.</p>
            </div>

            @if ($allNews->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($allNews as $newsItem)
                        <div
                            class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 h-full flex flex-col">
                            <a href="{{ route('news.show', $newsItem->slug) }}" class="block">
                                @if ($newsItem->images->first())
                                    <img src="{{ asset($newsItem->images->first()->image) }}"
                                        alt="{{ $newsItem->title }}" class="w-full h-56 object-cover">
                                @else
                                    <img src="{{ asset('images/default-news.jpg') }}" alt="Default News Image"
                                        class="w-full h-56 object-cover">
                                @endif
                                <div class="p-6 flex flex-col flex-grow">
                                    <span
                                        class="text-sm font-medium text-[#1D6F42] dark:text-green-300 mb-2 uppercase">{{ $newsItem->category->name ?? 'Tanpa Kategori' }}</span>
                                    <h3 class="text-xl font-semibold text-[#1B1B18] dark:text-white mb-2 leading-tight">
                                        {{ Str::limit($newsItem->title, 80) }}
                                    </h3>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">
                                        {{ $newsItem->published_at ? \Carbon\Carbon::parse($newsItem->published_at)->locale('id')->isoFormat('D MMMM Y') : 'Tanggal Tidak Tersedia' }}
                                    </p>
                                    <p class="text-gray-700 dark:text-gray-300 text-sm flex-grow line-clamp-3">
                                        {{ Str::limit(strip_tags($newsItem->content), 150) }}
                                    </p>
                                    <div class="mt-4 text-left">
                                        <span
                                            class="text-[#1D6F42] hover:text-[#1A5C37] font-medium text-sm inline-flex items-center">
                                            Baca Selengkapnya
                                            <i class="fas fa-arrow-right ml-1 text-xs"></i>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="mt-10">
                    {{ $allNews->links() }}
                </div>
            @else
                <p class="text-center text-gray-600 dark:text-gray-300 text-lg">Belum ada berita yang dipublikasi.</p>
            @endif
        </div>
    </main>

    <x-footer />
</x-guest-layout>
