<x-app-layout>
    <x-slot name="header">
        Kategori Galeri
    </x-slot>

    <div class="md:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('success'))
                        <div class="bg-green-500 text-white p-2 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-4 gap-2 flex flex-col-reverse md:flex-row justify-between items-center">
                        <form action="{{ route('admin.gallery-categories.index') }}" method="GET"
                            class="w-full max-w-sm">
                            <div class="flex items-center space-x-2">
                                <input type="text" name="search" value="{{ request()->search }}"
                                    placeholder="Cari kategori galeri..."
                                    class="block w-full px-4 py-2 border rounded-md shadow-sm dark:bg-gray-700 dark:text-white">
                                <button type="submit"
                                    class="bg-gray-200 p-2 rounded-md hover:bg-gray-300 dark:bg-gray-600 dark:hover:bg-gray-500">
                                    <i class="fa fa-search text-gray-700 dark:text-gray-200 px-2"></i>
                                </button>
                            </div>
                        </form>
                        <a href="{{ route('admin.gallery-categories.create') }}"
                            class="w-full md:w-fit bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline flex items-center justify-center space-x-2">
                            <i class="fa fa-plus"></i>
                            <span>Tambah Kategori Galeri Baru</span>
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 border-b text-left">Nama</th>
                                    <th class="px-4 py-2 border-b text-left">Slug</th>
                                    <th class="px-4 py-2 border-b text-left">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($galleryCategories as $galleryCategory)
                                    <tr>
                                        <td class="px-4 py-2 border-b break-all md:hidden">
                                            {{ Str::limit($galleryCategory->name, 25) }}</td>
                                        <td class="px-4 py-2 border-b break-all hidden md:table-cell">
                                            {{ Str::limit($galleryCategory->name, 50) }}</td>
                                        <td class="px-4 py-2 border-b break-all md:hidden">
                                            {{ Str::limit($galleryCategory->slug, 25) }}
                                        <td class="px-4 py-2 border-b break-all hidden md:table-cell">
                                            {{ Str::limit($galleryCategory->slug, 50) }}
                                        </td>
                                        <td class="px-4 py-2 border-b">
                                            <div
                                                class="flex flex-col md:flex-row md:items-center md:space-x-2 space-y-1 md:space-y-0">
                                                <a href="{{ route('admin.gallery-categories.galleries.index', $galleryCategory) }}"
                                                    class="text-blue-500 hover:text-blue-700 flex items-center space-x-1">
                                                    <i class="fa fa-image"></i>
                                                    <span>View</span>
                                                </a>
                                                <a href="{{ route('admin.gallery-categories.edit', $galleryCategory) }}"
                                                    class="text-yellow-500 hover:text-yellow-700 flex items-center space-x-1">
                                                    <i class="fa fa-edit"></i>
                                                    <span>Edit</span>
                                                </a>
                                                <form
                                                    action="{{ route('admin.gallery-categories.destroy', $galleryCategory) }}"
                                                    method="POST" class="inline-block"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori galeri ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-red-500 hover:text-red-700 flex items-center space-x-1">
                                                        <i class="fa fa-trash"></i>
                                                        <span>Hapus</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3"
                                            class="px-4 py-2 text-center text-gray-500 dark:text-gray-400">
                                            Tidak ada kategori galeri ditemukan.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{ $galleryCategories->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
