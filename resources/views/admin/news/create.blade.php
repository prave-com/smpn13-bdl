<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Berita Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- Hapus enctype="multipart/form-data" jika form ini tidak lagi upload file non-CKEditor --}}
                    {{-- Tapi untuk jaga-jaga (jika nanti ada fitur upload lain), bisa tetap dipertahankan --}}
                    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <x-input-label for="title" :value="__('Judul Berita')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                :value="old('title')" required autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="slug" :value="__('Slug (URL Friendly)')" />
                            <x-text-input id="slug" class="block mt-1 w-full" type="text" name="slug"
                                :value="old('slug')" required />
                            <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Gunakan huruf kecil, angka, dan
                                hyphen (-). Contoh: judul-berita-anda</p>
                        </div>

                        <div class="mb-4">
                            <x-input-label for="news_category_id" :value="__('Kategori Berita')" />
                            <select id="news_category_id" name="news_category_id"
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                                required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('news_category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('news_category_id')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="published_at" :value="__('Tanggal Publikasi (Opsional)')" />
                            <x-text-input id="published_at" class="block mt-1 w-full" type="datetime-local"
                                name="published_at" :value="old('published_at')" />
                            <x-input-error :messages="$errors->get('published_at')" class="mt-2" />
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Jika kosong, berita tidak akan
                                ditampilkan di publik sampai diatur tanggalnya.</p>
                        </div>

                        <div class="mb-4">
                            <x-input-label for="content" :value="__('Konten Berita')" />
                            {{-- ID 'content' ini yang akan diinisialisasi oleh CKEditor --}}
                            <textarea id="content" name="content"
                                class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('content') }}</textarea>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>

                        {{-- HAPUS BAGIAN INI: Gambar Berita (Bisa Pilih Beberapa) --}}
                        {{-- <div class="mb-4">
                            <x-input-label for="images" :value="__('Gambar Berita (Bisa Pilih Beberapa)')" />
                            <input id="images"
                                class="block mt-1 w-full text-sm text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-700 rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 focus:outline-none"
                                type="file" name="images[]" multiple accept="image/*">
                            <x-input-error :messages="$errors->get('images.*')" class="mt-2" />
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Format: JPG, PNG, GIF, SVG. Max 2MB
                                per gambar.</p>
                        </div> --}}

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Simpan Berita') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        {{-- Vite (Modern Laravel) --}}
        @vite('resources/js/ckeditor_initializer.js')

        <script>
            // Auto-generate slug from title
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
