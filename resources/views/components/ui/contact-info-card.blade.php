@props([
    'icon',
    'title',
    'value',
    'href' => null,
])

<div {{ $attributes->merge(['class' => 'card-base flex items-start gap-4 p-5']) }}>
    <div class="stat-icon-ring shrink-0">
        <x-dynamic-component :component="'icons.' . $icon" class="size-5" />
    </div>
    <div class="min-w-0">
        <h3 class="text-sm font-semibold text-secondary">{{ $title }}</h3>
        @if ($href)
            <a href="{{ $href }}" class="mt-1 block text-sm text-text-muted transition-colors hover:text-primary" @if (in_array($icon, ['phone', 'mail'])) dir="ltr" @endif>
                {{ $value }}
            </a>
        @else
            <p class="mt-1 text-sm text-text-muted">{{ $value }}</p>
        @endif
    </div>
</div>
