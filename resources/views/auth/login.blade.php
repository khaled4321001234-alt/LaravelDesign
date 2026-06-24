<x-layout.auth :title="__('site.auth.login')">
    <div class="w-full max-w-md reveal is-visible">
        <div class="card-base overflow-hidden">
            <div class="bg-secondary px-6 py-8 text-center text-text-inverse">
                <div class="mx-auto mb-4 flex size-14 items-center justify-center rounded-full bg-white/10 text-primary">
                    <x-icons.lock class="size-7" />
                </div>
                <h1 class="text-2xl font-bold">{{ __('site.auth.login') }}</h1>
                <p class="mt-2 text-sm text-white/80">{{ __('site.auth.login_subtitle') }}</p>
            </div>

            <div class="p-6 md:p-8">
                <form action="{{ route('login') }}" method="POST" class="space-y-5">
                    @csrf

                    <x-ui.form-input
                        :label="__('site.auth.email')"
                        name="email"
                        type="email"
                        autocomplete="email"
                        :placeholder="__('site.auth.email_placeholder')"
                        required
                    />

                    <x-ui.form-input
                        :label="__('site.auth.password')"
                        name="password"
                        type="password"
                        autocomplete="current-password"
                        :placeholder="__('site.auth.password_placeholder')"
                        required
                    />

                    <label class="flex cursor-pointer items-center gap-2.5">
                        <input
                            type="checkbox"
                            name="remember"
                            value="1"
                            @checked(old('remember'))
                            class="size-4 rounded border-border text-primary focus:ring-primary/30"
                        >
                        <span class="text-sm text-text-muted">{{ __('site.auth.remember') }}</span>
                    </label>

                    <button type="submit" class="btn-primary w-full">
                        <x-icons.lock class="size-4" />
                        {{ __('site.auth.submit') }}
                    </button>
                </form>
            </div>
        </div>

        <p class="mt-6 text-center text-sm text-text-muted">
            {{ __('site.auth.no_account') }}
            <a href="{{ route('contact.index') }}" class="font-medium text-primary transition-colors hover:text-primary-hover">
                {{ __('site.nav.contact') }}
            </a>
        </p>
    </div>
</x-layout.auth>
