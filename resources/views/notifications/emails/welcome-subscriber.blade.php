@component('mail::message')
# Hello {{ $subscriber->name }}

Welcome to Starter. Thank you for joing the best app platform doers.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
