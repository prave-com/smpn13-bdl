@props(['href', 'active']) {{-- Anda tetap bisa menggunakan @props untuk dokumentasi, tapi tidak wajib lagi untuk deklarasi --}}

@php
    $classes =
        $active ?? false // Gunakan null coalescing operator untuk fallback
            ? 'bg-gray-700 text-white'
            : 'text-gray-400 hover:bg-gray-700 hover:text-white';
@endphp

<a href="{{ $href }}"
    {{ $attributes->merge(['class' => 'flex items-center space-x-2 px-4 py-2 rounded-md transition duration-150 ease-in-out ' . $classes]) }}>
    @if (isset($icon))
        <div class="mr-3">
            {{ $icon }}
        </div>
    @endif
    {{ $slot }}
</a>
