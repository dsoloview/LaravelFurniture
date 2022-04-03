@extends('layouts.inner')

@section('title', $article->title)

@section('pageTitle', $article->title)

@section('innerContent')

                    <img src="{{Storage::url($article->image->image)}}" alt="" title="">

                    @if ($article->tags->isNotEmpty())
                        <div>
                            @foreach ($article->tags as $tag)
                                <x-panels.tags.tag :tag="$tag" />
                            @endforeach
                        </div>
                    @endif

                    {!! $article->body !!}

                <div class="flex" style="justify-content: space-between">
                                <div class="mt-4">
                                    <a class="d-flex items-center text-indigo-500 hover:opacity-75" href="{{ route('articles.index') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                                        </svg>
                                        К списку новостей
                                    </a>
                                </div>
                                @admin(Auth::user())
                                <div class="mt-4">
                                    <a class="d-flex items-center text-indigo-500 hover:opacity-75" href="{{ route('articles.edit', ['article' => $article] )}}">
                                        Изменить
                                    </a>
                                </div>
                                @endadmin
                </div>


@endsection
