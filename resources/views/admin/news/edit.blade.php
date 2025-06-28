<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Berita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="title" :value="__('Judul Berita')" />
                                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                    :value="old('title', $news->title)" required autofocus />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="slug" :value="__('Slug (URL Friendly)')" />
                                <x-text-input id="slug" class="block mt-1 w-full" type="text" name="slug"
                                    :value="old('slug', $news->slug)" required />
                                <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Gunakan huruf kecil, angka, dan
                                    hyphen (-).</p>
                            </div>

                            <div>
                                <x-input-label for="news_category_id" :value="__('Kategori Berita')" />
                                <select id="news_category_id" name="news_category_id"
                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                                    required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('news_category_id', $news->news_category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('news_category_id')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="published_at" :value="__('Tanggal Publikasi (Opsional)')" />
                                <x-text-input id="published_at" class="block mt-1 w-full" type="datetime-local"
                                    name="published_at" :value="old(
                                        'published_at',
                                        $news->published_at ? $news->published_at->format('Y-m-d\TH:i') : '',
                                    )" />
                                <x-input-error :messages="$errors->get('published_at')" class="mt-2" />
                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Jika kosong, berita tidak akan
                                    ditampilkan di publik sampai diatur tanggalnya.</p>
                            </div>
                        </div>

                        <div class="mt-6 mb-4">
                            <x-input-label for="content" :value="__('Konten Berita')" />
                            <textarea id="content" name="content"
                                class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                style="min-height: 400px;" {{-- Tambahkan min-height di sini --}}>{{ old('content', $news->content) }}</textarea>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <x-primary-button>
                                {{ __('Perbarui Berita') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        @vite('resources/js/ckeditor_initializer.js')
        <script>
            document.getElementById('title').addEventListener('keyup', function() {
                let title = this.value;
                let slug = title.toLowerCase()
                    .replace(/[^a-z0-9\s-]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-');
                document.getElementById('slug').value = slug;
            });
        </script>
    @endpush
</x-app-layout>
