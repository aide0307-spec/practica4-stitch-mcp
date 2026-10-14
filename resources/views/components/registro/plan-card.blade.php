@props([
    'plan',            // arreglo con id, name, tag, icon, description, monthly, annual, benefits
    'selected' => false,
    'recommended' => false,
])

@php
    $unselected = 'bg-surface-container-lowest shadow-sm';
    $selectedCls = 'bg-surface-container-low shadow-md shadow-primary/10';
@endphp

<label data-plan-card="{{ $plan['id'] }}"
       class="plan-card group relative {{ $selected ? $selectedCls : $unselected }} rounded-[0.5rem] p-space-md sm:p-space-lg hover:shadow-md transition-all cursor-pointer flex flex-col justify-between">
    <input type="radio" name="plan" value="{{ $plan['id'] }}" class="sr-only"
           data-name="{{ $plan['name'] }}" data-monthly="{{ $plan['monthly'] }}" data-annual="{{ $plan['annual'] }}"
           @checked($selected)>

    @if ($recommended)
        <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-primary text-on-primary px-space-md py-0.5 rounded-[0.75rem] font-label-sm text-label-sm font-semibold tracking-wider uppercase shadow-sm flex items-center gap-1">
            <span class="material-symbols-outlined text-[14px]">star</span>
            <span>Recomendado</span>
        </div>
    @endif

    <div>
        <div @class(['flex items-center justify-between mb-space-sm', 'mt-1' => $recommended])>
            <span @class(['font-label-sm text-label-sm uppercase tracking-wider', 'text-primary font-semibold' => $recommended, 'text-secondary' => ! $recommended])>{{ $plan['tag'] }}</span>
            <span @class(['material-symbols-outlined text-[20px]', 'text-primary' => $recommended, 'text-secondary' => ! $recommended])>{{ $plan['icon'] }}</span>
        </div>
        <h3 class="font-headline-md text-headline-md text-on-surface mb-1">{{ $plan['name'] }}</h3>
        <p class="font-body-sm text-body-sm text-secondary mb-space-md">{{ $plan['description'] }}</p>

        <div class="mb-space-md">
            <div class="flex items-baseline gap-1">
                <span @class(['font-headline-lg text-headline-lg tracking-tight', 'text-primary' => $recommended, 'text-on-surface' => ! $recommended]) data-price>
                    ${{ number_format($plan['monthly']) }}
                </span>
                <span class="font-label-md text-label-md text-secondary">MXN</span>
            </div>
            <span class="font-label-sm text-label-sm text-secondary" data-period>/ mes sin plazo forzoso</span>
        </div>

        <div class="flex flex-col gap-space-sm pt-space-sm">
            @foreach ($plan['benefits'] as $benefit)
                <div class="flex items-start gap-2">
                    <span class="material-symbols-outlined text-primary text-[18px] shrink-0 mt-0.5">check_circle</span>
                    <span @class(['font-body-sm text-body-sm text-on-surface', 'font-medium' => $recommended])>{{ $benefit }}</span>
                </div>
            @endforeach
        </div>
    </div>

    <div class="pt-space-lg mt-space-md">
        <span data-plan-button
              class="w-full py-2.5 px-space-md rounded-[0.25rem] font-body-md text-body-md font-semibold transition-colors text-center flex items-center justify-center gap-1 {{ $selected ? 'bg-primary text-on-primary shadow-sm' : 'bg-surface-container text-on-surface group-hover:bg-surface-container-high' }}">
            @if ($selected)
                <span class="material-symbols-outlined text-[18px]">done</span><span>Plan Seleccionado</span>
            @else
                Elegir
            @endif
        </span>
    </div>
</label>
