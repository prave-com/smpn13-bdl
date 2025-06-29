<x-guest-layout>
    @include('components.navbar')

    <main class="w-full bg-gray-50 dark:bg-gray-900 py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <h1 class="text-3xl sm:text-4xl font-bold text-[#1B1B18] dark:text-white">
                    {{ $category->name ?? 'Berita Sekolah' }}
                </h1>
                <p class="mt-2 text-lg text-gray-700 dark:text-gray-300">Temukan informasi dan update terbaru dari SMP
                    Negeri 13 Bandar Lampung.</p>
            </div>

            {{-- Main Content and Sidebar Layout --}}
            <div class="flex flex-col lg:flex-row gap-8">
                {{-- Main News Content --}}
                <div class="w-full lg:w-3/4">
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
                        <p class="text-center text-gray-600 dark:text-gray-300 text-lg">Belum ada berita ditemukan.</p>
                    @endif
                </div>

                {{-- Sidebar Section --}}
                <div class="w-full lg:w-1/4 space-y-8">
                    {{-- Pencarian --}}
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                        <h3
                            class="text-xl font-semibold text-[#1B1B18] dark:text-white mb-4 border-b pb-2 border-gray-200 dark:border-gray-700">
                            Pencarian
                        </h3>
                        <form method="GET" action="{{ url()->current() }}">
                            <input type="text" name="search" placeholder="Search ..." value="{{ $search }}"
                                class="w-full px-4 py-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1D6F42]">
                        </form>
                    </div>

                    {{-- Kategori --}}
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                        <h3
                            class="text-xl font-semibold text-[#1B1B18] dark:text-white mb-4 border-b pb-2 border-gray-200 dark:border-gray-700">
                            Kategori
                        </h3>
                        <ul class="space-y-3">
                            <li>
                                <a href="{{ route('news.index') }}"
                                    class="text-gray-700 dark:text-gray-300 hover:text-[#1D6F42] dark:hover:text-[#1D6F42] flex justify-between items-center {{ !isset($category) ? 'font-medium text-[#1D6F42]' : '' }}">
                                    Semua
                                    {{-- You'll need to pass the total news count to the view to display it here --}}
                                    <span>({{ $totalNewsCount ?? $allNews->total() }})</span>
                                </a>
                            </li>
                            @foreach ($categories as $cat)
                                <li>
                                    <a href="{{ route('news.category', $cat->slug) }}"
                                        class="text-gray-700 dark:text-gray-300 hover:text-[#1D6F42] dark:hover:text-[#1D6F42] flex justify-between items-center {{ isset($category) && $cat->id === $category->id ? 'font-medium text-[#1D6F42]' : '' }}">
                                        {{ $cat->name }}
                                        <span>({{ $cat->news_count }})</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <x-footer />
</x-guest-layout>
