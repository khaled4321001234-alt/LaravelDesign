<x-layout.app :title="__('site.donate.page_title')">
    <x-layout.page-banner
        :title="__('site.donate.page_title')"
        :subtitle="__('site.donate.page_subtitle')"
    />

    <section class="section-padding bg-surface-muted">
        <div class="container-site">
            @if (session('success'))
                <div class="reveal mx-auto mb-8 max-w-2xl rounded-theme-lg border border-primary/30 bg-primary-light px-5 py-4 text-sm font-medium text-secondary">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mx-auto max-w-2xl">
                <div class="card-base reveal p-6 md:p-8">
                    <h2 class="text-xl font-bold text-secondary">{{ __('site.donate.form_title') }}</h2>
                    <p class="mt-2 text-sm text-text-muted">{{ __('site.donate.form_desc') }}</p>

                    <form action="{{ route('donate.store') }}" method="POST" class="mt-8 space-y-5">
                        @csrf

                        <div class="grid gap-5 sm:grid-cols-2">
                            <x-ui.form-input
                                :label="__('site.donate.form.name')"
                                name="name"
                                :placeholder="__('site.donate.form.name_placeholder')"
                                required
                            />

                            <x-ui.form-input
                                :label="__('site.donate.form.email')"
                                name="email"
                                type="email"
                                :placeholder="__('site.donate.form.email_placeholder')"
                                required
                            />
                        </div>

                        <div class="grid gap-5 sm:grid-cols-2">
                            <x-ui.form-input
                                :label="__('site.donate.form.phone')"
                                name="phone"
                                type="tel"
                                :placeholder="__('site.donate.form.phone_placeholder')"
                            />

                            <x-ui.form-input
                                :label="__('site.donate.form.amount')"
                                name="amount"
                                type="number"
                                min="1"
                                step="0.01"
                                :placeholder="__('site.donate.form.amount_placeholder')"
                                required
                            />
                        </div>

                        <x-ui.form-select
                            :label="__('site.donate.form.category')"
                            name="category"
                            :placeholder="__('site.donate.form.category_placeholder')"
                            :options="collect(config('site.donation_categories'))->mapWithKeys(fn (string $key) => [$key => __('site.donate.categories.' . $key)])->all()"
                            required
                        />

                        <x-ui.form-textarea
                            :label="__('site.donate.form.message')"
                            name="message"
                            :placeholder="__('site.donate.form.message_placeholder')"
                            :rows="4"
                        />

                        <button type="submit" class="btn-primary w-full sm:w-auto">
                            <x-icons.heart class="size-4" />
                            {{ __('site.donate.form.submit') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout.app>
