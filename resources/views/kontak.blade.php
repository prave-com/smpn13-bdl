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
        <div class="max-w-5xl mx-auto animate-fade-in">
            <div class="text-center mb-12">
                <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white animate-slide-in-from-bottom">
                    Kontak SMPN 13 Bandar Lampung
                </h1>
                <p class="mt-2 text-lg text-gray-700 dark:text-gray-300 animate-fade-in delay-100">
                    Hubungi kami untuk informasi lebih lanjut
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
                <div class="space-y-6 animate-fade-in delay-150">
                    <div>
                        <h2 class="text-xl font-semibold text-green-700 dark:text-green-300">📍 Alamat Sekolah</h2>
                        <address class="text-gray-800 dark:text-gray-200 not-italic">
                            Jl. Marga No.57, Beringin Raya,<br>
                            Kec. Kemiling, Kota Bandar Lampung,<br>
                            Lampung 35155
                        </address>
                    </div>

                    <div>
                        <h2 class="text-xl font-semibold text-green-700 dark:text-green-300">📞 Telepon</h2>
                        <p class="text-gray-800 dark:text-gray-200">
                            (0721) 271054
                        </p>
                    </div>

                    <div>
                        <h2 class="text-xl font-semibold text-green-700 dark:text-green-300">✉️ Email</h2>
                        <p class="text-gray-800 dark:text-gray-200">
                            <a href="mailto:smpn13bdl@gmail.com"
                                class="text-green-600 hover:text-green-500 dark:text-green-400 dark:hover:text-green-300 underline">
                                smpn13bdl@gmail.com
                            </a>
                        </p>
                    </div>

                    <div>
                        <h2 class="text-xl font-semibold text-green-700 dark:text-green-300">🌐 Website</h2>
                        <p class="text-gray-800 dark:text-gray-200">
                            <a href="https://smpn13-bdl.sch.id" target="_blank" rel="noopener noreferrer"
                                class="text-green-600 hover:text-green-500 dark:text-green-400 dark:hover:text-green-300 underline">
                                smpn13-bdl.sch.id
                            </a>
                        </p>
                    </div>

                    <div class="pt-4 border-t border-gray-300 dark:border-gray-700">
                        <h2 class="text-xl font-semibold text-green-700 dark:text-green-300">📱 Media Sosial</h2>
                        <ul class="space-y-2 mt-2 text-gray-800 dark:text-gray-200">
                            <li>
                                <i class="fab fa-instagram text-pink-500 mr-2" aria-hidden="true"></i>
                                <a href="https://www.instagram.com/smpn13_bdl/" target="_blank"
                                    rel="noopener noreferrer"
                                    class="text-green-600 hover:text-green-500 dark:text-green-400 dark:hover:text-green-300 underline">
                                    @smpn13_bdl
                                </a>
                            </li>
                            <li>
                                <i class="fab fa-facebook text-blue-600 mr-2" aria-hidden="true"></i>
                                <a href="https://www.facebook.com/people/Spantiglas-Balam/pfbid0mTGWWgYCpFAzkfPJq7FxQcNTmGuJih8HsMvnWQR7n4GKgtq2EZQc1ewSD2LvuLhcl/"
                                    target="_blank" rel="noopener noreferrer"
                                    class="text-green-600 hover:text-green-500 dark:text-green-400 dark:hover:text-green-300 underline">
                                    Spantiglas-Balam
                                </a>
                            </li>
                            <li>
                                <i class="fab fa-youtube text-red-600 mr-2" aria-hidden="true"></i>
                                <a href="https://www.youtube.com/@SMPN13BandarLampung" target="_blank"
                                    rel="noopener noreferrer"
                                    class="text-green-600 hover:text-green-500 dark:text-green-400 dark:hover:text-green-300 underline">
                                    @SMPN13BandarLampung
                                </a>
                            </li>
                            <li>
                                <i class="fab fa-tiktok text-black dark:text-white mr-2" aria-hidden="true"></i>
                                <a href="https://www.tiktok.com/@spantiglasbalam" target="_blank"
                                    rel="noopener noreferrer"
                                    class="text-green-600 hover:text-green-500 dark:text-green-400 dark:hover:text-green-300 underline">
                                    @spantiglasbalam
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="animate-slide-in-from-bottom delay-200">
                    <div class="h-64 md:h-full rounded-md shadow-lg overflow-hidden">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.1526401300034!2d105.201577!3d-5.393698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40d06d0b4f4143%3A0x84d0512b675ea2db!2sSMP%20Negeri%2013%20Bandar%20Lampung!5e0!3m2!1sid!2sid!4v1750231294709!5m2!1sid!2sid"
                            class="w-full h-full border-0" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            title="Peta lokasi SMP Negeri 13 Bandar Lampung">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <x-footer />
</x-guest-layout>
