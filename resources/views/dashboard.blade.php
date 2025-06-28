<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center justify-between">
                    <div>
                        <div class="text-gray-500 text-sm font-medium">Jumlah Guru</div>
                        <div class="text-3xl font-bold text-gray-900 mt-2">
                            120
                        </div>
                    </div>
                    <div class="text-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-10 h-10">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center justify-between">
                    <div>
                        <div class="text-gray-500 text-sm font-medium">Jumlah Artikel</div>
                        <div class="text-3xl font-bold text-gray-900 mt-2">
                            450
                        </div>
                    </div>
                    <div class="text-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-10 h-10">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18.75a2.25 2.25 0 01-2.25 2.25H12a2.25 2.25 0 01-2.25-2.25V5.625c0-.621.504-1.125 1.125-1.125H15.75c.621 0 1.125.504 1.125 1.125v1.5m0 0H21m-1.5 0H12" />
                        </svg>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center justify-between">
                    <div>
                        <div class="text-gray-500 text-sm font-medium">Jumlah Siswa</div>
                        <div class="text-3xl font-bold text-gray-900 mt-2">
                            1500
                        </div>
                    </div>
                    <div class="text-yellow-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-10 h-10">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 18.75c0-.621-.504-1.125-1.125-1.125H5.625c-.621 0-1.125.504-1.125 1.125v2.25c0 .621.504 1.125 1.125 1.125h11.25c.621 0 1.125-.504 1.125-1.125v-2.25zM15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3.75 3.75h.008v.008h-.008v-.008zm-4.5 0h.008v.008h-.008v-.008zm-9 0h.008v.008H4.5v-.008z" />
                        </svg>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center justify-between">
                    <div>
                        <div class="text-gray-500 text-sm font-medium">Pengunjung Bulan Ini</div>
                        <div class="text-3xl font-bold text-gray-900 mt-2">
                            7,890
                        </div>
                    </div>
                    <div class="text-purple-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-10 h-10">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center justify-between">
                    <div>
                        <div class="text-gray-500 text-sm font-medium">Agenda Mendatang</div>
                        <div class="text-3xl font-bold text-gray-900 mt-2">
                            12
                        </div>
                    </div>
                    <div class="text-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-10 h-10">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5" />
                        </svg>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
