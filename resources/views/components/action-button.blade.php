@props([
    'href' => '#',
    'variant' => 'primary',
])

@php
    $variantClasses = [
        'primary' => 'bg-primary text-white hover:bg-primary/90',
        'secondary' => 'border border-outline-variant bg-white text-on-surface hover:bg-surface-container-low',
    ];
@endphp

<a href="{{ $href }}" {{ $attributes->class(['inline-flex items-center justify-center gap-2 rounded-lg px-4 py-2.5 text-sm font-semibold transition focus:outline-none focus:ring-2 focus:ring-primary/40', $variantClasses[$variant] ?? $variantClasses['primary']]) }}>
    {{ $slot }}
</a>
