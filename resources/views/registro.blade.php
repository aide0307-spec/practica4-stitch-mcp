@extends('layouts.app')

@section('title', 'Registro · Elige tu Plan · Godely Aqua')

@php
    // Datos de ejemplo tomados del diseño de Stitch ("Alta de planta – Paso 3: Elige tu Plan").
    $pasos = [
        ['number' => 1, 'title' => 'Titular', 'state' => 'done'],
        ['number' => 2, 'title' => 'Planta', 'state' => 'done'],
        ['number' => 3, 'title' => 'Elige tu Plan', 'state' => 'active'],
        ['number' => 4, 'title' => 'Pago y Alta', 'state' => 'pending'],
    ];

    $planes = [
        [
            'id' => 'emprendedor', 'name' => 'Emprendedor', 'tag' => 'Rutas Locales', 'icon' => 'local_shipping',
            'description' => 'Para purificadoras con venta directa y repartos de inicio.',
            'monthly' => 890, 'annual' => 712,
            'benefits' => ['Hasta 3 choferes o rutas de reparto', 'Control básico de envases y garrafones', 'Corte de caja diario y liquidación'],
        ],
        [
            'id' => 'pro', 'name' => 'Expansión Pro', 'tag' => 'Mayor Operación', 'icon' => 'bolt',
            'description' => 'Automatización total para reparto urbano y pedidos constantes.',
            'monthly' => 1790, 'annual' => 1432, 'recommended' => true,
            'benefits' => ['Choferes y rutas ilimitadas', 'Pedidos automáticos por WhatsApp', 'Facturación y corte financiero'],
        ],
        [
            'id' => 'corp', 'name' => 'Corporativo', 'tag' => 'Multi-Planta', 'icon' => 'domain',
            'description' => 'Para cadenas purificadoras con centros de distribución y flotilla.',
            'monthly' => 3450, 'annual' => 2760,
            'benefits' => ['Multi-sucursales y plantas conectadas', 'Conexión a básculas y dispensadores', 'Soporte prioritario y capacitación'],
        ],
    ];

    $planSeleccionado = old('plan', 'pro');
@endphp

