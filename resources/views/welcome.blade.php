<x-guest-layout>
    @include('layouts.navigation')

    <!-- Page Heading -->
    @isset($header)
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <main class="w-full">
        <section class="py-16 px-4 sm:px-6 lg:px-8 w-full mx-auto dark:bg-gray-950 shadow-inner">
            <div class="flex flex-col-reverse lg:flex-row items-center justify-between gap-12 max-w-7xl mx-auto">
                <!-- Text Section -->
                <div class="w-full lg:w-1/2 text-center lg:text-left px-4 sm:px-8 lg:px-12">
                    <h1
                        class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-[#1B1B18] dark:text-white mb-4 leading-tight">
                        Pintar Bersama <br>
                        <span class="text-yellow-500">PinterIn</span>
                    </h1>
                    <p class="text-base sm:text-lg text-gray-700 dark:text-gray-300 mb-6">
                        Belajar skill baru secara online dan fleksibel melalui kursus-kursus yang kami berikan
                    </p>
                </div>

                <!-- Image Section -->
                <div class="w-full lg:w-1/2">
                    <img src="{{ asset('images/hero-illustration.png') }}" alt="Online Learning Illustration"
                        class="w-full h-auto max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg xl:max-w-xl mx-auto drop-shadow-xl">
                </div>
            </div>
        </section>
    </main>

    <x-footer />

</x-guest-layout>
