@props(['active', 'icon'])

@php
$classes = ($active ?? false)
            ? 'bg-sky-800 text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md'
            : 'text-white hover:bg-sky-600 hover:bg-opacity-75 group flex items-center px-2 py-2 text-sm font-medium rounded-md';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }} wire:navigate>
    <x-icon name="{{ $icon }}" class="mr-3 w-6 h-6 flex-shrink-0 text-sky-300" outline />
    {{ $slot }}
</a>
