@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full pl-3 pr-4 py-2 border-l-4 dark:border-amber-900 hover:border-amber-950 bg-amber-950/25 text-left text-base font-medium text-white focus:outline-none transition duration-150 ease-in-out'
            : 'block w-full pl-3 pr-4 py-2 border-l-4 hover:border-amber-950 text-left text-base font-medium text-white focus:outline-none transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
