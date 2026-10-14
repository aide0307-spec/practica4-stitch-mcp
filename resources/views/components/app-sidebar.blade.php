<aside class="flex h-full w-72 shrink-0 flex-col border-r border-outline-variant/40 bg-white">
    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 border-b border-outline-variant/30 px-6 py-6">
        <span class="flex size-10 items-center justify-center rounded-xl bg-primary text-white">
            <svg class="size-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M12 3.5S6.5 10 6.5 14.5a5.5 5.5 0 0 0 11 0C17.5 10 12 3.5 12 3.5Z" stroke="currentColor" stroke-width="1.8"/>
                <path d="M9.5 15a2.5 2.5 0 0 0 2.5 2.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
            </svg>
        </span>
        <span>
            <span class="block font-headline text-lg font-bold leading-tight text-on-surface">Godely OS</span>
            <span class="mt-1 block text-xs text-on-surface-variant">Purificadora Central</span>
        </span>
    </a>

    <div class="px-4 pt-6">
        <p class="px-3 font-label text-[10px] font-semibold uppercase tracking-[0.18em] text-on-surface-variant/70">Operaciones</p>
        <nav class="mt-3 space-y-1" aria-label="Navegación principal">
            <a href="{{ route('dashboard') }}" aria-current="page" class="flex items-center gap-3 rounded-lg bg-primary/10 px-3 py-2.5 text-sm font-semibold text-primary">
                <svg class="size-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 13h7V4H4v9Zm0 7h7v-4H4v4Zm11 0h5v-9h-5v9Zm0-16v4h5V4h-5Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/></svg>
                Tablero operativo
            </a>
            <a href="#pedidos" class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-on-surface-variant transition hover:bg-surface-container-low">
                <svg class="size-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 6h14l-1.2 13H6.2L5 6Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="M9 8V6a3 3 0 0 1 6 0v2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
                Pedidos
                <span class="ml-auto rounded-full bg-amber-100 px-2 py-0.5 font-label text-[10px] font-semibold text-amber-800">8</span>
            </a>
            <a href="#rutas" class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-on-surface-variant transition hover:bg-surface-container-low">
                <svg class="size-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 19c2.5-6 4-9 7-9s4.5 3 7 3" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/><circle cx="5" cy="19" r="2" stroke="currentColor" stroke-width="1.7"/><circle cx="19" cy="13" r="2" stroke="currentColor" stroke-width="1.7"/><circle cx="12" cy="10" r="2" stroke="currentColor" stroke-width="1.7"/></svg>
                Rutas y reparto
            </a>
            <a href="#inventario" class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-on-surface-variant transition hover:bg-surface-container-low">
                <svg class="size-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M7 4h10v3l2 2v10H5V9l2-2V4Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="M7 7h10M9 12h6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
                Inventario
            </a>
            <a href="#suscriptores" class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-on-surface-variant transition hover:bg-surface-container-low">
                <svg class="size-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="9" cy="8" r="3" stroke="currentColor" stroke-width="1.7"/><path d="M3.5 19a5.5 5.5 0 0 1 11 0m2-8a3 3 0 1 0 0-6m1 8a5 5 0 0 1 3 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
                Suscriptores
            </a>
        </nav>
    </div>

    <div class="mt-auto p-4">
        <div class="rounded-xl bg-surface-container-low p-4">
            <p class="font-label text-[10px] font-semibold uppercase tracking-wider text-on-surface-variant">Plan activo</p>
            <p class="mt-2 font-headline text-sm font-semibold text-on-surface">Purificadora Pro</p>
            <div class="mt-3 h-1.5 overflow-hidden rounded-full bg-white">
                <div class="h-full w-3/4 rounded-full bg-primary"></div>
            </div>
            <p class="mt-2 text-xs text-on-surface-variant">75% de capacidad operativa</p>
        </div>
        <a href="#configuracion" class="mt-4 flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-on-surface-variant transition hover:bg-surface-container-low">
            <svg class="size-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 15.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Z" stroke="currentColor" stroke-width="1.7"/><path d="m19.4 15 .1.1a1.8 1.8 0 1 1-2.5 2.5l-.1-.1a1.8 1.8 0 0 0-3 .9v.2a1.8 1.8 0 1 1-3.6 0v-.2a1.8 1.8 0 0 0-3-.9l-.1.1a1.8 1.8 0 1 1-2.5-2.5l.1-.1a1.8 1.8 0 0 0-.9-3h-.2a1.8 1.8 0 1 1 0-3.6h.2a1.8 1.8 0 0 0 .9-3l-.1-.1a1.8 1.8 0 1 1 2.5-2.5l.1.1a1.8 1.8 0 0 0 3-.9v-.2a1.8 1.8 0 1 1 3.6 0v.2a1.8 1.8 0 0 0 3 .9l.1-.1a1.8 1.8 0 1 1 2.5 2.5l-.1.1a1.8 1.8 0 0 0 .9 3h.2a1.8 1.8 0 1 1 0 3.6h-.2a1.8 1.8 0 0 0-.9 3Z" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/></svg>
            Configuración
        </a>
        <div class="mt-3 flex items-center gap-3 border-t border-outline-variant/30 px-2 pt-4">
            <span class="flex size-9 items-center justify-center rounded-full bg-primary-container font-headline text-sm font-bold text-white">MC</span>
            <span class="min-w-0 flex-1">
                <span class="block truncate text-sm font-semibold text-on-surface">María C.</span>
                <span class="block truncate text-xs text-on-surface-variant">Administradora</span>
            </span>
            <button type="button" aria-label="Abrir menú de cuenta" class="rounded-md p-1 text-on-surface-variant hover:bg-surface-container">
                <svg class="size-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><circle cx="5" cy="12" r="1.5"/><circle cx="12" cy="12" r="1.5"/><circle cx="19" cy="12" r="1.5"/></svg>
            </button>
        </div>
    </div>
</aside>
