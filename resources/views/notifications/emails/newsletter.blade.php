@component('mail::message')
# {{$newsletter->heading}}

@foreach($newsletter->articles as $article)
{{$article->title}}
@endforeach

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