@section('content')
<div class="bg-surface font-body-md text-body-md text-on-surface min-h-screen flex flex-col justify-between selection:bg-primary-fixed selection:text-on-primary-fixed">
    <x-registro.header />

    <main class="flex-1 w-full flex flex-col items-center justify-center px-margin md:px-margin-tablet py-space-xl bg-surface">
        <form method="POST" action="{{ route('registro.store') }}" class="flex flex-col w-full max-w-7xl mx-auto px-space-xs sm:px-space-md" id="registro-form">
            @csrf
            <input type="hidden" name="periodo" id="periodo" value="{{ old('periodo', 'mensual') }}">

            {{-- Mensaje de éxito --}}
            @if (session('status'))
                <div class="mb-space-lg p-space-md rounded-[0.25rem] bg-tertiary-fixed text-on-tertiary-fixed font-body-md text-body-md flex items-center gap-2">
                    <span class="material-symbols-outlined text-[20px]">check_circle</span>
                    {{ session('status') }}
                </div>
            @endif

            {{-- Stepper de 4 pasos --}}
            <div class="w-full bg-surface-container-lowest rounded-[0.5rem] shadow-sm p-space-md sm:p-space-lg mb-space-lg">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-space-sm sm:gap-space-md relative">
                    @foreach ($pasos as $paso)
                        <x-registro.step :number="$paso['number']" :title="$paso['title']" :state="$paso['state']" />
                    @endforeach
                </div>
            </div>

            {{-- Encabezado y selector Mensual / Anual --}}
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-space-md mb-space-lg">
                <div>
                    <div class="flex items-center gap-space-xs text-primary font-label-sm text-label-sm uppercase tracking-wider mb-1">
                        <span class="material-symbols-outlined text-[16px]">verified</span>
                        <span>Suscripción Operativa Aqua OS</span>
                    </div>
                    <h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">Elige tu Plan</h1>
                    <p class="font-body-md text-body-md text-secondary mt-1 max-w-xl">
                        Comienza con 14 días gratis sin compromiso. Cambia o cancela cuando quieras con un solo clic.
                    </p>
                </div>

                <div class="self-start sm:self-auto bg-surface-container-highest p-1 rounded-[0.5rem] flex items-center gap-1 shadow-inner">
                    <button type="button" data-billing="mensual"
                            class="px-space-md py-1.5 rounded-[0.25rem] font-label-md text-label-md transition-all duration-200 bg-surface-container-lowest text-on-surface shadow-sm font-semibold">
                        Mensual
                    </button>
                    <button type="button" data-billing="anual"
                            class="px-space-md py-1.5 rounded-[0.25rem] font-label-md text-label-md transition-all duration-200 text-secondary hover:text-on-surface flex items-center gap-1.5">
                        <span>Anual</span>
                        <span class="bg-tertiary text-on-tertiary text-[10px] font-label-sm px-1.5 py-0.5 rounded-[0.75rem] uppercase tracking-tight">-20% dcto</span>
                    </button>
                </div>
            </div>

            @error('plan')
                <p class="mb-space-md font-body-sm text-body-sm text-error">{{ $message }}</p>
            @enderror

            {{-- Planes + resumen --}}
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg items-start">
                <div class="lg:col-span-8 flex flex-col gap-space-lg">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-space-md">
                        @foreach ($planes as $plan)
                            <x-registro.plan-card :plan="$plan"
                                                  :selected="$planSeleccionado === $plan['id']"
                                                  :recommended="$plan['recommended'] ?? false" />
                        @endforeach
                    </div>

                    {{-- Tarjeta informativa --}}
                    <div class="bg-surface-container-low rounded-[0.5rem] p-space-md flex flex-col sm:flex-row items-start sm:items-center justify-between gap-space-md">
                        <div class="flex items-center gap-space-md">
                            <div class="w-10 h-10 rounded-[0.25rem] bg-surface-container-lowest text-primary flex items-center justify-center shrink-0 shadow-sm">
                                <span class="material-symbols-outlined text-[24px]">sync_saved_locally</span>
                            </div>
                            <div>
                                <div class="font-headline-sm text-[15px] text-on-surface">Migración de Garrafones y Clientes Incluida</div>
                                <div class="font-body-sm text-body-sm text-secondary">Cargamos tu lista de clientes y saldo de envases prestados en menos de 10 minutos.</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 text-tertiary font-label-md text-label-md shrink-0">
                            <span class="material-symbols-outlined text-[18px]">verified</span>
                            <span>Sin contratos forzosos</span>
                        </div>
                    </div>

                    {{-- Navegación inferior --}}
                    <div class="flex items-center justify-between pt-space-sm">
                        <a class="inline-flex items-center gap-space-xs px-space-lg py-3 rounded-[0.25rem] font-body-md text-body-md font-semibold text-secondary hover:text-on-surface bg-surface-container-lowest hover:bg-surface-container transition-colors shadow-sm" href="#">
                            <span class="material-symbols-outlined text-[20px]">arrow_back</span>
                            <span>Atrás</span>
                        </a>
                        <button type="submit" class="inline-flex items-center gap-space-xs px-space-xl py-3 rounded-[0.25rem] font-body-md text-body-md font-semibold bg-primary hover:bg-primary-container text-on-primary transition-all shadow-md">
                            <span>Continuar al Paso 4</span>
                            <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
                        </button>
                    </div>
                </div>

                {{-- Resumen de suscripción --}}
                <div class="lg:col-span-4 w-full">
                    <div class="sticky top-20 bg-surface-container-lowest rounded-[0.5rem] p-space-lg shadow-sm">
                        <div class="flex items-center justify-between pb-space-sm mb-space-sm">
                            <div class="flex items-center gap-space-xs text-primary">
                                <span class="material-symbols-outlined text-[20px]">receipt_long</span>
                                <span class="font-headline-sm text-headline-sm text-on-surface">Resumen de suscripción</span>
                            </div>
                            <span class="font-label-sm text-label-sm bg-primary-fixed text-on-primary-fixed font-semibold px-2 py-0.5 rounded-[0.75rem] uppercase">Paso 3/4</span>
                        </div>
                        <p class="font-body-sm text-body-sm text-secondary mb-space-md">
                            Detalle del ciclo operativo que se activará en tu planta al finalizar el registro.
                        </p>

                        <div class="bg-surface-container-low rounded-[0.25rem] p-space-md flex flex-col gap-space-sm">
                            <div class="flex items-center justify-between text-body-md">
                                <span class="text-secondary font-body-sm">Plan elegido:</span>
                                <span class="font-headline-sm text-[15px] text-on-surface font-semibold" id="summary-plan-name">Expansión Pro</span>
                            </div>
                            <div class="flex items-center justify-between text-body-md">
                                <span class="text-secondary font-body-sm" id="summary-frequency">Precio mensual:</span>
                                <span class="font-label-md text-label-md text-on-surface font-semibold" id="summary-price">$1,790 MXN / mes</span>
                            </div>
                            <div class="flex items-center justify-between pt-space-xs">
                                <div class="flex items-center gap-1.5">
                                    <span class="font-body-md text-body-md font-bold text-on-surface">Hoy pagas:</span>
                                    <span class="bg-tertiary-fixed text-on-tertiary-fixed font-label-sm text-label-sm px-1.5 py-0.5 rounded-[0.125rem] uppercase font-semibold">14 días gratis</span>
                                </div>
                                <span class="font-headline-sm text-[17px] text-tertiary font-bold tracking-tight">$0.00 MXN</span>
                            </div>
                            <div class="flex items-center justify-between text-body-sm pt-space-xs">
                                <span class="text-secondary font-body-sm">Primer cobro:</span>
                                <span class="font-label-md text-label-md text-on-surface font-semibold">
                                    {{ now()->addDays(14)->locale('es')->translatedFormat('j \\d\\e F') }}
                                </span>
                            </div>
                        </div>

                        <div class="mt-space-md flex items-center gap-2 text-secondary font-body-sm text-[13px]">
                            <span class="material-symbols-outlined text-[18px] text-primary shrink-0">check</span>
                            <span>Cancela en cualquier momento con un solo clic.</span>
                        </div>
                        <div class="mt-space-md p-space-sm bg-surface-container rounded-[0.25rem] flex items-center gap-space-sm text-on-surface">
                            <span class="material-symbols-outlined text-[20px] text-primary shrink-0">shield</span>
                            <span class="font-label-sm text-[11px] leading-tight text-secondary">
                                Garantía de reembolso de 30 días si la plataforma no agiliza tus repartos de agua purificada.
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>

    <x-registro.footer />
