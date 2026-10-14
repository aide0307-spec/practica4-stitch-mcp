@props([
    'name',
    'role',
    'status' => 'Activo',   // Activo | En pausa | Suspendido
    'photo' => null,
    'selected' => false,
])

@php
    $dot = [
        'Activo' => 'bg-tertiary-container',
        'En pausa' => 'bg-amber-500',
        'Suspendido' => 'bg-error',
    ][$status] ?? 'bg-tertiary-container';
@endphp

<div @class([
    'flex items-center justify-between p-2.5 rounded-[0.25rem] cursor-pointer',
    'bg-primary-fixed/30 shadow-xs' => $selected,
    'hover:bg-surface-container-low transition-colors' => ! $selected,
])>
    <div class="flex items-center gap-2.5 min-w-0">
        <x-avatar :name="$name" :photo="$photo" />
        <div class="truncate text-body-sm font-body-sm">
            <span class="font-semibold text-on-surface">{{ $name }}</span>
            <span class="text-secondary"> · {{ $role }}</span>
        </div>
    </div>
    <span class="w-2 h-2 rounded-full {{ $dot }} shrink-0 ml-2" title="{{ $status }}"></span>
</div>
