{{ __('site.donate.mail_heading') }}
================================

{{ __('site.donate.form.name') }}: {{ $data['name'] }}
{{ __('site.donate.form.email') }}: {{ $data['email'] }}
@if (! empty($data['phone']))
{{ __('site.donate.form.phone') }}: {{ $data['phone'] }}
@endif
{{ __('site.donate.form.amount') }}: {{ $data['amount'] }}
{{ __('site.donate.form.category') }}: {{ __('site.donate.categories.' . $data['category']) }}

@if (! empty($data['message']))
{{ __('site.donate.form.message') }}:
{{ $data['message'] }}
@endif
