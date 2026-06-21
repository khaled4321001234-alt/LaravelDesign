<x-layout.app :title="__($article['title_key'])">
    <x-layout.page-banner :title="__($article['title_key'])" />

    <article class="section-padding bg-surface">
        <div class="container-site">
            <div class="mx-auto max-w-3xl">
                <a href="{{ route('news.index') }}" class="reveal mb-8 inline-flex items-center gap-2 text-sm font-medium text-primary transition-colors hover:text-primary-hover">
                    <x-icons.arrow-back class="size-4" />
                    {{ __('site.news.back_to_news') }}
                </a>

                <div class="reveal overflow-hidden rounded-theme-lg">
                    <img
                        src="{{ asset($article['image']) }}"
                        alt="{{ __($article['title_key']) }}"
                        class="aspect-[21/9] w-full object-cover"
                    >
                </div>

                <div class="reveal mt-6 flex items-center gap-3 text-sm text-text-muted">
                    <time>{{ __($article['date_key']) }}</time>
                    <span class="size-1 rounded-full bg-border"></span>
                    <span>{{ __('site.news.page_title') }}</span>
                </div>

                <h1 class="reveal mt-4 text-2xl font-bold leading-snug text-secondary md:text-3xl">
                    {{ __($article['title_key']) }}
                </h1>

                <div class="reveal mt-8 space-y-5 text-base leading-relaxed text-text">
                    @foreach (explode("\n\n", __($article['body_key'])) as $paragraph)
                        @if (trim($paragraph) !== '')
                            <p>{{ $paragraph }}</p>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </article>

    @if ($relatedNews->count())
        <section class="section-padding border-t border-border bg-surface-muted">
            <div class="container-site">
                <div class="reveal">
                    <x-ui.section-heading :title="__('site.news.related')" align="start" />
                </div>

                <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($relatedNews as $index => $item)
                        <x-ui.news-card
                            :image="$item['image']"
                            :date="__($item['date_key'])"
                            :title="__($item['title_key'])"
                            :url="route('news.show', $item['slug'])"
                            @class(['reveal', 'reveal-delay-' . min($index + 1, 3)])
                        />
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</x-layout.app>
