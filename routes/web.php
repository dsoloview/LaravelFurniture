<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CatalogController;

/*
| GET /articles (index)
| GET /articles/create (create)
| GET /articles/{article} (show)
| POST /articles (store)
| GET /articles/{article}/edit (edit)
| PATCH /articles/{article} (update)
| DELETE /articles/{article} (destroy)
|
*/

Route::get('/', [MainController::class, 'homepage'])->name('homepage');

Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/contacts', [MainController::class, 'contacts'])->name('contacts');
Route::get('/financial', [MainController::class, 'financial'])->name('financial');
Route::get('/for_clients', [MainController::class, 'forClients'])->name('forClients');
Route::get('/terms', [MainController::class, 'terms'])->name('terms');

Route::resource('/articles', ArticleController::class);

Route::get('/catalog', [CatalogController::class, 'catalog'])->name('catalog');
Route::get('/catalog/newarrivals', [CatalogController::class, 'newarrivals'])->name('newarrivals');
Route::get('/catalog/sale', [CatalogController::class, 'sale'])->name('sale');
Route::get('/catalog/{category}', [CatalogController::class, 'category'])->name('category');
Route::get('/products/{furniture}', [CatalogController::class, 'detail'])->name('detail');
Route::get('/catalog/sale', [CatalogController::class, 'sale'])->name('sale');

Auth::routes();

Route::get('/account', [MainController::class, 'account'])->name('account')->middleware('auth');
