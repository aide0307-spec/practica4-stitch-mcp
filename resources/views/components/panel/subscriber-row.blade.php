@props([
    'initials',
    'name',
    'type',
    'plan',
    'mrr',
    'status',
    'lastPayment',
    'avatar' => 'bg-primary-fixed text-on-primary-fixed', // colores del círculo con iniciales
])

<tr class="h-14 hover:bg-surface-container-low/40 transition-colors">
    <td class="py-3 px-6">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-[0.75rem] {{ $avatar }} font-headline-sm text-body-sm font-bold flex items-center justify-center shrink-0">
                {{ $initials }}
            </div>
            <div class="flex flex-col min-w-0">
                <span class="font-headline-sm text-body-md font-semibold text-on-surface truncate">{{ $name }}</span>
                <span class="font-body-sm text-body-sm text-outline">{{ $type }}</span>
            </div>
        </div>
    </td>
    <td class="py-3 px-6">
        <span class="font-body-sm text-body-sm font-medium text-on-surface">{{ $plan }}</span>
    </td>
    <td class="py-3 px-6">
        <span class="font-label-md text-label-md text-on-surface font-medium">{{ $mrr }} <span class="text-label-sm text-outline">MXN</span></span>
    </td>
    <td class="py-3 px-6">
        <x-panel.status-badge :status="$status" />
    </td>
    <td class="py-3 px-6">
        <span class="font-body-sm text-body-sm text-on-surface-variant">{{ $lastPayment }}</span>
    </td>
    <td class="py-3 px-6 text-right">
        <button class="w-8 h-8 rounded-[0.125rem] hover:bg-surface-container inline-flex items-center justify-center text-on-surface-variant hover:text-on-surface transition-colors" title="Acciones" type="button">
            <span class="material-symbols-outlined text-[18px]">more_horiz</span>
        </button>
    </td>
</tr>
