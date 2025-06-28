<x-guest-layout>
    @include('components.navbar')

    <main class="w-full bg-gray-50 dark:bg-gray-900 py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8">
            <h1 class="text-3xl sm:text-4xl font-bold text-[#1B1B18] dark:text-white mb-4">
                {{ $news->title }}
            </h1>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                <span class="font-medium">{{ $news->category->name ?? 'Tanpa Kategori' }}</span>
                | Dipublikasi pada:
                {{ $news->published_at ? \Carbon\Carbon::parse($news->published_at)->locale('id')->isoFormat('dddd, D MMMM YYYY, HH:mm') : 'Tanggal Tidak Tersedia' }}
            </p>

            {{-- HAPUS BAGIAN INI KARENA GAMBAR SEKARANG DIKELOLA OLEH CKEDITOR DI DALAM KONTEN --}}
            {{-- @if ($news->images->count() > 0)
                <div class="mb-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($news->images as $image)
                        <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $news->title }}"
                            class="w-full h-48 object-cover rounded-lg shadow-md">
                    @endforeach
                </div>
            @endif --}}

            <div class="prose dark:prose-invert max-w-none text-gray-800 dark:text-gray-200">
                {{-- Konten berita yang berasal dari CKEditor akan dirender di sini --}}
                {{-- Penting: Gunakan {!! !!} untuk merender HTML dari database.
                     Pastikan hanya admin terpercaya yang bisa memasukkan konten HTML untuk menghindari XSS. --}}
                {!! $news->content !!}
            </div>

            <div class="mt-8 text-center">
                <a href="{{ route('news.index') }}"
                    class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-[#1D6F42] hover:bg-[#1A5C37] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1D6F42] transition-colors duration-200">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Berita
                </a>
            </div>
        </div>
    </main>

    <x-footer />
</x-guest-layout>
