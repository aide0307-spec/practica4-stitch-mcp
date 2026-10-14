@extends('layouts.app')

@section('title', 'Suscriptores · Godely Aqua')

@php
    // Datos de ejemplo tomados del diseño de Stitch.
    // Más adelante pueden venir de la base de datos (por ejemplo, un modelo Tenant).
    $kpis = [
        ['label' => 'Plantas activas', 'value' => '142', 'trend' => '+6.8%'],
        ['label' => 'MRR recurrente', 'value' => '$485,200', 'unit' => 'MXN', 'trend' => '+14.6%'],
        ['label' => 'Retención neta (NDR)', 'value' => '98.2%', 'trend' => '+0.4%'],
        ['label' => 'Choferes en calle', 'value' => '1,280', 'trend' => '+12.1%'],
    ];

    $suscriptores = [
        ['initials' => 'OC', 'name' => 'Purificadora Oasis Centro', 'type' => 'Purificadora de Agua', 'plan' => 'Expansión Pro', 'mrr' => '$3,999.00', 'status' => 'Activo', 'lastPayment' => '15 Oct 2024', 'avatar' => 'bg-primary-fixed text-on-primary-fixed'],
        ['initials' => 'HP', 'name' => 'Fábrica de Hielo Polar & Cristal', 'type' => 'Producción de Hielo', 'plan' => 'Corporativo', 'mrr' => '$3,450.00', 'status' => 'Activo', 'lastPayment' => '14 Oct 2024', 'avatar' => 'bg-secondary-fixed text-on-secondary-fixed'],
        ['initials' => 'AV', 'name' => 'AquaVitta Alcalina Gourmet', 'type' => 'Agua Especializada', 'plan' => 'Expansión Pro', 'mrr' => '$1,790.00', 'status' => 'Periodo de gracia', 'lastPayment' => '12 Oct 2024', 'avatar' => 'bg-surface-container-highest text-primary'],
        ['initials' => 'MQ', 'name' => 'Distribuidora Bebidas Manantial', 'type' => 'Rutas de Distribución', 'plan' => 'Corporativo', 'mrr' => '$3,450.00', 'status' => 'Activo', 'lastPayment' => '10 Oct 2024', 'avatar' => 'bg-primary-fixed text-on-primary-fixed'],
        ['initials' => 'SA', 'name' => 'Purificadora San Ángel', 'type' => 'Purificadora de Agua', 'plan' => 'Emprendedor', 'mrr' => '$890.00', 'status' => 'Activo', 'lastPayment' => '08 Oct 2024', 'avatar' => 'bg-surface-container-high text-on-surface'],
        ['initials' => 'MR', 'name' => 'Manantial Real del Valle', 'type' => 'Purificadora de Agua', 'plan' => 'Emprendedor', 'mrr' => '$890.00', 'status' => 'Pausado', 'lastPayment' => '28 Sep 2024', 'avatar' => 'bg-error-container text-on-error-container'],
    ];
@endphp

