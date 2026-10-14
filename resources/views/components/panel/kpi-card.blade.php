@props([
    'label',
    'value',
    'trend',
    'unit' => null,          // p. ej. "MXN" (cambia el estilo a cifra monetaria)
    'caption' => 'vs. mes anterior',
])

<div class="bg-surface-container-lowest p-5 rounded-[0.25rem] shadow-sm flex flex-col justify-between">
    <span class="font-body-sm text-body-sm text-on-surface-variant font-medium">{{ $label }}</span>
    <div class="mt-3 flex items-baseline justify-between">
        @if ($unit)
            <span class="font-label-lg text-headline-md text-on-surface tracking-tight font-semibold">
                {{ $value }} <span class="text-label-sm text-outline font-normal">{{ $unit }}</span>
            </span>
        @else
            <span class="font-headline-xl text-headline-xl text-on-surface tracking-tight">{{ $value }}</span>
        @endif
        <div class="flex items-center gap-1 text-tertiary font-label-sm text-label-sm">
            <span class="material-symbols-outlined text-[16px]">trending_up</span>
            <span>{{ $trend }}</span>
        </div>
    </div>
    <span class="font-body-sm text-body-sm text-outline mt-1">{{ $caption }}</span>
</div>
