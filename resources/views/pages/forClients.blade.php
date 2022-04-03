@extends('layouts.inner')

@section('title', 'Рога и Сила - Для клиентов')

@section('pageTitle', 'Для клиентов')

@section('innerContent')
        <p>Средняя цена модели:</p>
        @dump($average)
        <p>Средняя цена моделей со скидкой:</p>
        @dump($saleAverage)
        <p>Самая дорогая модель:</p>
        @dump($maxPriceModel)
        <p>Виды салонов:</p>
        @dump($salons)
        <p>Виды двигателей:</p>
        @dump($engines)
        <p>Классы с символьным кодом в качестве ключа:</p>
        @dump($modelsWithSlug)
        <p>Модели со скидкой,где в их названии, названии двигателей, или КПП, должна содержаться цифра 5 или 6.:</p>
        @dump($filteredModels)
        <p>Виды кузовов со средней ценой для модели:</p>
        @dump($averageBodyPrice)
@endsection
