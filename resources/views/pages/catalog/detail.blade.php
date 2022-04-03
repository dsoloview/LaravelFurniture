@extends('layouts.inner_without_sidebar')
@section('addHeadContent')
    <link href="/css/inner_page_template_styles.css" rel="stylesheet">
@endsection

@section('title', "$furniture->name")

@section('pageTitle', "$furniture->name")

@section('innerContent')
<div class="flex-1 grid grid-cols-1 lg:grid-cols-5 border-b w-full">
    <div class="col-span-3 border-r-0 sm:border-r pb-4 px-4 text-center catalog-detail-slick-preview" data-slick-carousel-detail>
        <div class="mb-4 border rounded" data-slick-carousel-detail-items>
            @foreach ($furniture->images as $image)
                <img class="w-full" src="{{Storage::url($image->image)}}" alt="" title="">
            @endforeach
        </div>
        <div class="flex space-x-4 justify-center items-center" data-slick-carousel-detail-pager>
        </div>
    </div>
    <div class="col-span-1 lg:col-span-2">
        <div class="space-y-4 w-full">
            <div class="block px-4">
                @if ($furniture->old_price)
                    <p class="text-base line-through text-gray-400">{{number_format($furniture->old_price, 0, '.', ' ')}} ₽</p>
                @endif
                <p class="font-bold text-2xl text-indigo-500">{{number_format($furniture->price, 0, '.', ' ')}} ₽</p>
                <div class="mt-4 block">
                    <form>
                        <a href="tel:89999999999" class="inline-block bg-indigo-500 hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                            Заказать звонок
                        </a>
                    </form>
                </div>
            </div>
            <div class="block border-t clear-both w-full" data-accordion data-active>
                <div class="text-black text-2xl font-bold flex items-center justify-between hover:bg-gray-50 p-4 cursor-pointer" data-accordion-toggle>
                    <span>Параметры</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-indigo-500 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" data-accordion-not-active style="display: none">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-indigo-500 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" data-accordion-active>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </div>

                <div class="my-4 px-4" data-accordion-details>
                    <table class="w-full">
                        @if (!empty($furniture->salon))
                            <tr>
                                <td class="py-2 text-gray-600 w-1/2">Материал:</td>
                                <td class="py-2 text-black font-bold w-1/2">{{$furniture->salon}}</td>
                            </tr>
                        @endif
                        @if (!empty($furniture->furnitureManunacture))
                            <tr>
                                <td class="py-2 text-gray-600 w-1/2">Производитель:</td>
                                <td class="py-2 text-black font-bold w-1/2">{{$furniture->carClass->name}}</td>
                            </tr>
                        @endif
                        @if (!empty($furniture->width))
                            <tr>
                                <td class="py-2 text-gray-600 w-1/2">Ширина:</td>
                                <td class="py-2 text-black font-bold w-1/2">{{$furniture->width}}</td>
                            </tr>
                        @endif
                        @if (!empty($furniture->year))
                            <tr>
                                <td class="py-2 text-gray-600 w-1/2">Год производства:</td>
                                <td class="py-2 text-black font-bold w-1/2">{{$furniture->year}}</td>
                            </tr>
                        @endif
                        @if (!empty($furniture->color))
                            <tr>
                                <td class="py-2 text-gray-600 w-1/2">Цвет:</td>
                                <td class="py-2 text-black font-bold w-1/2">{{$furniture->color}}</td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
            <div class="block border-t clear-both w-full" data-accordion>
                <div class="text-black text-2xl font-bold flex items-center justify-between hover:bg-gray-50 p-4 cursor-pointer" data-accordion-toggle>
                    <span>Описание</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-indigo-500 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" data-accordion-not-active>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-indigo-500 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" data-accordion-active style="display: none">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </div>
                <div class="my-4 px-4 space-y-4" data-accordion-details style="display: none">
                    <p>{{$furniture->body}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
