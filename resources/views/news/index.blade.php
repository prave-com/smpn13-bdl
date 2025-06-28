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
                        <x-news-card :news="$newsItem" />
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
