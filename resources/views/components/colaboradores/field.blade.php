@props([
    'label',
    'value',
    'mono' => false,                         // datos tipo CURP, RFC, NSS
    'weight' => 'font-semibold',
])

<div {{ $attributes->class(['flex flex-col gap-1']) }}>
    <span class="font-body-sm text-body-sm text-secondary">{{ $label }}</span>
    @if ($mono)
        <span class="font-label-lg text-label-lg text-on-surface">{{ $value }}</span>
    @else
        <span class="font-body-md text-body-md {{ $weight }} text-on-surface">{{ $value }}</span>
    @endif
</div>
