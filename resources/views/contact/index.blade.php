<x-layout.app :title="__('site.contact.page_title')">
    <x-layout.page-banner
        :title="__('site.contact.page_title')"
        :subtitle="__('site.contact.page_subtitle')"
    />

    <section class="section-padding bg-surface-muted">
        <div class="container-site">
            @if (session('success'))
                <div class="reveal mb-8 rounded-theme-lg border border-primary/30 bg-primary-light px-5 py-4 text-sm font-medium text-secondary">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid gap-8 lg:grid-cols-5 lg:gap-12">
                {{-- Contact Info --}}
                <div class="space-y-5 lg:col-span-2">
                    <div class="reveal">
                        <h2 class="text-xl font-bold text-secondary">{{ __('site.contact.info_title') }}</h2>
                        <p class="mt-2 text-sm leading-relaxed text-text-muted">{{ __('site.contact.info_desc') }}</p>
                    </div>

                    <x-ui.contact-info-card
                        icon="map-pin"
                        :title="__('site.contact.address_title')"
                        :value="__('site.contact.location')"
                        class="reveal reveal-delay-1"
                    />

                    <x-ui.contact-info-card
                        icon="mail"
                        :title="__('site.contact.email_title')"
                        :value="config('site.contact.email')"
                        :href="'mailto:' . config('site.contact.email')"
                        class="reveal reveal-delay-2"
                    />

                    <x-ui.contact-info-card
                        icon="phone"
                        :title="__('site.contact.phone_title')"
                        :value="config('site.contact.phone')"
                        :href="'tel:' . config('site.contact.phone')"
                        class="reveal reveal-delay-3"
                    />

                    <x-ui.contact-info-card
                        icon="globe"
                        :title="__('site.contact.hours_title')"
                        :value="__('site.contact.hours_value')"
                        class="reveal reveal-delay-4"
                    />

                    <div class="reveal rounded-theme-lg border border-border bg-surface p-5">
                        <h3 class="text-sm font-semibold text-secondary">{{ __('site.contact.follow_us') }}</h3>
                        <div class="mt-4 flex gap-3">
                            @foreach (config('site.social') as $social)
                                <a
                                    href="{{ $social['url'] }}"
                                    class="flex size-10 items-center justify-center rounded-full bg-primary-light text-primary transition-all duration-200 hover:scale-110 hover:bg-primary hover:text-text-inverse"
                                    aria-label="{{ $social['name'] }}"
                                >
                                    <x-dynamic-component :component="'icons.' . $social['icon']" class="size-4" />
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Contact Form --}}
                <div class="lg:col-span-3">
                    <div class="card-base reveal p-6 md:p-8">
                        <h2 class="text-xl font-bold text-secondary">{{ __('site.contact.form_title') }}</h2>
                        <p class="mt-2 text-sm text-text-muted">{{ __('site.contact.form_desc') }}</p>

                        <form action="{{ route('contact.store') }}" method="POST" class="mt-8 space-y-5">
                            @csrf

                            <div class="grid gap-5 sm:grid-cols-2">
                                <x-ui.form-input
                                    :label="__('site.contact.form.name')"
                                    name="name"
                                    :placeholder="__('site.contact.form.name_placeholder')"
                                    required
                                />

                                <x-ui.form-input
                                    :label="__('site.contact.form.email')"
                                    name="email"
                                    type="email"
                                    :placeholder="__('site.contact.form.email_placeholder')"
                                    required
                                />
                            </div>

                            <div class="grid gap-5 sm:grid-cols-2">
                                <x-ui.form-input
                                    :label="__('site.contact.form.phone')"
                                    name="phone"
                                    type="tel"
                                    :placeholder="__('site.contact.form.phone_placeholder')"
                                />

                                <x-ui.form-input
                                    :label="__('site.contact.form.subject')"
                                    name="subject"
                                    :placeholder="__('site.contact.form.subject_placeholder')"
                                    required
                                />
                            </div>

                            <x-ui.form-textarea
                                :label="__('site.contact.form.message')"
                                name="message"
                                :placeholder="__('site.contact.form.message_placeholder')"
                                required
                            />

                            <button type="submit" class="btn-primary w-full sm:w-auto">
                                <x-icons.mail class="size-4" />
                                {{ __('site.contact.form.submit') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout.app>
