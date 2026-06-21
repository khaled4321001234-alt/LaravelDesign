{{ __('site.contact.mail_heading') }}
================================

{{ __('site.contact.form.name') }}: {{ $data['name'] }}
{{ __('site.contact.form.email') }}: {{ $data['email'] }}
@if (! empty($data['phone']))
{{ __('site.contact.form.phone') }}: {{ $data['phone'] }}
@endif
{{ __('site.contact.form.subject') }}: {{ $data['subject'] }}

{{ __('site.contact.form.message') }}:
{{ $data['message'] }}
