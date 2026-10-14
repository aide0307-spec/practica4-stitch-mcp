@props(['active' => null])

@php
    // Menú lateral del panel Superadmin (pantalla de Stitch "Suscriptores").
    $sections = [
        'TENANT MANAGEMENT' => [
            ['key' => 'suscriptores', 'icon' => 'domain', 'label' => 'Suscriptores Directory', 'href' => route('suscriptores')],
            ['key' => 'registro', 'icon' => 'add_business', 'label' => 'Tenant Provisioning', 'href' => route('registro')],
        ],
        'WORKFORCE & OPERATIONS' => [
            ['key' => 'perfil', 'icon' => 'badge', 'label' => 'Employee Roster', 'href' => route('perfil')],
            ['key' => 'driver-fleet-units', 'icon' => 'local_shipping', 'label' => 'Driver & Fleet Units', 'href' => '#'],
            ['key' => 'role-permissions', 'icon' => 'admin_panel_settings', 'label' => 'Role Permissions', 'href' => '#'],
        ],
        'FINANCIAL & AUDIT' => [
            ['key' => 'cash-audits', 'icon' => 'receipt_long', 'label' => 'Cash Audits & Cut-offs', 'href' => '#'],
        ],
    ];
@endphp

<aside class="fixed left-0 top-0 h-screen w-72 bg-surface-container-lowest border-r border-outline-variant z-50 flex flex-col justify-between select-none">
    <div class="flex flex-col h-full">
        {{-- Marca --}}
        <div class="h-16 px-6 border-b border-outline-variant flex items-center gap-3 bg-surface-container-lowest">
            <div class="w-9 h-9 rounded-[0.25rem] bg-primary flex items-center justify-center text-on-primary shadow-sm">
                <span class="material-symbols-outlined text-[20px]">water_drop</span>
            </div>
            <div class="flex flex-col">
                <span class="font-headline-sm text-headline-sm text-on-surface tracking-tight leading-none">GODELY AQUA</span>
                <span class="font-label-sm text-label-sm text-primary tracking-wider uppercase mt-1">SUPERADMIN OS</span>
            </div>
        </div>

        {{-- Navegación --}}
        <div class="flex-1 overflow-y-auto px-4 py-6 space-y-6">
            <nav>
                @foreach ($sections as $title => $items)
                    <div class="px-2 mb-2">
                        <p class="font-label-sm text-label-sm text-outline uppercase tracking-wider">{{ $title }}</p>
                    </div>
                    <div class="space-y-1 {{ $loop->last ? '' : 'mb-6' }}">
                        @foreach ($items as $item)
                            @php $isActive = $active === $item['key']; @endphp
                            <a href="{{ $item['href'] }}"
                               @if ($isActive) aria-current="page" @endif
                               @class([
                                   'flex items-center gap-3 px-3 py-2.5 rounded-[0.25rem] transition-colors',
                                   'bg-primary-container text-on-primary-container font-semibold shadow-sm' => $isActive,
                                   'text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface' => ! $isActive,
                               ])>
                                <span class="material-symbols-outlined text-[20px]">{{ $item['icon'] }}</span>
                                <span class="font-body-md text-body-md">{{ $item['label'] }}</span>
                            </a>
                        @endforeach
                    </div>
                @endforeach
            </nav>
        </div>

        {{-- Estado del clúster --}}
        <div class="p-4 border-t border-outline-variant bg-surface-container-low">
            <div class="p-3 bg-surface-container-lowest rounded-[0.25rem] border border-outline-variant flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-tertiary animate-pulse"></span>
                    <span class="font-label-md text-label-md text-on-surface">Cluster México-01</span>
                </div>
                <span class="font-label-sm text-label-sm bg-surface-container px-1.5 py-0.5 rounded-[0.125rem] text-on-surface-variant">v2.8.4</span>
            </div>
        </div>
    </div>
</aside>
