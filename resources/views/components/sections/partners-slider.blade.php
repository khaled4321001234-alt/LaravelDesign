@props([
    'partners' => [],
])

<section class="section-padding bg-surface-muted">
    <div class="container-site">
        <div class="reveal">
            <x-ui.section-heading :title="__('site.partners.title')" />
        </div>

        <div class="partners-slider reveal">
            <button
                type="button"
                class="partners-swiper-btn partners-swiper-prev"
                aria-label="{{ __('site.partners.prev') }}"
            >
                <x-icons.arrow-back class="size-5" />
            </button>

            <div
                id="partners-swiper"
                class="swiper partners-swiper"
                dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}"
            >
                <div class="swiper-wrapper">
                    @foreach ($partners as $partner)
                        <div class="swiper-slide">
                            <div class="partner-slide">
                                <div class="partner-logo">
                                    <img
                                        src="{{ asset($partner['logo']) }}"
                                        alt="{{ $partner['name'] }}"
                                        class="max-h-full max-w-full object-contain"
                                        loading="lazy"
                                    >
                                </div>
                                @if (! empty($partner['name']))
                                    <p class="partner-name">{{ $partner['name'] }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <button
                type="button"
                class="partners-swiper-btn partners-swiper-next"
                aria-label="{{ __('site.partners.next') }}"
            >
                <x-icons.arrow-forward class="size-5" />
            </button>
        </div>
    </div>
</section>
