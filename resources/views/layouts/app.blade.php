<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description"
        content="SMPN 13 Bandar Lampung Menumbuhkan sikap ulet, gigih serta siap berkompetisi meraih prestasi belajar.">
    <meta name="keywords" content="SMPN 13 Bandar Lampung, Sekolah Menengah Pertama, Pendidikan, Lampung">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen flex">
        {{-- Sidebar tetap di sini, di luar aliran utama konten di mobile tapi menempel di kiri di desktop --}}
        <x-sidebar />

        <div class="flex-1 flex flex-col">
            {{-- Kita akan menggunakan kembali komponen navigation dari Breeze, tapi mengubah kelasnya --}}
            @include('layouts.navigation')

            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <main class="flex-1 p-4 sm:p-6 lg:p-8">
                {{ $slot }}
            </main>
        </div>
    </div>

    @stack('scripts')
</body>

</html>
