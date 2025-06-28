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
        <div class="max-w-4xl mx-auto">
            <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white mb-8 text-center">
                SEJARAH SMP NEGERI 13 BANDAR LAMPUNG
            </h1>

            <div class="mb-8">
                <img src="{{ asset('images/gerbang-sekolah.jpg') }}" alt="Gerbang Sekolah"
                    class="w-full rounded-md shadow-md object-cover max-h-[400px] mx-auto">
            </div>

            <div class="prose dark:prose-invert max-w-none prose-lg dark:text-gray-300">
                <p><strong>SMP Negeri 13 Bandar Lampung</strong> berdiri pada tahun <strong>1984</strong> berdasarkan
                    Surat Keputusan Menteri Pendidikan dan Kebudayaan Republik Indonesia Nomor:
                    <strong>0557/O/1984</strong> tanggal 20 November 1984 dengan nama awal <strong>SMP Negeri 7
                        Tanjungkarang</strong>.
                </p>

                <p>Pada tahun <strong>1997</strong>, nama sekolah diubah menjadi <strong>SLTP Negeri 13 Bandar
                        Lampung</strong> melalui SK Mendikbud No: <strong>034/O/1997</strong> tanggal 7 Maret 1997.</p>

                <p>Selanjutnya, pada tahun <strong>2003</strong> nama sekolah kembali disesuaikan menjadi <strong>SMP
                        Negeri 13 Bandar Lampung</strong> dengan terbitnya SK Mendiknas No: <strong>153/U/2003</strong>
                    tanggal 14 Oktober 2003, dan digunakan hingga sekarang.</p>

                <div class="prose dark:prose-invert max-w-none prose-lg dark:text-gray-300">

                    <p>
                        Sekolah ini berlokasi di <strong>Jl. Marga No. 57, Beringin Raya, Kemiling, Bandar
                            Lampung</strong>, dengan kode pos <strong>35158</strong>. Untuk keperluan komunikasi,
                        sekolah dapat dihubungi melalui <strong>telepon dan faksimile di nomor (0721) 271054 /
                            271054</strong>.
                        Identitas administratif sekolah tercatat dengan <strong>NSS 201126001026</strong> dan
                        <strong>NPSN 10807202</strong>.
                    </p>

                    <p>
                        <strong>SMP Negeri 13 Bandar Lampung</strong> mulai beroperasi secara resmi pada tahun
                        <strong>1985</strong>, setelah didirikan setahun sebelumnya melalui keputusan menteri. Sejak
                        saat itu, sekolah ini terus berkembang dan menjadi salah satu institusi pendidikan menengah
                        pertama yang unggul di Kota Bandar Lampung.
                    </p>

                    <p>
                        Secara fisik, sekolah ini memiliki fasilitas yang memadai dengan <strong>luas tanah sebesar
                            20.000 m²</strong> dan <strong>luas bangunan mencapai 3.795 m²</strong>. Berdasarkan
                        klasifikasi pendidikan, sekolah ini termasuk dalam <strong>tipe A</strong> dan memiliki
                        <strong>Nomor Identitas Sekolah Daerah (NISD) 126010</strong>.
                    </p>

                </div>

                <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mt-10 mb-4">
                    Daftar Kepala Sekolah:
                </h2>
                <ol class="list-decimal pl-6 space-y-1">
                    <li><strong>Djahidin</strong> (1985–1993)</li>
                    <li><strong>M. Tambunan</strong> (1993–1999)</li>
                    <li><strong>Drs. Hermain Agus</strong> (1999–2003)</li>
                    <li><strong>Drs. Maslin Silaban</strong> (2003–2005)</li>
                    <li><strong>Hj. Hendralina, S.Pd.</strong> (2005–2007)</li>
                    <li><strong>Drs. Bahrunsyah, M.Pd.</strong> (2007–2009)</li>
                    <li><strong>M. Badrun, S.Ag., M.Ag.</strong> (2009–2013)</li>
                    <li><strong>Hj. Rosmaini, M.Pd.</strong> (2013–sekarang)</li>
                </ol>

                <p class="mt-8">
                    Dengan perjalanan sejarah yang cukup panjang dan kontribusi dari berbagai pihak, SMP Negeri 13
                    Bandar Lampung terus berkomitmen menjadi sekolah yang unggul dalam bidang akademik maupun
                    non-akademik.
                </p>
            </div>
        </div>
    </main>

    <x-footer />
</x-guest-layout>
