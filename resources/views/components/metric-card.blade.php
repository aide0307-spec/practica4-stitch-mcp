@props([
    'label',
    'value',
    'detail',
    'trend' => null,
    'tone' => 'primary',
])

@php
    $toneClasses = [
        'primary' => 'bg-primary/10 text-primary',
        'success' => 'bg-emerald-100 text-emerald-700',
        'warning' => 'bg-amber-100 text-amber-800',
        'secondary' => 'bg-secondary/10 text-secondary',
    ];
@endphp

<article {{ $attributes->class(['rounded-xl border border-outline-variant/40 bg-white p-5 shadow-sm']) }}>
    <div class="flex items-start justify-between gap-3">
        <div>
            <p class="text-sm font-medium text-on-surface-variant">{{ $label }}</p>
            <p class="mt-3 font-headline text-3xl font-bold tracking-tight text-on-surface">{{ $value }}</p>
        </div>
        <span class="flex size-11 shrink-0 items-center justify-center rounded-xl {{ $toneClasses[$tone] ?? $toneClasses['primary'] }}">
            {{ $icon }}
        </span>
    </div>
    <div class="mt-4 flex items-center gap-2 text-xs">
        @if ($trend)
            <span class="font-label font-semibold text-emerald-700">{{ $trend }}</span>
        @endif
        <span class="text-on-surface-variant">{{ $detail }}</span>
    </div>
</article>
