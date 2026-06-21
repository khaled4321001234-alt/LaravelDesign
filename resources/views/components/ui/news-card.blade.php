@props([
    'image',
    'date',
    'title',
    'url',
    'excerpt' => null,
])

<a href="{{ $url }}" {{ $attributes->merge(['class' => 'card-base card-hover group block overflow-hidden']) }}>
    <div class="aspect-[16/10] overflow-hidden">
        <img src="{{ asset($image) }}" alt="{{ $title }}" class="size-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
    </div>
    <div class="space-y-2 p-4">
        <time class="text-xs text-text-muted">{{ $date }}</time>
        <h3 class="line-clamp-2 text-sm font-semibold leading-snug text-secondary transition-colors group-hover:text-primary">
            {{ $title }}
        </h3>
        @if ($excerpt)
            <p class="line-clamp-2 text-xs leading-relaxed text-text-muted">{{ $excerpt }}</p>
        @endif
        <span class="inline-flex items-center gap-1 text-xs font-semibold text-primary transition-colors group-hover:text-primary-hover">
            {{ __('site.news.read_more') }}
            <x-icons.arrow-forward class="size-3.5" />
        </span>
    </div>
</a>
