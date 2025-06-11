@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'text-yellow-500 px-3 py-2 rounded-md text-sm font-medium'
            : 'text-gray-300 hover:text-yellow-500 px-3 py-2 rounded-md text-sm font-medium';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
