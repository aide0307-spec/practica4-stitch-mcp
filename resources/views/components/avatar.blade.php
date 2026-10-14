@props([
    'name',
    'photo' => null,            // archivo dentro de public/images/colaboradores
    'size' => 'w-8 h-8 text-body-sm',
])

@php
    // Si la foto existe en public/images/colaboradores la mostramos;
    // si no, mostramos las iniciales (así la vista funciona aunque falten imágenes).
    $path = $photo ? 'images/colaboradores/' . $photo : null;
    $hasPhoto = $path && file_exists(public_path($path));
    $initials = collect(explode(' ', $name))
        ->filter()
        ->take(2)
        ->map(fn ($part) => mb_strtoupper(mb_substr($part, 0, 1)))
        ->join('');
@endphp

<div {{ $attributes->class([$size, 'rounded-full overflow-hidden shrink-0 bg-surface-container-high flex items-center justify-center']) }}>
    @if ($hasPhoto)
        <img class="w-full h-full object-cover" src="{{ asset($path) }}" alt="{{ $name }}">
    @else
        <span class="font-headline-sm font-bold text-primary">{{ $initials }}</span>
    @endif
</div>
