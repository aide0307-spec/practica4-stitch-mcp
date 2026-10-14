@props(['active' => null])

@php
    // Menú lateral de la variante "SaaS Platform Admin" (pantalla de Stitch "Gestión Integral de Colaborador").
    $sections = [
        'Tenant Management' => [
            ['key' => 'suscriptores', 'icon' => 'hub', 'label' => 'Subscribers Directory', 'href' => route('suscriptores')],
            ['key' => 'registro', 'icon' => 'domain_add', 'label' => 'Tenant Provisioning', 'href' => route('registro')],
        ],
        'Workforce & Operations' => [
            ['key' => 'perfil', 'icon' => 'badge', 'label' => 'Employee Roster', 'href' => route('perfil')],
            ['key' => 'driver-fleet-units', 'icon' => 'local_shipping', 'label' => 'Driver & Fleet Units', 'href' => '#'],
            ['key' => 'role-permissions', 'icon' => 'admin_panel_settings', 'label' => 'Role Permissions', 'href' => '#'],
        ],
        'Financial & Audit' => [
            ['key' => 'cash-audits', 'icon' => 'point_of_sale', 'label' => 'Cash Audits & Cut-offs', 'href' => '#'],
        ],
    ];
@endphp

<aside class="fixed left-0 top-0 h-full w-72 bg-surface-container-low shadow-[0_1px_8px_rgba(0,0,0,0.04)] z-50 flex flex-col justify-between py-6">
    <div class="flex flex-col gap-6">
        {{-- Marca --}}
        <div class="px-6 flex items-center gap-3">
            <div class="w-9 h-9 rounded-[0.5rem] bg-primary flex items-center justify-center text-on-primary shadow-sm">
                <span class="material-symbols-outlined text-[20px]">water_drop</span>
            </div>
            <div>
                <span class="font-headline-sm text-headline-sm tracking-tight text-on-surface block leading-tight">Godely Aqua</span>
                <span class="font-label-sm text-label-sm text-on-surface-variant tracking-wider uppercase block">SaaS Platform Admin</span>
            </div>
        </div>

        {{-- Selector de tenant --}}
        <div class="px-4">
            <div class="px-3 py-2 bg-surface-container rounded-[0.5rem] flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary text-[18px]">corporate_fare</span>
                    <span class="font-label-md text-label-md text-on-surface truncate max-w-[140px]">All Plant Tenants</span>
                </div>
                <span class="font-label-sm text-label-sm px-1.5 py-0.5 rounded-[0.125rem] bg-surface-container-highest text-on-primary-fixed">HQ-V2</span>
            </div>
        </div>

        {{-- Navegación --}}
        <nav class="flex flex-col gap-1 px-4">
            @foreach ($sections as $title => $items)
                <div class="px-3 pb-1 {{ $loop->first ? 'pt-2' : 'pt-4' }} font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant">{{ $title }}</div>
                @foreach ($items as $item)
                    @php $isActive = $active === $item['key']; @endphp
                    <a href="{{ $item['href'] }}"
                       @if ($isActive) aria-current="page" @endif
                       @class([
                           'flex items-center gap-3 px-3 py-2.5 rounded-[0.5rem] transition-colors',
                           'bg-primary-container text-on-primary-container font-semibold shadow-sm' => $isActive,
                           'text-on-surface-variant hover:bg-surface-container hover:text-on-surface' => ! $isActive,
                       ])>
                        <span class="material-symbols-outlined text-[20px]">{{ $item['icon'] }}</span>
                        <span class="font-body-md text-body-md">{{ $item['label'] }}</span>
                    </a>
                @endforeach
            @endforeach
        </nav>
    </div>

    {{-- Estado de la plataforma --}}
    <div class="px-4 flex flex-col gap-3">
        <div class="p-3 rounded-[0.5rem] bg-surface-container border border-outline-variant/30 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-tertiary-container"></span>
                <span class="font-label-md text-label-md text-on-surface">Nodes Healthy</span>
            </div>
            <span class="font-label-sm text-label-sm text-on-surface-variant">99.98%</span>
        </div>
        <div class="flex items-center justify-between px-2">
            <span class="font-label-sm text-label-sm text-on-surface-variant">v4.8.2-enterprise</span>
            <span class="font-label-sm text-label-sm text-on-surface-variant">Cluster MX-01</span>
        </div>
    </div>
</aside>
