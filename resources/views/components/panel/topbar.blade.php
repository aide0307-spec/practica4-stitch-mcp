@props([
    'userName' => 'Ing. Valenzuela',
    'userRole' => 'GODELY ROOT',
])

<header class="fixed top-0 left-72 right-0 h-16 bg-surface-container-lowest/90 backdrop-blur-md border-b border-outline-variant z-40 px-gutter-desktop flex items-center justify-between">
    <div class="flex items-center gap-4">
        <div class="flex items-center gap-2 px-3 py-1.5 bg-surface-container-low border border-outline-variant rounded-[0.25rem]">
            <span class="material-symbols-outlined text-outline text-[18px]">search</span>
            <input class="bg-transparent border-none text-on-surface font-body-sm text-body-sm focus:outline-none w-64 placeholder:text-outline"
                   placeholder="Buscar planta, garrafones, folio corte..." type="search">
        </div>
        <div class="hidden xl:flex items-center gap-2 font-label-sm text-label-sm text-outline-variant">
            <span class="px-2 py-0.5 bg-surface-container rounded-[0.125rem] text-on-surface-variant">ESC: Salir</span>
            <span class="px-2 py-0.5 bg-surface-container rounded-[0.125rem] text-on-surface-variant">ALT+C: Corte</span>
        </div>
    </div>

    <div class="flex items-center gap-4">
        <div class="flex items-center gap-1.5 px-2.5 py-1 bg-surface-container-low border border-outline-variant rounded-[0.25rem]">
            <span class="material-symbols-outlined text-tertiary text-[18px]">verified</span>
            <span class="font-label-sm text-label-sm text-tertiary font-bold">PURIFICADORAS RED: ONLINE</span>
        </div>

        <button class="w-9 h-9 rounded-[0.25rem] border border-outline-variant bg-surface-container-lowest flex items-center justify-center text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high transition-colors relative" type="button">
            <span class="material-symbols-outlined text-[20px]">notifications</span>
            <span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-error"></span>
        </button>

        <div class="h-6 w-px bg-outline-variant"></div>

        <div class="flex items-center gap-3 pl-1">
            <div class="flex flex-col text-right">
                <span class="font-headline-sm text-body-sm font-semibold text-on-surface leading-tight">{{ $userName }}</span>
                <span class="font-label-sm text-label-sm text-outline">{{ $userRole }}</span>
            </div>
            <div class="w-8 h-8 rounded-[0.75rem] bg-primary flex items-center justify-center">
                <span class="material-symbols-outlined text-on-primary text-[18px]">person</span>
            </div>
        </div>
    </div>
</header>
