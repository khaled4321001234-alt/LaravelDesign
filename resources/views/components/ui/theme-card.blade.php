@props([
    'themeKey',
    'name',
    'description',
    'colors',
    'active' => false,
])

<form action="{{ route('settings.theme') }}" method="POST" {{ $attributes }}>
    @csrf
    <input type="hidden" name="theme" value="{{ $themeKey }}">

    <button
        type="submit"
        @class([
            'theme-card group w-full text-start',
            'theme-card-active' => $active,
        ])
    >
        <div class="theme-card-preview">
            <span class="theme-card-swatch" style="background-color: {{ $colors[0] }}"></span>
            <span class="theme-card-swatch" style="background-color: {{ $colors[1] }}"></span>
            <span class="theme-card-surface"></span>
        </div>

        <div class="theme-card-body">
            <div class="flex items-center justify-between gap-2">
                <h3 class="font-semibold text-secondary">{{ $name }}</h3>
                @if ($active)
                    <span class="theme-card-badge">{{ __('site.settings.active') }}</span>
                @endif
            </div>
            <p class="mt-1 text-xs leading-relaxed text-text-muted">{{ $description }}</p>
        </div>
    </button>
</form>