@section('content')
<div class="bg-surface font-body-md text-body-md text-on-surface">
    <x-panel.sidebar active="suscriptores" />

    <div class="pl-72 flex flex-col min-h-screen">
        <x-panel.topbar />

        <main class="w-full pt-16 bg-surface flex-1 px-gutter-desktop py-space-xl">
            <div class="flex flex-col w-full">

                {{-- Encabezado --}}
                <header class="flex flex-col md:flex-row md:items-end justify-between gap-4 pb-6">
                    <div class="flex flex-col">
                        <div class="flex items-center gap-3">
                            <h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">Suscriptores</h1>
                            <div class="flex items-center gap-1.5 px-2.5 py-1 rounded-[0.75rem] bg-surface-container-low text-tertiary">
                                <span class="w-2 h-2 rounded-full bg-tertiary animate-pulse"></span>
                                <span class="font-label-sm text-label-sm font-semibold tracking-wide">En línea</span>
                            </div>
                        </div>
                        <p class="font-body-md text-body-md text-on-surface-variant mt-1 max-w-2xl">
                            Monitoreo consolidado de tenants, consumo de plataforma y facturación recurrente.
                        </p>
                    </div>

                    <div class="flex items-center gap-3 self-start md:self-auto shrink-0">
                        <button class="inline-flex items-center gap-2 px-4 py-2.5 rounded-[0.25rem] bg-surface-container-lowest text-on-surface font-body-md text-body-md font-semibold shadow-sm hover:bg-surface-container-high transition-colors" type="button">
                            <span class="material-symbols-outlined text-[18px] text-outline">download</span>
                            <span>Exportar CSV</span>
                        </button>
                        <button class="inline-flex items-center gap-2 px-4 py-2.5 rounded-[0.25rem] bg-primary text-on-primary font-body-md text-body-md font-semibold shadow-sm hover:bg-primary-container transition-colors" type="button">
                            <span class="material-symbols-outlined text-[18px]">add</span>
                            <span>Nuevo inquilino</span>
                        </button>
                    </div>
                </header>

                {{-- KPIs --}}
                <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 my-6">
                    @foreach ($kpis as $kpi)
                        <x-panel.kpi-card
                            :label="$kpi['label']"
                            :value="$kpi['value']"
                            :trend="$kpi['trend']"
                            :unit="$kpi['unit'] ?? null" />
                    @endforeach
                </section>

                {{-- Filtros --}}
                <section class="bg-surface-container-lowest rounded-[0.25rem] p-4 shadow-sm space-y-3 mb-4">
                    <div class="flex items-center gap-3">
                        <div class="relative flex-1">
                            <span class="material-symbols-outlined absolute left-3.5 top-1/2 -translate-y-1/2 text-outline text-[20px]">search</span>
                            <input id="subscriberSearch" type="text"
                                   class="w-full pl-11 pr-4 py-2.5 rounded-[0.25rem] bg-surface-container-low text-on-surface placeholder:text-outline font-body-sm text-body-sm focus:outline-none focus:bg-surface-container-lowest transition-colors"
                                   placeholder="Buscar por nombre de negocio, ID o titular... [ESC para limpiar]">
                        </div>
                        <button class="inline-flex items-center gap-2 px-3.5 py-2.5 rounded-[0.25rem] bg-surface-container-low text-on-surface-variant hover:text-on-surface hover:bg-surface-container font-body-md text-body-md font-medium transition-colors shrink-0" type="button">
                            <span class="material-symbols-outlined text-[18px]">tune</span>
                            <span>Filtros</span>
                        </button>
                    </div>

                    <div class="flex flex-wrap items-center justify-between gap-2 pt-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-[0.125rem] bg-surface-container text-on-surface-variant font-body-sm text-body-sm">Giro: Todos</span>
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-[0.125rem] bg-surface-container text-on-surface-variant font-body-sm text-body-sm">Plan: Todos</span>
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-[0.125rem] bg-primary-fixed text-on-primary-fixed-variant font-body-sm text-body-sm font-semibold">
                                Estatus: Activos
                                <button class="hover:text-on-primary-fixed text-primary inline-flex items-center" type="button">
                                    <span class="material-symbols-outlined text-[14px]">close</span>
                                </button>
                            </span>
                        </div>
                        <div class="font-label-sm text-label-sm text-outline uppercase tracking-wider">142 suscriptores</div>
                    </div>
                </section>

                {{-- Tabla de suscriptores --}}
                <section class="bg-surface-container-lowest rounded-[0.25rem] shadow-sm overflow-hidden flex flex-col">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="bg-surface-container-low/75 text-on-surface-variant">
                                    <th class="py-3 px-6 font-label-sm text-label-sm font-semibold uppercase tracking-wider" scope="col">Negocio</th>
                                    <th class="py-3 px-6 font-label-sm text-label-sm font-semibold uppercase tracking-wider" scope="col">Plan</th>
                                    <th class="py-3 px-6 font-label-sm text-label-sm font-semibold uppercase tracking-wider" scope="col">MRR</th>
                                    <th class="py-3 px-6 font-label-sm text-label-sm font-semibold uppercase tracking-wider" scope="col">Estatus</th>
                                    <th class="py-3 px-6 font-label-sm text-label-sm font-semibold uppercase tracking-wider" scope="col">Último Pago</th>
                                    <th class="py-3 px-6 font-label-sm text-label-sm font-semibold uppercase tracking-wider text-right" scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-surface-container-low font-body-md text-body-md">
                                @foreach ($suscriptores as $s)
                                    <x-panel.subscriber-row
                                        :initials="$s['initials']"
                                        :name="$s['name']"
                                        :type="$s['type']"
                                        :plan="$s['plan']"
                                        :mrr="$s['mrr']"
                                        :status="$s['status']"
                                        :last-payment="$s['lastPayment']"
                                        :avatar="$s['avatar']" />
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Paginación --}}
                    <div class="px-6 py-4 bg-surface-container-low/40 flex items-center justify-between">
                        <span class="font-body-sm text-body-sm text-on-surface-variant">
                            Páginas <strong class="text-on-surface font-semibold">1</strong> de <strong class="text-on-surface font-semibold">15</strong>
                        </span>
                        <div class="flex items-center gap-2">
                            <button class="px-3 py-1.5 rounded-[0.125rem] bg-surface-container-lowest text-outline font-body-sm text-body-sm font-medium opacity-50 cursor-not-allowed shadow-sm" disabled type="button">Anterior</button>
                            <button class="px-3 py-1.5 rounded-[0.125rem] bg-surface-container-lowest text-on-surface hover:bg-surface-container-high font-body-sm text-body-sm font-medium shadow-sm transition-colors" type="button">Siguiente</button>
                        </div>
                    </div>
                </section>

            </div>
        </main>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // ESC limpia la búsqueda (comportamiento del diseño original)
    (function () {
        const searchInput = document.getElementById('subscriberSearch');
        if (!searchInput) return;
        window.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && document.activeElement === searchInput) {
                searchInput.value = '';
                searchInput.blur();
            }
        });
    })();
</script>
@endpush
