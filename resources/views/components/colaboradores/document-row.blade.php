@props([
    'icon',
    'title',
    'validity',
    'status',
    'warning' => false,      // true = documento por vencer (resaltado ámbar)
    'note' => null,          // texto antes de la fecha cuando está por vencer
])

@if ($warning)
    <div class="flex items-center justify-between p-3.5 rounded-[0.25rem] bg-amber-50/70 hover:bg-amber-100/60 transition-colors">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-[0.125rem] bg-amber-100 flex items-center justify-center text-amber-700">
                <span class="material-symbols-outlined text-[20px]">{{ $icon }}</span>
            </div>
            <div class="flex flex-col">
                <span class="font-body-md text-body-md font-semibold text-on-surface">{{ $title }}</span>
                <span class="font-body-sm text-body-sm text-amber-900/80">{{ $note }} (<span class="font-label-sm text-label-sm font-semibold">{{ $validity }}</span>)</span>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <span class="flex items-center gap-1.5 font-body-sm text-body-sm text-amber-700 font-semibold bg-amber-100/90 px-2 py-0.5 rounded-[0.125rem]">
                <span class="material-symbols-outlined text-[14px]">warning</span>
                {{ $status }}
            </span>
            <button class="p-1.5 rounded-[0.125rem] text-amber-800 hover:text-on-surface hover:bg-amber-200/60 transition-colors" title="Ver documento" type="button">
                <span class="material-symbols-outlined text-[18px]">visibility</span>
            </button>
        </div>
    </div>
@else
    <div class="flex items-center justify-between p-3.5 rounded-[0.25rem] bg-surface-container-low hover:bg-surface-container transition-colors">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-[0.125rem] bg-surface-container flex items-center justify-center text-primary">
                <span class="material-symbols-outlined text-[20px]">{{ $icon }}</span>
            </div>
            <div class="flex flex-col">
                <span class="font-body-md text-body-md font-semibold text-on-surface">{{ $title }}</span>
                <span class="font-body-sm text-body-sm text-secondary">Vigencia: <span class="font-label-sm text-label-sm text-on-surface font-semibold">{{ $validity }}</span></span>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <span class="flex items-center gap-1 font-body-sm text-body-sm text-tertiary font-semibold">
                <span class="w-1.5 h-1.5 rounded-full bg-tertiary"></span>
                {{ $status }}
            </span>
            <button class="p-1.5 rounded-[0.125rem] text-secondary hover:text-on-surface hover:bg-surface-container-highest transition-colors" title="Ver documento" type="button">
                <span class="material-symbols-outlined text-[18px]">visibility</span>
            </button>
        </div>
    </div>
@endif
