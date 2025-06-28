<x-app-layout>
    <x-slot name="header">
        Posisi
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
                        <form action="{{ route('admin.positions.index') }}" method="GET" class="w-full max-w-sm">
                            <div class="flex items-center space-x-2">
                                <input type="text" name="search" value="{{ request()->search }}"
                                    placeholder="Cari posisi..."
                                    class="block w-full px-4 py-2 border rounded-md shadow-sm dark:bg-gray-700 dark:text-white">
                                <button type="submit"
                                    class="bg-gray-200 p-2 rounded-md hover:bg-gray-300 dark:bg-gray-600 dark:hover:bg-gray-500">
                                    <i class="fa fa-search text-gray-700 dark:text-gray-200 px-2"></i>
                                </button>
                            </div>
                        </form>
                        @if ($canAddPosition)
                            <a href="{{ route('admin.positions.create') }}"
                                class="w-full md:w-fit bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline flex items-center justify-center space-x-2">
                                <i class="fa fa-plus"></i>
                                <span>Tambah Posisi Baru</span>
                            </a>
                        @endif
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 border-b text-left">Nama</th>
                                    <th class="px-4 py-2 border-b text-left">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="position-table-body">
                                @forelse ($positions as $position)
                                    <tr data-id="{{ $position->id }}">
                                        <td class="px-4 py-2 border-b break-all md:hidden">
                                            {{ Str::limit($position->name, 25) }}
                                        </td>
                                        <td class="px-4 py-2 border-b break-all hidden md:table-cell">
                                            {{ Str::limit($position->name, 50) }}
                                        </td>
                                        <td class="px-4 py-2 border-b">
                                            <div
                                                class="flex flex-col md:flex-row md:items-center md:space-x-2 space-y-1 md:space-y-0">
                                                <a href="{{ route('admin.positions.edit', $position) }}"
                                                    class="text-yellow-500 hover:text-yellow-700 flex items-center space-x-1">
                                                    <i class="fa fa-edit"></i>
                                                    <span>Edit</span>
                                                </a>
                                                <form action="{{ route('admin.positions.destroy', $position) }}"
                                                    method="POST" class="inline-block"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus posisi ini?')">
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
                                        <td colspan="2"
                                            class="px-4 py-2 text-center text-gray-500 dark:text-gray-400">
                                            Tidak ada posisi ditemukan.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const positionTableBody = document.getElementById('position-table-body');

                if (positionTableBody && typeof Sortable !== 'undefined') {
                    new Sortable(positionTableBody, {
                        animation: 150,
                        ghostClass: 'sortable-ghost',
                        onEnd: function(evt) {
                            const newOrder = [];
                            Array.from(positionTableBody.children).forEach((row, index) => {
                                const positionId = row.dataset.id;
                                newOrder.push({
                                    id: positionId,
                                    ordering: index
                                });
                                const orderingCell = row.querySelector('.js-ordering-cell');
                                if (orderingCell) {
                                    orderingCell.textContent = index;
                                }
                            });

                            fetch('{{ route('admin.positions.updateOrder') }}', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    body: JSON.stringify({
                                        positions: newOrder
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.message) {
                                        console.log(data.message);
                                    }
                                })
                                .catch(error => {
                                    console.error('Error updating position order:', error);
                                    alert('Gagal memperbarui urutan posisi.');
                                });
                        }
                    });
                } else if (!positionTableBody) {
                    console.error('Elemen #position-table-body tidak ditemukan.');
                } else if (typeof Sortable === 'undefined') {
                    console.error('Sortable.js tidak ditemukan. Pastikan telah diimpor dan dikompilasi.');
                }
            });
        </script>
        <style>
            .sortable-ghost {
                opacity: 0.4;
                background-color: #f3f4f6;
                border: 2px dashed #9ca3af;
            }
        </style>
    @endpush
</x-app-layout>
