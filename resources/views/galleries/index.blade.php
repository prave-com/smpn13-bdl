<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight dark:text-white">
            {{ $galleryCategory->name }}
        </h2>
    </x-slot>

    <div class="p-4">
        <form method="POST" action="{{ route('gallery-categories.galleries.store', $galleryCategory->slug) }}"
            enctype="multipart/form-data">
            @csrf
            <input type="file" name="images[]" multiple required
                class="mb-4 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-gray-700 dark:file:text-gray-300 dark:hover:file:bg-gray-600" />
            <x-primary-button>Upload</x-primary-button>
        </form>

        <div class="mt-6 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
            @forelse($galleries as $gallery)
                <div class="relative group">
                    <img src="{{ route('galleries.image.show', $gallery) }}" alt="Gallery Image"
                        class="rounded-lg w-full h-32 object-cover">

                    <form method="POST" action="{{ route('galleries.destroy', $gallery) }}"
                        class="absolute top-1 right-1 hidden group-hover:block">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-white bg-red-500 rounded-full px-2 py-1 hover:bg-red-600">×</button>
                    </form>
                </div>
            @empty
                <p class="text-gray-600 dark:text-gray-300 col-span-full text-center">Belum ada gambar.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
