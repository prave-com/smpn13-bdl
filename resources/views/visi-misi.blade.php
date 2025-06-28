<x-guest-layout>
    @include('components.navbar')

    @isset($header)
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <main class="w-full bg-gray-50 dark:bg-gray-900 py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto">
            <div class="text-center mb-12">
                <img src="{{ asset('images/logo.png') }}" alt="Logo SMPN 13 Bandar Lampung"
                    class="mx-auto h-32 md:h-64 w-auto">
                <h1 class="text-3xl sm:text-4xl font-bold text-gray-800 dark:text-white mt-6">VISI & MISI</h1>
            </div>

            <section class="mb-16">
                <h2
                    class="text-2xl font-semibold text-gray-800 dark:text-gray-100 border-b-2 border-green-500 inline-block pb-1 mb-4">
                    Visi
                </h2>
                <p class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed">
                    Terwujudnya Sekolah Madani
                </p>
            </section>

            <section class="mb-16">
                <h2
                    class="text-2xl font-semibold text-gray-800 dark:text-gray-100 border-b-2 border-green-500 inline-block pb-1 mb-4">
                    Misi
                </h2>
                <ul class="list-decimal pl-6 text-lg text-gray-700 dark:text-gray-300 space-y-2">
                    <li>Membina insan beriman dan bertakwa</li>
                    <li>Aman, damai dan cinta alam</li>
                    <li>Disiplin, terampil dan berprestasi</li>
                    <li>Aktif, kreatif dan berkualitas</li>
                    <li>Normatif, kooperatif dan bersahaja</li>
                    <li>Inovatif, ikhlas dan istiqomah</li>
                </ul>
            </section>
        </div>
    </main>

    <x-footer />
</x-guest-layout>
