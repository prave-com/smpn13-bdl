<x-guest-layout>
    @include('layouts.navigation')

    @isset($header)
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <main class="w-full bg-gray-50 dark:bg-gray-900 py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto">
            <!-- Logo & Judul -->
            <div class="text-center mb-12">
                <img src="{{ asset('images/logo.png') }}" alt="Logo SMPN 13 Bandar Lampung"
                    class="mx-auto h-32 md:h-64 w-auto">
                <h1 class="text-3xl sm:text-4xl font-bold text-gray-800 dark:text-white mt-6">
                    Sambutan Kepala Sekolah
                </h1>
            </div>

            <!-- Foto Kepala Sekolah dan Sambutan -->
            <div class="flex flex-col md:flex-row gap-8 items-start mb-16">
                <div class="flex-shrink-0 mx-auto">
                    <img src="{{ asset('images/kepala-sekolah.jpeg') }}" alt="Foto Kepala Sekolah"
                        class="w-48 h-64 md:w-56 md:h-72 object-cover rounded-lg shadow-md border dark:border-gray-600">
                </div>
                <div class="flex-1 text-justify text-gray-700 dark:text-gray-300 text-lg leading-relaxed">
                    <p class="mb-4">
                        Assalamu’alaikum warahmatullahi wabarakatuh,
                    </p>
                    <p class="mb-4">
                        Puji syukur ke hadirat Allah SWT atas segala rahmat dan karunia-Nya, sehingga SMP Negeri 13
                        Bandar Lampung terus berkembang dalam memberikan layanan pendidikan terbaik kepada peserta
                        didik. Website ini kami hadirkan sebagai sarana informasi, komunikasi, dan promosi yang dapat
                        diakses oleh seluruh warga sekolah maupun masyarakat umum.
                    </p>
                    <p class="mb-4">
                        Kami berharap website ini dapat memberikan informasi yang akurat dan relevan mengenai kegiatan,
                        program, prestasi, dan berbagai layanan yang ada di SMP Negeri 13 Bandar Lampung. Hal ini
                        merupakan bentuk komitmen kami dalam mewujudkan transparansi dan akuntabilitas publik, serta
                        mendukung keterbukaan informasi pendidikan.
                    </p>
                    <p class="mb-4">
                        Besar harapan kami, semua pihak dapat bersinergi dan berkontribusi aktif demi kemajuan sekolah
                        ini. Semoga keberadaan website ini semakin meningkatkan kualitas komunikasi dan memberikan
                        manfaat yang luas bagi seluruh pengguna.
                    </p>
                    <p class="mb-4">
                        Wassalamu’alaikum warahmatullahi wabarakatuh.
                    </p>
                    <div class="mt-6">
                        <p class="font-semibold text-gray-800 dark:text-white">Kepala Sekolah</p>
                        <p class="text-gray-700 dark:text-gray-300">Hj. Amaroh, S.Pd., M.M</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <x-footer />
</x-guest-layout>
