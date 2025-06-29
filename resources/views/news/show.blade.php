<x-guest-layout>
    @include('components.navbar')

    <main class="w-full bg-gray-50 dark:bg-gray-900 py-16 px-4 sm:px-6 lg:px-8">
        <article class="max-w-3xl mx-auto dark:text-gray-200">

            {{-- Article Header (Title and Meta Info) --}}
            <header class="mb-10">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold leading-tight text-[#1B1B18] dark:text-white">
                    {{-- Removed text-center from here --}}
                    {{ $news->title }}
                </h1>
                {{-- Meta information block --}}
                <div
                    class="mt-6 flex flex-wrap justify-center sm:justify-start items-center gap-x-2 text-base text-gray-600 dark:text-gray-400">
                    {{-- Category (acting as the 'author context' in Medium's design) --}}
                    <p class="font-medium text-[#1D6F42] dark:text-[#28a745]">
                        {{ $news->category->name ?? 'Tanpa Kategori' }}
                    </p>
                    <span class="text-gray-400 dark:text-gray-600">&bull;</span> {{-- Separator --}}

                    {{-- Reading time --}}
                    <p>
                        {{ $readingTime }} min read
                    </p>
                    <span class="text-gray-400 dark:text-gray-600">&bull;</span> {{-- Separator --}}

                    {{-- Published Date --}}
                    <p>
                        <time
                            datetime="{{ $news->published_at ? \Carbon\Carbon::parse($news->published_at)->toIso8601String() : '' }}">
                            {{ $news->published_at ? \Carbon\Carbon::parse($news->published_at)->isoFormat('MMM D,YYYY') : 'Tanggal Tidak Tersedia' }}
                        </time>
                    </p>
                </div>
            </header>

            {{-- Article Content --}}
            <div
                class="prose dark:prose-invert max-w-none text-gray-800 dark:text-gray-200 lg:prose-lg xl:prose-xl mx-auto">
                {!! $news->content !!}
            </div>

            {{-- Back Button --}}
            <div class="mt-16 text-center">
                <a href="{{ route('news.index') }}"
                    class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full shadow-sm text-white bg-[#1D6F42] hover:bg-[#1A5C37] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1D6F42] transition-colors duration-200">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Berita
                </a>
            </div>
        </article>
    </main>

    <x-footer />
</x-guest-layout>
