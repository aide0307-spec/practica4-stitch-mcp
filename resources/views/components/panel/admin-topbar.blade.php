@props([
    'userName' => 'Admin Platform',
    'userEmail' => 'sysadmin@godely.aqua',
])

<header class="fixed top-0 left-72 right-0 h-16 bg-surface/80 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)] z-40 flex items-center justify-between px-gutter-desktop">
    <div class="flex items-center gap-4">
        <div class="flex items-center gap-2 px-3 py-1.5 rounded-[0.25rem] bg-surface-container text-on-surface-variant">
            <span class="material-symbols-outlined text-[18px]">search</span>
            <span class="font-body-sm text-body-sm">Search plants, operators, RFC, licenses...</span>
            <kbd class="font-label-sm text-label-sm px-1.5 py-0.5 rounded-[0.125rem] bg-surface-container-highest text-on-surface ml-4">⌘K</kbd>
        </div>
    </div>

    <div class="flex items-center gap-3">
        <button class="w-9 h-9 rounded-[0.25rem] flex items-center justify-center text-on-surface-variant hover:bg-surface-container hover:text-on-surface transition-colors" type="button">
            <span class="material-symbols-outlined text-[20px]">notifications</span>
        </button>
        <button class="w-9 h-9 rounded-[0.25rem] flex items-center justify-center text-on-surface-variant hover:bg-surface-container hover:text-on-surface transition-colors" type="button">
            <span class="material-symbols-outlined text-[20px]">tune</span>
        </button>
        <div class="h-5 w-px bg-outline-variant/40 mx-1"></div>
        <div class="flex items-center gap-2">
            <div class="text-right">
                <span class="block font-body-sm text-body-sm font-semibold text-on-surface leading-tight">{{ $userName }}</span>
                <span class="block font-label-sm text-label-sm text-on-surface-variant">{{ $userEmail }}</span>
            </div>
            <div class="w-8 h-8 rounded-[0.75rem] bg-primary flex items-center justify-center">
                <span class="material-symbols-outlined text-on-primary text-[18px]">person</span>
            </div>
        </div>
    </div>
</header>
