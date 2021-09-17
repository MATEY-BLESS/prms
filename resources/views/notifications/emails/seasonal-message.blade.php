@component('mail::message')
# {{$seasonalmessage->heading}}

The body of your message.
<img src="{{ asset($seasonalmessage->image) }}">

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
