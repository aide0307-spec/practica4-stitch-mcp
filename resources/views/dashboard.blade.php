@extends('layouts.app')

@section('title', 'Tablero operativo | Godely OS')

@section('content')
<div class="min-h-screen md:flex">
    <div class="hidden md:block">
        <x-app-sidebar />
    </div>

    <div class="min-w-0 flex-1">
        <header class="flex h-16 items-center justify-between border-b border-outline-variant/40 bg-white px-5 sm:px-8">
            <div class="flex items-center gap-3">
                <details class="group relative md:hidden">
                    <summary aria-label="Abrir navegación" class="list-none cursor-pointer rounded-lg p-2 text-on-surface-variant hover:bg-surface-container-low [&::-webkit-details-marker]:hidden">
                    <svg class="size-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 6h16M4 12h16M4 18h16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                    </summary>
                    <div class="absolute left-0 top-12 z-40 h-[calc(100vh-4rem)] shadow-xl">
                        <x-app-sidebar />
                    </div>
                </details>
                <p class="text-sm text-on-surface-variant"><span class="hidden sm:inline">Purificadora Central / </span><span class="font-semibold text-on-surface">Tablero operativo</span></p>
            </div>
            <div class="flex items-center gap-3">
                <span class="hidden items-center gap-2 rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700 sm:inline-flex">
                    <span class="size-2 rounded-full bg-emerald-500"></span>
                    Operación en línea
                </span>
                <button type="button" aria-label="Notificaciones" class="relative rounded-lg p-2 text-on-surface-variant hover:bg-surface-container-low">
                    <svg class="size-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M18 9a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9Zm-8 12h4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    <span class="absolute right-2 top-2 size-2 rounded-full bg-error"></span>
                </button>
            </div>
        </header>

        <main class="mx-auto max-w-[1600px] p-5 sm:p-8">
            <section class="flex flex-col justify-between gap-5 sm:flex-row sm:items-end">
                <div>
                    <p class="font-label text-[11px] font-semibold uppercase tracking-[0.18em] text-primary">{{ now()->locale('es')->isoFormat('dddd, D [de] MMMM [de] YYYY') }}</p>
                    <h1 class="mt-2 font-headline text-3xl font-bold tracking-tight text-on-surface sm:text-4xl">Resumen de operaciones</h1>
                    <p class="mt-2 text-sm text-on-surface-variant">Vista de ejemplo del estado operativo de tu purificadora.</p>
                </div>
                <div class="flex flex-wrap gap-3">
                    <x-action-button variant="secondary" href="#reporte">
                        <svg class="size-4" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 3v12m0 0 4-4m-4 4-4-4M5 17v3h14v-3" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        Descargar reporte
                    </x-action-button>
                    <x-action-button href="#nuevo-pedido">
                        <svg class="size-4" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 5v14m-7-7h14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                        Nuevo pedido
                    </x-action-button>
                </div>
            </section>

            <section class="mt-8 grid gap-4 sm:grid-cols-2 xl:grid-cols-4" aria-label="Indicadores principales">
                <x-metric-card label="Garrafones en circulación" value="1,284" detail="vs. periodo anterior" trend="+8.2%" tone="primary">
                    <svg class="size-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M8 4h8v2l1.5 2.5V19h-11V8.5L8 6V4Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="M8 8h8m-5 4h2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
                </x-metric-card>
                <x-metric-card label="Pedidos de hoy" value="86" detail="12 pendientes de despacho" trend="+12.5%" tone="warning">
                    <svg class="size-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 6h14l-1.2 13H6.2L5 6Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="M9 8V6a3 3 0 0 1 6 0v2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
                </x-metric-card>
                <x-metric-card label="Ingresos del día" value="$12,450" detail="vs. periodo anterior" trend="+5.4%" tone="success">
                    <svg class="size-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 3v18m4-14.5c-.8-1-2.1-1.5-4-1.5-2.2 0-4 1.1-4 3s1.5 2.7 4 3.5 4 1.3 4 3.5-1.8 3.5-4 3.5c-1.9 0-3.5-.7-4.5-2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
                </x-metric-card>
                <x-metric-card label="Rutas activas" value="4 / 6" detail="2 unidades disponibles" tone="secondary">
                    <svg class="size-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 19c2.5-6 4-9 7-9s4.5 3 7 3" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/><circle cx="5" cy="19" r="2" stroke="currentColor" stroke-width="1.7"/><circle cx="19" cy="13" r="2" stroke="currentColor" stroke-width="1.7"/><circle cx="12" cy="10" r="2" stroke="currentColor" stroke-width="1.7"/></svg>
                </x-metric-card>
            </section>

            <section class="mt-8 grid gap-6 xl:grid-cols-[minmax(0,1.6fr)_minmax(320px,1fr)]">
                <article class="overflow-hidden rounded-xl border border-outline-variant/40 bg-white shadow-sm">
                    <div class="flex flex-wrap items-center justify-between gap-3 border-b border-outline-variant/30 px-5 py-4 sm:px-6">
                        <div>
                            <h2 class="font-headline text-lg font-bold text-on-surface">Pedidos recientes</h2>
                            <p class="mt-1 text-xs text-on-surface-variant">Seguimiento de los últimos pedidos recibidos</p>
                        </div>
                        <a href="#todos-los-pedidos" class="text-sm font-semibold text-primary hover:underline">Ver todos</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[600px] text-left text-sm">
                            <thead class="bg-surface-container-low/70 text-xs font-semibold uppercase tracking-wide text-on-surface-variant">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Pedido</th>
                                    <th scope="col" class="px-4 py-3">Suscriptor</th>
                                    <th scope="col" class="px-4 py-3">Total</th>
                                    <th scope="col" class="px-4 py-3">Estado</th>
                                    <th scope="col" class="px-6 py-3">Hora</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-outline-variant/25">
                                <tr>
                                    <td class="px-6 py-4 font-label text-xs font-semibold text-primary">#PED-1048</td>
                                    <td class="px-4 py-4 font-medium text-on-surface">Laura Méndez</td>
                                    <td class="px-4 py-4 font-label text-xs text-on-surface">$180.00</td>
                                    <td class="px-4 py-4"><span class="rounded-full bg-amber-100 px-2.5 py-1 text-xs font-semibold text-amber-800">En preparación</span></td>
                                    <td class="px-6 py-4 font-label text-xs text-on-surface-variant">10:42 AM</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 font-label text-xs font-semibold text-primary">#PED-1047</td>
                                    <td class="px-4 py-4 font-medium text-on-surface">Carlos Rivera</td>
                                    <td class="px-4 py-4 font-label text-xs text-on-surface">$120.00</td>
                                    <td class="px-4 py-4"><span class="rounded-full bg-sky-100 px-2.5 py-1 text-xs font-semibold text-sky-800">En ruta</span></td>
                                    <td class="px-6 py-4 font-label text-xs text-on-surface-variant">10:28 AM</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 font-label text-xs font-semibold text-primary">#PED-1046</td>
                                    <td class="px-4 py-4 font-medium text-on-surface">Sofía Hernández</td>
                                    <td class="px-4 py-4 font-label text-xs text-on-surface">$240.00</td>
                                    <td class="px-4 py-4"><span class="rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-800">Entregado</span></td>
                                    <td class="px-6 py-4 font-label text-xs text-on-surface-variant">10:15 AM</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 font-label text-xs font-semibold text-primary">#PED-1045</td>
                                    <td class="px-4 py-4 font-medium text-on-surface">Miguel Torres</td>
                                    <td class="px-4 py-4 font-label text-xs text-on-surface">$60.00</td>
                                    <td class="px-4 py-4"><span class="rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-800">Entregado</span></td>
                                    <td class="px-6 py-4 font-label text-xs text-on-surface-variant">09:54 AM</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </article>

                <article class="rounded-xl border border-outline-variant/40 bg-white shadow-sm">
                    <div class="flex items-center justify-between border-b border-outline-variant/30 px-5 py-4">
                        <div>
                            <h2 class="font-headline text-lg font-bold text-on-surface">Estado de rutas</h2>
                            <p class="mt-1 text-xs text-on-surface-variant">Unidades en operación</p>
                        </div>
                        <a href="#rutas" class="text-sm font-semibold text-primary hover:underline">Ver rutas</a>
                    </div>
                    <div class="space-y-5 p-5">
                        <div>
                            <div class="flex items-center justify-between gap-3">
                                <div class="flex items-center gap-3">
                                    <span class="flex size-9 items-center justify-center rounded-lg bg-primary/10 text-xs font-bold text-primary">R1</span>
                                    <span><span class="block text-sm font-semibold text-on-surface">Ruta Norte</span><span class="text-xs text-on-surface-variant">Jorge Ramírez</span></span>
                                </div>
                                <span class="rounded-full bg-emerald-100 px-2.5 py-1 text-[11px] font-semibold text-emerald-800">En ruta</span>
                            </div>
                            <div class="ml-12 mt-3 h-1.5 rounded-full bg-surface-container"><div class="h-1.5 w-2/3 rounded-full bg-primary"></div></div>
                            <p class="ml-12 mt-1.5 text-xs text-on-surface-variant">8 de 12 entregas completadas</p>
                        </div>
                        <div>
                            <div class="flex items-center justify-between gap-3">
                                <div class="flex items-center gap-3">
                                    <span class="flex size-9 items-center justify-center rounded-lg bg-secondary/10 text-xs font-bold text-secondary">R2</span>
                                    <span><span class="block text-sm font-semibold text-on-surface">Ruta Centro</span><span class="text-xs text-on-surface-variant">Ana López</span></span>
                                </div>
                                <span class="rounded-full bg-emerald-100 px-2.5 py-1 text-[11px] font-semibold text-emerald-800">En ruta</span>
                            </div>
                            <div class="ml-12 mt-3 h-1.5 rounded-full bg-surface-container"><div class="h-1.5 w-1/2 rounded-full bg-secondary"></div></div>
                            <p class="ml-12 mt-1.5 text-xs text-on-surface-variant">5 de 10 entregas completadas</p>
                        </div>
                        <div>
                            <div class="flex items-center justify-between gap-3">
                                <div class="flex items-center gap-3">
                                    <span class="flex size-9 items-center justify-center rounded-lg bg-amber-100 text-xs font-bold text-amber-800">R3</span>
                                    <span><span class="block text-sm font-semibold text-on-surface">Ruta Sur</span><span class="text-xs text-on-surface-variant">Pedro Sánchez</span></span>
                                </div>
                                <span class="rounded-full bg-amber-100 px-2.5 py-1 text-[11px] font-semibold text-amber-800">Por salir</span>
                            </div>
                            <div class="ml-12 mt-3 h-1.5 rounded-full bg-surface-container"><div class="h-1.5 w-1/5 rounded-full bg-amber-500"></div></div>
                            <p class="ml-12 mt-1.5 text-xs text-on-surface-variant">2 de 9 entregas completadas</p>
                        </div>
                    </div>
                    <div class="mx-5 mb-5 flex items-start gap-3 rounded-lg border border-amber-200 bg-amber-50 p-3">
                        <svg class="mt-0.5 size-4 shrink-0 text-amber-700" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 9v4m0 4h.01M10.3 4.8 2.9 18a2 2 0 0 0 1.7 3h14.8a2 2 0 0 0 1.7-3L13.7 4.8a2 2 0 0 0-3.4 0Z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        <p class="text-xs leading-relaxed text-amber-900"><span class="font-semibold">Atención:</span> revisa el inventario de envases antes del próximo despacho.</p>
                    </div>
                </article>
            </section>
        </main>
    </div>
</div>
@endsection
