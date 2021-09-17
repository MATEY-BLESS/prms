@component('mail::message')
# Welcome new {{$admin->name}}

You are registered as {{$admin->role}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
