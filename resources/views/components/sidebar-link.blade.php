@props(['href', 'active'])

@php
    $classes = $active ?? false ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-700 hover:text-white';
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
