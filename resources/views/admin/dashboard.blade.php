<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Admin
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center justify-between">
                    <div>
                        <div class="text-gray-500 text-sm font-medium">Jumlah Siswa</div>
                        <div class="text-3xl font-bold text-gray-900 mt-2">
                            {{ $statistic->students_count }}
                        </div>
                    </div>
                    <div class="text-blue-500">
                        <i class="fas fa-user-graduate fa-3x"></i>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center justify-between">
                    <div>
                        <div class="text-gray-500 text-sm font-medium">Jumlah Guru</div>
                        <div class="text-3xl font-bold text-gray-900 mt-2">
                            {{ $statistic->teachers_count }}
                        </div>
                    </div>
                    <div class="text-green-500">
                        <i class="fas fa-chalkboard-teacher fa-3x"></i>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center justify-between">
                    <div>
                        <div class="text-gray-500 text-sm font-medium">Jumlah Staff</div>
                        <div class="text-3xl font-bold text-gray-900 mt-2">
                            {{ $statistic->staff_count }}
                        </div>
                    </div>
                    <div class="text-teal-500">
                        <i class="fas fa-user-tie fa-3x"></i>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center justify-between">
                    <div>
                        <div class="text-gray-500 text-sm font-medium">Jumlah Alumni</div>
                        <div class="text-3xl font-bold text-gray-900 mt-2">
                            {{ $statistic->alumni_count }}
                        </div>
                    </div>
                    <div class="text-indigo-500">
                        <i class="fas fa-graduation-cap fa-3x"></i>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center justify-between">
                    <div>
                        <div class="text-gray-500 text-sm font-medium">Jumlah Berita</div>
                        <div class="text-3xl font-bold text-gray-900 mt-2">
                            {{ $newsCount }}
                        </div>
                    </div>
                    <div class="text-orange-500">
                        <i class="fas fa-newspaper fa-3x"></i>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center justify-between">
                    <div>
                        <div class="text-gray-500 text-sm font-medium">Jumlah Kategori Berita</div>
                        <div class="text-3xl font-bold text-gray-900 mt-2">
                            {{ $newsCategoryCount }}
                        </div>
                    </div>
                    <div class="text-yellow-500">
                        <i class="fas fa-list-alt fa-3x"></i>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center justify-between">
                    <div>
                        <div class="text-gray-500 text-sm font-medium">Jumlah Galeri</div>
                        <div class="text-3xl font-bold text-gray-900 mt-2">
                            {{ $galleryCount }}
                        </div>
                    </div>
                    <div class="text-purple-500">
                        <i class="fas fa-image fa-3x"></i>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center justify-between">
                    <div>
                        <div class="text-gray-500 text-sm font-medium">Jumlah Kategori Galeri</div>
                        <div class="text-3xl font-bold text-gray-900 mt-2">
                            {{ $galleryCategoryCount }}
                        </div>
                    </div>
                    <div class="text-pink-500">
                        <i class="fas fa-images fa-3x"></i>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center justify-between">
                    <div>
                        <div class="text-gray-500 text-sm font-medium">Jumlah Fasilitas</div>
                        <div class="text-3xl font-bold text-gray-900 mt-2">
                            {{ $facilityCount }}
                        </div>
                    </div>
                    <div class="text-red-500">
                        <i class="fas fa-cogs fa-3x"></i>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center justify-between">
                    <div>
                        <div class="text-gray-500 text-sm font-medium">Jumlah Prestasi</div>
                        <div class="text-3xl font-bold text-gray-900 mt-2">
                            {{ $achievementCount }}
                        </div>
                    </div>
                    <div class="text-teal-500">
                        <i class="fas fa-trophy fa-3x"></i>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center justify-between">
                    <div>
                        <div class="text-gray-500 text-sm font-medium">Jumlah Link Eksternal</div>
                        <div class="text-3xl font-bold text-gray-900 mt-2">
                            {{ $externalLinkCount }}
                        </div>
                    </div>
                    <div class="text-blue-500">
                        <i class="fas fa-link fa-3x"></i>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center justify-between">
                    <div>
                        <div class="text-gray-500 text-sm font-medium">Jumlah Ekstrakurikuler</div>
                        <div class="text-3xl font-bold text-gray-900 mt-2">
                            {{ $extracurricularCount }}
                        </div>
                    </div>
                    <div class="text-indigo-500">
                        <i class="fas fa-futbol fa-3x"></i>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center justify-between">
                    <div>
                        <div class="text-gray-500 text-sm font-medium">Jumlah Posisi</div>
                        <div class="text-3xl font-bold text-gray-900 mt-2">
                            {{ $positionCount }}
                        </div>
                    </div>
                    <div class="text-gray-500">
                        <i class="fas fa-clipboard-list fa-3x"></i>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center justify-between">
                    <div>
                        <div class="text-gray-500 text-sm font-medium">Jumlah Staff</div>
                        <div class="text-3xl font-bold text-gray-900 mt-2">
                            {{ $staffCount }}
                        </div>
                    </div>
                    <div class="text-gray-500">
                        <i class="fas fa-users fa-3x"></i>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
