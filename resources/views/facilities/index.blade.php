<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Fasilitas
        </h2>
    </x-slot>

    <div class="md:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('success'))
                        <div class="bg-green-500 text-white p-4 rounded-lg mb-6 shadow-md" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-6 flex flex-col md:flex-row justify-between items-center gap-4">
                        <form action="{{ route('facilities.index') }}" method="GET" class="w-full md:w-1/2 lg:w-1/3">
                            <div class="flex items-center space-x-2">
                                <input type="text" name="search" value="{{ request()->search }}"
                                    placeholder="Cari fasilitas..."
                                    class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                <button type="submit"
                                    class="flex-shrink-0 bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 dark:bg-blue-700 dark:hover:bg-blue-600 transition duration-150 ease-in-out">
                                    <i class="fa fa-search px-1"></i>
                                </button>
                            </div>
                        </form>
                        <a href="{{ route('facilities.create') }}"
                            class="w-full md:w-auto bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 flex items-center justify-center space-x-2 transition duration-150 ease-in-out">
                            <i class="fa fa-plus"></i>
                            <span>Tambah Fasilitas Baru</span>
                        </a>
                    </div>

                    {{-- Responsive Table Wrapper --}}
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Nama</th>
                                    <th scope="col" class="px-6 py-3 hidden md:table-cell">Deskripsi</th>
                                    <th scope="col" class="px-6 py-3">Gambar</th>
                                    <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($facilities as $facility)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td
                                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-normal break-words">
                                            {{ $facility->name }}
                                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 md:hidden">
                                                {{ Str::limit($facility->description, 70) }}</p>
                                        </td>
                                        <td class="px-6 py-4 hidden md:table-cell whitespace-normal break-words">
                                            {{ Str::limit($facility->description, 100) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <img src="{{ route('facilities.image.show', $facility) }}"
                                                alt="{{ $facility->name }}"
                                                class="w-16 h-16 md:w-24 md:h-24 object-cover rounded-md shadow-sm">
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div
                                                class="flex flex-col space-y-2 items-center md:flex-row md:space-y-0 md:space-x-2">
                                                <a href="{{ route('facilities.edit', $facility) }}"
                                                    class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 transition duration-150 ease-in-out flex items-center space-x-1">
                                                    <i class="fa fa-edit"></i>
                                                    <span>Edit</span>
                                                </a>
                                                <form action="{{ route('facilities.destroy', $facility) }}"
                                                    method="POST" class="inline-block"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus fasilitas ini? Tindakan ini tidak dapat dibatalkan.')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 transition duration-150 ease-in-out flex items-center space-x-1">
                                                        <i class="fa fa-trash"></i>
                                                        <span>Hapus</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4"
                                            class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                            Tidak ada fasilitas yang ditemukan.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $facilities->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
