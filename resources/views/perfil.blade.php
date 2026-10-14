@extends('layouts.app')

@section('title', 'Perfil de colaborador · Godely Aqua')

@php
    // Datos de ejemplo tomados del diseño de Stitch.
    $colaboradores = [
        ['name' => 'Carlos Ramírez López', 'role' => 'Chofer', 'status' => 'Activo', 'photo' => 'carlos-ramirez.jpg', 'selected' => true],
        ['name' => 'Valeria Mendoza', 'role' => 'Control Calidad', 'status' => 'Activo', 'photo' => 'valeria-mendoza.jpg'],
        ['name' => 'Jorge Trejo Ramos', 'role' => 'Mantenimiento', 'status' => 'En pausa', 'photo' => 'jorge-trejo.jpg'],
        ['name' => 'Manuel Ortega', 'role' => 'Chofer Auxiliar', 'status' => 'Activo', 'photo' => 'manuel-ortega.jpg'],
        ['name' => 'Daniela Salinas', 'role' => 'Cajera Mostrador', 'status' => 'Suspendido', 'photo' => 'daniela-salinas.jpg'],
        ['name' => 'Esteban Cárdenas', 'role' => 'Chofer Repartidor', 'status' => 'Activo', 'photo' => 'esteban-cardenas.jpg'],
    ];

    $filtros = ['Todos', 'Activos', 'En pausa', 'Por rol'];
    $tabs = ['Datos', 'Rol', 'Vehículo', 'Comisiones', 'Seguridad'];
@endphp

