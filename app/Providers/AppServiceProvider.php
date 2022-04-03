<?php

namespace App\Providers;

use App\Contracts\MenuActiveServiceContract;
use App\Models\Category;
use App\Services\MenuActiveService;
use View;
use Illuminate\Support\Optional;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use App\Contracts\TagsSynchronizerContract;
use App\Contracts\ArticleUpdateServiceContract;
use App\Services\ArticleUpdateService;
use App\Contracts\ArticleCreateServiceContract;
use App\Services\ArticleCreateService;
use App\Services\TagsSynchronizer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TagsSynchronizerContract::class, TagsSynchronizer::class);
        $this->app->singleton(MenuActiveServiceContract::class, MenuActiveService::class);
        $this->app->singleton(ArticleUpdateServiceContract::class, ArticleUpdateService::class);
        $this->app->singleton(ArticleCreateServiceContract::class, ArticleCreateService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::enforceMorphMap([
            'article' => 'App\Models\Article',
        ]);

        Paginator::defaultView('pagination::default');

        View::composer('*', function ($view) {
            $view->with('categories', Category::orderBy('sort')->get()->toTree());
        });

        Blade::if('admin', function ($user) {
            return ($user && $user->isAdmin());
        });
    }
}
