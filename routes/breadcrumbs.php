<?php

// routes/breadcrumbs.php
use App\Models\Article;
use App\Models\Category;
use App\Models\Car;
// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('homepage', function (BreadcrumbTrail $trail) {
    $trail->push('Главная', route('homepage'));
});

Breadcrumbs::for('about', function (BreadcrumbTrail $trail) {
    $trail->parent('homepage');
    $trail->push('О компании', route('about'));
});

Breadcrumbs::for('contacts', function (BreadcrumbTrail $trail) {
    $trail->parent('homepage');
    $trail->push('Контактная информация', route('contacts'));
});

Breadcrumbs::for('financial', function (BreadcrumbTrail $trail) {
    $trail->parent('homepage');
    $trail->push('Условия продаж', route('financial'));
});

Breadcrumbs::macro('resource', function (string $name, string $title) {
    // Home > Blog
    Breadcrumbs::for("{$name}.index", function (BreadcrumbTrail $trail) use ($name, $title) {
        $trail->parent('homepage');
        $trail->push("Новости", route("{$name}.index"));
    });

    // Home > Blog > New
    Breadcrumbs::for("{$name}.create", function (BreadcrumbTrail $trail) use ($name) {
        $trail->parent("{$name}.index");
        $trail->push('Создание новости', route("{$name}.create"));
    });

    // Home > Blog > Post 123
    Breadcrumbs::for("{$name}.show", function (BreadcrumbTrail $trail, $model) use ($name) {
        $trail->parent("{$name}.index");
        $trail->push($model->title, route("{$name}.show", $model));
    });

    // Home > Blog > Post 123 > Edit
    Breadcrumbs::for("{$name}.edit", function (BreadcrumbTrail $trail, $model) use ($name) {
        $trail->parent("{$name}.show", $model);
        $trail->push('Изменение новости', route("{$name}.edit", $model));
    });
});

Breadcrumbs::resource('articles', 'Article');

Breadcrumbs::for("catalog", function (BreadcrumbTrail $trail) {
    $trail->parent('homepage');
    $trail->push("Каталог", route("catalog"));
});

Breadcrumbs::for("newarrivals", function (BreadcrumbTrail $trail) {
    $trail->parent('catalog');
    $trail->push("Новинки", route("newarrivals"));
});

Breadcrumbs::for("sale", function (BreadcrumbTrail $trail) {
    $trail->parent('catalog');
    $trail->push("Распродажа", route("sale"));
});

Breadcrumbs::for("category", function (BreadcrumbTrail $trail, Category $category) {
    $trail->parent('catalog');
    $trail->push("$category->name", route("category", $category));
});

Breadcrumbs::for("detail", function (BreadcrumbTrail $trail, \App\Models\Furniture $furniture) {
    $trail->parent('category', $furniture->category);
    $trail->push("$furniture->name", route("detail", $furniture));
});
