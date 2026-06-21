<x-layout.app :title="__('site.settings.page_title')">
    <x-layout.page-banner
        :title="__('site.settings.page_title')"
        :subtitle="__('site.settings.page_subtitle')"
    />

    <section class="section-padding bg-surface-muted">
        <div class="container-site">
            @if (session('success'))
                <div class="reveal mb-8 rounded-theme-lg border border-primary/30 bg-primary-light px-5 py-4 text-sm font-medium text-secondary">
                    {{ session('success') }}
                </div>
            @endif

            <div class="reveal mb-8">
                <h2 class="text-xl font-bold text-secondary">{{ __('site.settings.appearance_title') }}</h2>
                <p class="mt-2 text-sm text-text-muted">{{ __('site.settings.appearance_desc') }}</p>
            </div>

            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($themes as $key => $theme)
                    <x-ui.theme-card
                        :theme-key="$key"
                        :name="__($theme['name_key'])"
                        :description="__($theme['desc_key'])"
                        :colors="$theme['preview']"
                        :active="$currentTheme === $key"
                        @class(['reveal', 'reveal-delay-' . min(($loop->index % 3) + 1, 3)])
                    />
                @endforeach
            </div>

            <div class="reveal mt-10 rounded-theme-lg border border-border bg-surface p-5">
                <p class="text-sm text-text-muted">{{ __('site.settings.theme_hint') }}</p>
            </div>
        </div>
    </section>
</x-layout.app>
