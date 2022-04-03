@component('mail::message')
# Удалена новость: {{$article->title}}

<b>Краткое описание: </b> {{$article->description}}
<br>
<b>Текст: </b> {{$article->body}}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
