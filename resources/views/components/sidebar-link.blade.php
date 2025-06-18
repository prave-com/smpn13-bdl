@props(['active'])

@php
    $classes = $active
        ? 'flex items-center px-4 py-2 text-gray-100 bg-gray-900 rounded-md transition duration-150 ease-in-out'
        : 'flex items-center px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    @if (isset($icon))
        <span class="mr-3">
            {{ $icon }}
        </span>
    @endif
    {{ $slot }}
</a>
