@component('mail::message')
# Изменена новость: {{$article->title}}

<b>Краткое описание: </b> {{$article->description}}
<br>
<b>Текст: </b> {{$article->body}}

@component('mail::button', ['url' => route('articles.show', ['article' => $article])])
Открыть новость
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
