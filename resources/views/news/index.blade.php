<x-layout.app :title="__('site.news.page_title')">
    <x-layout.page-banner
        :title="__('site.news.page_title')"
        :subtitle="__('site.news.page_subtitle')"
    />

    <section class="section-padding bg-surface-muted">
        <div class="container-site">
            @if ($newsItems->count())
                <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($newsItems as $index => $item)
                        <x-ui.news-card
                            :image="$item['image']"
                            :date="__($item['date_key'])"
                            :title="__($item['title_key'])"
                            :excerpt="__($item['excerpt_key'])"
                            :url="route('news.show', $item['slug'])"
                            @class(['reveal', 'reveal-delay-' . min(($index % 3) + 1, 3)])
                        />
                    @endforeach
                </div>

                {{ $newsItems->links('components.ui.pagination') }}
            @else
                <div class="reveal rounded-theme-lg border border-border bg-surface p-12 text-center">
                    <p class="text-text-muted">{{ __('site.news.empty') }}</p>
                </div>
            @endif
        </div>
    </section>
</x-layout.app>
