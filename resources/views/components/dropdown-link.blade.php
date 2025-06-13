@props(['href' => '#'])

<a href="{{ $href }}"
    {{ $attributes->merge(['class' => 'block px-4 py-2 text-gray-400 hover:bg-gray-600 hover:text-white rounded-md transition duration-150 ease-in-out']) }}>
    {{ $slot }}
</a>
