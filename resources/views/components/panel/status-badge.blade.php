@props(['status'])

@php
    // Colores de cada estatus, tal como en el diseño de Stitch.
    $styles = [
        'Activo' => ['bg-tertiary-fixed text-on-tertiary-fixed-variant', 'bg-tertiary'],
        'Periodo de gracia' => ['bg-secondary-container text-on-secondary-fixed-variant', 'bg-secondary'],
        'Pausado' => ['bg-error-container text-on-error-container', 'bg-error'],
    ];
    [$pill, $dot] = $styles[$status] ?? $styles['Activo'];
@endphp

<span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-[0.75rem] {{ $pill }} font-label-sm text-label-sm font-semibold">
    <span class="w-1.5 h-1.5 rounded-full {{ $dot }}"></span>
    {{ $status }}
</span>
