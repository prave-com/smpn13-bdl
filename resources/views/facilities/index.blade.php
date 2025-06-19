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
                        <div class="bg-green-500 text-white p-2 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-4 gap-2 flex flex-col-reverse md:flex-row justify-between items-center">
                        <form action="{{ route('facilities.index') }}" method="GET" class="w-full max-w-sm">
                            <div class="flex items-center space-x-2">
                                <input type="text" name="search" value="{{ request()->search }}"
                                    placeholder="Cari fasilitas..."
                                    class="block w-full px-4 py-2 border rounded-md shadow-sm dark:bg-gray-700 dark:text-white">
                                <button type="submit"
                                    class="bg-gray-200 p-2 rounded-md hover:bg-gray-300 dark:bg-gray-600 dark:hover:bg-gray-500">
                                    <i class="fa fa-search text-gray-700 dark:text-gray-200 px-2"></i>
                                </button>
                            </div>
                        </form>
                        <a href="{{ route('facilities.create') }}"
                            class="w-full md:w-fit bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline flex items-center justify-center space-x-2">
                            <i class="fa fa-plus"></i>
                            <span>Tambah Fasilitas Baru</span>
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 border-b text-left">Nama</th>
                                    <th class="px-4 py-2 border-b text-left">Deskripsi</th>
                                    <th class="px-4 py-2 border-b text-left">Gambar</th>
                                    <th class="px-4 py-2 border-b text-left">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($facilities as $facility)
                                    <tr>
                                        <td class="px-4 py-2 border-b break-all">
                                            {{ Str::limit($facility->name, 50) }}
                                        </td>
                                        <td class="px-4 py-2 border-b break-all">
                                            {{ Str::limit($facility->description, 50) }}
                                        </td>
                                        <td class="px-4 py-2 border-b">
                                            <div class="flex flex-wrap flex-col gap-2 md:flex-row">
                                                {{-- Gambar 1 --}}
                                                @if ($facility->image1)
                                                    <img src="{{ asset('storage/' . $facility->image1) }}"
                                                        alt="Gambar 1"
                                                        class="w-16 h-16 md:w-24 md:h-24 object-cover rounded">
                                                @endif

                                                {{-- Gambar 2 --}}
                                                @if ($facility->image2)
                                                    <img src="{{ asset('storage/' . $facility->image2) }}"
                                                        alt="Gambar 2"
                                                        class="w-16 h-16 md:w-24 md:h-24 object-cover rounded">
                                                @endif

                                                {{-- Gambar 3 --}}
                                                @if ($facility->image3)
                                                    <img src="{{ asset('storage/' . $facility->image3) }}"
                                                        alt="Gambar 3"
                                                        class="w-16 h-16 md:w-24 md:h-24 object-cover rounded">
                                                @endif

                                                {{-- Gambar 4 --}}
                                                @if ($facility->image4)
                                                    <img src="{{ asset('storage/' . $facility->image4) }}"
                                                        alt="Gambar 4"
                                                        class="w-16 h-16 md:w-24 md:h-24 object-cover rounded">
                                                @endif

                                                {{-- Gambar 5 --}}
                                                @if ($facility->image5)
                                                    <img src="{{ asset('storage/' . $facility->image5) }}"
                                                        alt="Gambar 5"
                                                        class="w-16 h-16 md:w-24 md:h-24 object-cover rounded">
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-4 py-2 border-b">
                                            <div
                                                class="flex flex-col md:flex-row md:items-center md:space-x-2 space-y-1 md:space-y-0">
                                                <a href="{{ route('facilities.edit', $facility) }}"
                                                    class="text-yellow-500 hover:text-yellow-700 flex items-center space-x-1">
                                                    <i class="fa fa-edit"></i>
                                                    <span>Edit</span>
                                                </a>
                                                <form action="{{ route('facilities.destroy', $facility) }}"
                                                    method="POST" class="inline-block"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus fasilitas ini?')">
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $facilities->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