@section('content')
<div class="bg-surface font-body-md text-body-md text-on-surface">
    <x-panel.admin-sidebar active="perfil" />

    <div class="pl-72">
        <x-panel.admin-topbar />

        <main class="w-full pt-16 bg-surface px-gutter-desktop min-h-screen">
            <div class="flex flex-col w-full">

                {{-- Encabezado con migas de pan --}}
                <div class="flex items-center justify-between pb-6">
                    <div class="flex flex-col">
                        <div class="flex items-center gap-2 text-secondary font-body-sm text-body-sm mb-1">
                            <span>Personal</span>
                            <span class="text-secondary/40">/</span>
                            <span class="text-on-surface font-medium">Directorio de Colaboradores</span>
                        </div>
                        <h1 class="font-headline-md text-headline-md text-on-surface tracking-tight">Gestión Integral de Colaborador</h1>
                    </div>
                    <div class="flex items-center gap-3">
                        <button class="flex items-center gap-2 px-4 py-2.5 rounded-[0.5rem] bg-surface-container hover:bg-surface-container-high text-on-surface font-body-md text-body-md transition-all shadow-sm" type="button">
                            <span class="material-symbols-outlined text-[18px] text-secondary">edit</span>
                            <span class="font-semibold">Editar información</span>
                        </button>
                    </div>
                </div>

                {{-- Maestro / detalle --}}
                <div class="flex gap-6 items-start pb-12">

                    {{-- Columna izquierda: directorio --}}
                    <aside class="w-80 shrink-0 bg-surface-container-lowest rounded-[0.5rem] p-4 shadow-sm flex flex-col gap-4">
                        <button class="w-full h-11 bg-primary hover:bg-primary-container text-on-primary rounded-[0.5rem] flex items-center justify-center gap-2 font-body-md text-body-md font-semibold transition-all shadow-sm" type="button">
                            <span class="material-symbols-outlined text-[20px]">add</span>
                            <span>Alta de colaborador</span>
                        </button>

                        <div class="relative w-full">
                            <span class="material-symbols-outlined absolute left-3 top-2.5 text-secondary text-[18px]">search</span>
                            <input class="w-full h-10 pl-9 pr-3 text-body-md font-body-md bg-surface-container-low rounded-[0.25rem] text-on-surface placeholder:text-secondary focus:outline-none focus:bg-surface-container-lowest focus:ring-1 focus:ring-primary transition-all"
                                   placeholder="Buscar colaborador..." type="text">
                        </div>

                        <div class="flex items-center gap-1.5 overflow-x-auto pb-1">
                            @foreach ($filtros as $filtro)
                                <button type="button" @class([
                                    'px-2.5 py-1 rounded-[0.25rem] font-body-sm text-body-sm shrink-0',
                                    'bg-on-surface text-on-secondary font-semibold' => $loop->first,
                                    'bg-surface-container-low text-secondary hover:text-on-surface transition-colors' => ! $loop->first,
                                ])>{{ $filtro }}</button>
                            @endforeach
                        </div>

                        <div class="flex flex-col gap-1">
                            @foreach ($colaboradores as $c)
                                <x-colaboradores.roster-item
                                    :name="$c['name']"
                                    :role="$c['role']"
                                    :status="$c['status']"
                                    :photo="$c['photo']"
                                    :selected="$c['selected'] ?? false" />
                            @endforeach
                        </div>
                    </aside>

                    {{-- Panel de detalle (solo lectura) --}}
                    <div class="flex-1 flex flex-col gap-6 min-w-0">

                        {{-- Encabezado del perfil --}}
                        <section class="bg-surface-container-lowest rounded-[0.5rem] p-6 shadow-sm flex flex-col gap-5">
                            <div class="flex items-center gap-4">
                                <x-avatar name="Carlos Ramírez López" photo="carlos-ramirez-perfil.jpg"
                                          size="w-16 h-16 text-headline-sm" class="ring-2 ring-surface-container" />
                                <div class="flex flex-col">
                                    <div class="flex items-center gap-3">
                                        <h2 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">Carlos Ramírez López</h2>
                                        <div class="flex items-center gap-1.5 px-2.5 py-1 rounded-[0.75rem] bg-surface-container-low cursor-default">
                                            <span class="w-2 h-2 rounded-full bg-tertiary-container shrink-0"></span>
                                            <span class="font-body-sm text-body-sm font-semibold text-on-surface">Activo</span>
                                            <span class="material-symbols-outlined text-[16px] text-secondary">expand_more</span>
                                        </div>
                                    </div>
                                    <p class="font-body-md text-body-md text-primary font-semibold mt-0.5">Chofer Repartidor Titular</p>
                                </div>
                            </div>

                            <div class="flex items-center flex-wrap gap-x-3 gap-y-1 pt-1 font-body-sm text-body-sm text-secondary">
                                <div><span>ID: </span><span class="font-label-md text-label-md text-on-surface">EMP-0492</span></div>
                                <span class="text-secondary/40">·</span>
                                <div><span>Ingreso: </span><span class="text-on-surface font-medium">14 Ene 2022</span></div>
                                <span class="text-secondary/40">·</span>
                                <div><span>Unidad: </span><span class="font-label-md text-label-md text-on-surface">Nissan NP300 (JL-948-2)</span></div>
                                <span class="text-secondary/40">·</span>
                                <div class="flex items-center gap-1 text-on-surface">
                                    <span class="material-symbols-outlined text-tertiary text-[16px]">verified</span>
                                    <span class="text-secondary">WhatsApp: </span>
                                    <span class="font-label-md text-label-md text-on-surface">+52 55 4192 8831</span>
                                    <span class="text-tertiary font-body-sm text-body-sm font-medium">(Verificado)</span>
                                </div>
                            </div>
                        </section>

                        {{-- Pestañas --}}
                        <nav class="flex items-center gap-2">
                            @foreach ($tabs as $tab)
                                <button type="button" @class([
                                    'px-4 py-2 rounded-[0.25rem] font-body-md text-body-md',
                                    'bg-surface-container-lowest font-semibold text-primary shadow-xs' => $loop->first,
                                    'text-secondary hover:text-on-surface hover:bg-surface-container transition-colors' => ! $loop->first,
                                ])>{{ $tab }}</button>
                            @endforeach
                        </nav>

                        {{-- Bloques de información --}}
                        <div class="bg-surface-container-lowest rounded-[0.5rem] p-6 shadow-sm flex flex-col gap-6">
                            <x-colaboradores.detail-section title="Identificación" tag="Validado con RH" first>
                                <div class="grid grid-cols-2 gap-x-8 gap-y-4">
                                    <x-colaboradores.field label="Nombre completo" value="Carlos Ramírez López" />
                                    <x-colaboradores.field label="CURP" value="RALC890412HDFM09" mono />
                                    <x-colaboradores.field label="RFC" value="RALC-890412-HJ1" mono />
                                    <x-colaboradores.field label="NSS (IMSS)" value="4812-90-2819-1" mono />
                                </div>
                            </x-colaboradores.detail-section>

                            <x-colaboradores.detail-section title="Contacto" tag="Canales Rápidos">
                                <div class="grid grid-cols-2 gap-x-8 gap-y-4">
                                    <x-colaboradores.field label="Teléfono móvil" value="+52 55 4192 8831" />
                                    <x-colaboradores.field label="Correo electrónico" value="carlos.ramirez@aguapura.com" weight="" />
                                    <x-colaboradores.field label="Contacto de emergencia" value="Marta López (Madre) · +52 55 1289 4432" weight="font-medium" class="col-span-2" />
                                </div>
                            </x-colaboradores.detail-section>

                            <x-colaboradores.detail-section title="Laboral & Médico" tag="Ficha Sanitaria">
                                <div class="grid grid-cols-3 gap-x-6 gap-y-4">
                                    <x-colaboradores.field label="Fecha de ingreso" value="14 de enero de 2022" />
                                    <x-colaboradores.field label="Grupo sanguíneo" value="O Positivo (O+)" weight="font-bold" />
                                    <x-colaboradores.field label="Alergias / Condiciones" value="Ninguna registrada" weight="" />
                                </div>
                            </x-colaboradores.detail-section>

                            <x-colaboradores.detail-section title="Documentación y Licencias" tag="Expediente Digital">
                                <div class="flex flex-col gap-2.5">
                                    <x-colaboradores.document-row icon="badge" title="Licencia Chofer Tipo B" validity="18 Nov 2026" status="Vigente" />
                                    <x-colaboradores.document-row icon="assignment_ind" title="INE / Identificación Oficial" validity="2030" status="Verificado" />
                                    <x-colaboradores.document-row icon="health_and_safety" title="Certificado Médico COFEPRIS"
                                                                  validity="28 Oct 2024" note="Vence en 12 días" status="Por vencer (<30d)" warning />
                                </div>
                            </x-colaboradores.detail-section>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