</div>
@endsection

@push('scripts')
<script>
    // Selección de plan y alternancia Mensual / Anual (comportamiento del diseño de Stitch).
    (function () {
        const form = document.getElementById('registro-form');
        const periodoInput = document.getElementById('periodo');
        const cards = form.querySelectorAll('[data-plan-card]');
        const billingButtons = form.querySelectorAll('[data-billing]');

        const activeBilling = 'px-space-md py-1.5 rounded-[0.25rem] font-label-md text-label-md transition-all duration-200 bg-surface-container-lowest text-on-surface shadow-sm font-semibold';
        const idleBilling = 'px-space-md py-1.5 rounded-[0.25rem] font-label-md text-label-md transition-all duration-200 text-secondary hover:text-on-surface';
        const money = (n) => '$' + Number(n).toLocaleString('es-MX');

        function render() {
            const anual = periodoInput.value === 'anual';

            billingButtons.forEach((btn) => {
                const isActive = btn.dataset.billing === periodoInput.value;
                btn.className = (isActive ? activeBilling : idleBilling) + (btn.dataset.billing === 'anual' ? ' flex items-center gap-1.5' : '');
            });

            cards.forEach((card) => {
                const radio = card.querySelector('input[type=radio]');
                const button = card.querySelector('[data-plan-button]');
                const price = anual ? radio.dataset.annual : radio.dataset.monthly;

                card.querySelector('[data-price]').textContent = money(price);
                card.querySelector('[data-period]').textContent = anual ? '/ mes facturado anual' : '/ mes sin plazo forzoso';

                card.classList.toggle('bg-surface-container-low', radio.checked);
                card.classList.toggle('shadow-md', radio.checked);
                card.classList.toggle('shadow-primary/10', radio.checked);
                card.classList.toggle('bg-surface-container-lowest', !radio.checked);
                card.classList.toggle('shadow-sm', !radio.checked);

                button.className = 'w-full py-2.5 px-space-md rounded-[0.25rem] font-body-md text-body-md font-semibold transition-colors text-center flex items-center justify-center gap-1 '
                    + (radio.checked ? 'bg-primary text-on-primary shadow-sm' : 'bg-surface-container text-on-surface group-hover:bg-surface-container-high');
                button.innerHTML = radio.checked
                    ? '<span class="material-symbols-outlined text-[18px]">done</span><span>Plan Seleccionado</span>'
                    : 'Elegir';

                if (radio.checked) {
                    document.getElementById('summary-plan-name').textContent = radio.dataset.name;
                    document.getElementById('summary-price').textContent = money(price) + ' MXN / mes';
                }
            });

            document.getElementById('summary-frequency').textContent = anual ? 'Precio anual prorrateado:' : 'Precio mensual:';
        }

        cards.forEach((card) => card.querySelector('input').addEventListener('change', render));
        billingButtons.forEach((btn) => btn.addEventListener('click', () => {
            periodoInput.value = btn.dataset.billing;
            render();
        }));

        render();
    })();
</script>
@endpush
