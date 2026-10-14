@props([
    'number',
    'title',
    'state' => 'pending',   // done | active | pending
])

<div @class(['flex items-center gap-space-sm', 'opacity-50' => $state === 'pending'])>
    @if ($state === 'done')
        <div class="w-8 h-8 rounded-full bg-tertiary-container text-on-tertiary-container flex items-center justify-center shrink-0 shadow-sm">
            <span class="material-symbols-outlined text-[18px]">check</span>
        </div>
    @elseif ($state === 'active')
        <div class="w-8 h-8 rounded-full bg-primary text-on-primary flex items-center justify-center font-label-md text-label-md shrink-0 shadow-sm ring-4 ring-primary-fixed">
            {{ $number }}
        </div>
    @else
        <div class="w-8 h-8 rounded-full bg-surface-container text-secondary flex items-center justify-center font-label-md text-label-md shrink-0">
            {{ $number }}
        </div>
    @endif

    <div class="flex flex-col min-w-0">
        @if ($state === 'active')
            <span class="font-label-sm text-label-sm text-primary uppercase tracking-wider font-semibold">Paso {{ $number }} • Activo</span>
            <span class="font-headline-sm text-[14px] leading-tight text-primary font-bold truncate">{{ $title }}</span>
        @else
            <span @class(['font-label-sm text-label-sm uppercase tracking-wider', 'text-tertiary' => $state === 'done', 'text-secondary' => $state === 'pending'])>Paso {{ $number }}</span>
            <span @class(['font-headline-sm text-[14px] leading-tight truncate', 'text-on-surface' => $state === 'done', 'text-secondary' => $state === 'pending'])>{{ $title }}</span>
        @endif
    </div>
</div>
