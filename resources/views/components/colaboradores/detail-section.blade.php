@props([
    'title',
    'tag',
    'first' => false,
])

<section @class(['flex flex-col gap-4', 'pt-2' => ! $first])>
    <div class="flex items-center justify-between pb-1">
        <h3 class="font-headline-sm text-headline-sm text-on-surface tracking-tight">{{ $title }}</h3>
        <span class="font-label-sm text-label-sm text-secondary uppercase tracking-widest">{{ $tag }}</span>
    </div>
    {{ $slot }}
</section>
