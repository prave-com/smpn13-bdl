<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-linear-to-br from-[#272A31] to-[#101015] px-4 relative">

        <!-- Back button -->
        <a href="{{ route('login') }}"
            class="absolute top-4 left-4 flex items-center text-[#C0994A] hover:text-yellow-800 z-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Kembali
        </a>

        <div
            class="flex flex-col md:flex-row text-white overflow-hidden w-full max-w-4xl rounded-lg shadow-lg bg-transparent">

            <!-- Left: Logo -->
            <div class="w-full md:w-1/2 flex flex-col items-center justify-center p-6 md:p-10 mt-20 md:mt-0">
                <img src="{{ asset('images/logo.png') }}" alt="Pinterin Logo" class="w-40 md:w-[230px] mx-auto mb-4">
            </div>

            <!-- Right: Message -->
            <div class="w-full md:w-1/2 text-white p-6 md:p-10 relative flex flex-col justify-center">

                <h2 class="text-2xl font-bold mb-4 text-center md:text-left">CEK EMAIL MU!</h2>

                @if (session('status') == 'verification-link-sent')
                    <div class="text-green-600 text-sm text-center md:text-left mb-3">
                        Link verifikasi baru telah dikirim ke email kamu.
                    </div>
                @endif

                <p class="text-center md:text-left text-yellow-600 mb-6">
                    Kami telah mengirim validasi untuk mengaktifkan akun ke email mu atau
                </p>

                <!-- Tombol Lanjut ke login -->
                <div class="flex justify-center md:justify-start">
                    <form method="POST" action="{{ route('verification.send') }}" class="inline">
                        @csrf
                        <button type="submit"
                            class="underline font-semibold text-yellow-700 hover:text-yellow-900 ml-1">
                            Kirim Ulang Email
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-guest-layout>
