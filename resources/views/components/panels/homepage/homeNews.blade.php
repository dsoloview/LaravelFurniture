@props(['articles'])

<section class="news-block-inverse px-6 py-4">
    <div>
        <p class="inline-block text-3xl text-white font-bold mb-4">Новости</p>
        <span class="inline-block text-gray-200 pl-1"> / <a href="{{ route('articles.index' )}}" class="inline-block pl-1 text-gray-200 hover:text-indigo-500"><b>Все</b></a></span>
    </div>
<div class="grid md:grid-cols-1 lg:grid-cols-3 gap-6">

@foreach ($articles as $article)

    <div class="w-full flex">
        <div class="h-48 lg:h-auto w-32 sm:w-60 lg:w-32 xl:w-48 flex-none text-center overflow-hidden">
            <a class="block w-full h-full hover:opacity-75" href="{{ route('articles.show', ['article' => $article]) }}"><img src="{{Storage::url($article->image->image)}}" class="bg-white bg-opacity-25 w-full h-full object-contain" alt=""></a>
        </div>
        <div class="px-4 flex flex-col justify-between leading-normal">
            <div class="mb-8">
                <div class="text-white font-bold text-xl mb-2">
                    <a class="hover:text-indigo-500" href="{{ route('articles.show', ['article' => $article]) }}">{{ $article->title }}</a>
                </div>
                <p class="text-gray-300 text-base">
                    <a class="hover:text-indigo-500" href="{{ route('articles.show', ['article' => $article]) }}">{{ $article->description }}</a>
                </p>
            </div>
            @if ($article->tags->isNotEmpty())
                               <div>
                                   @foreach ($article->tags as $tag)
                                       <x-panels.tags.tag :tag="$tag" />
                                   @endforeach
                               </div>
            @endif
            <div class="flex items-center">
                <p class="text-sm text-gray-400 italic">{{ Carbon\Carbon::parse($article->published_at)->locale('ru')->isoFormat('DD MMM Y')  }}</p>
            </div>
        </div>
    </div>

@endforeach

</div>
</section>
