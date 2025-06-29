@props(['news'])

<a href="{{ route('news.show', [$news->category->slug, $news->slug]) }}"
    class="bg-white dark:bg-gray-700 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
    @if ($news->images->first())
        <img src="{{ asset('storage/' . $news->images->first()->image) }}" alt="{{ $news->title }}"
            class="w-full h-48 object-cover rounded-t-md">
    @else
        <img src="{{ asset('images/default-news.jpeg') }}" alt="Default News Image"
            class="w-full h-48 object-cover rounded-t-md">
    @endif

    <div class="p-5 flex flex-col flex-grow">
        <h3 class="text-xl font-semibold text-[#1B1B18] dark:text-white mb-2 leading-tight">
            {{ Str::limit($news->title, 70) }}
        </h3>
        <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
            {{ $news->published_at ? \Carbon\Carbon::parse($news->published_at)->locale('id')->isoFormat('D MMM Y, HH:mm') : 'Belum dipublikasi' }}
            | <span class="italic">{{ $news->category->name ?? 'Tanpa Kategori' }}</span>
        </p>
        <p class="text-gray-700 dark:text-gray-300 text-sm line-clamp-3 flex-grow">
            {{ Str::limit(strip_tags($news->content), 120) }}
        </p>

        {{-- The "Baca Selengkapnya" link can be removed or kept as a visual cue --}}
        <div class="mt-4 text-right">
            <span class="text-sm text-[#1D6F42] hover:text-[#1A5C37] font-medium">
                Baca Selengkapnya <i class="fas fa-arrow-right ml-1 text-xs"></i>
            </span>
        </div>
    </div>
</a>
