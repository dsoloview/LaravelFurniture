<?php

namespace App\Providers;

use App\Contracts\BaseRepositoryContract;
use App\Contracts\CategoryRepositoryContract;
use App\Contracts\FurnitureRepositoryContract;
use App\Repository\BaseRepository;
use View;
use Illuminate\Support\ServiceProvider;
use App\Contracts\ArticlesRepositoryContract;
use App\Contracts\BannersRepositoryContract;
use App\Contracts\TagsRepositoryContract;
use App\Contracts\ImagesRepositoryContract;
use App\Repository\ArticlesRepository;
use App\Repository\BannersRepository;
use App\Repository\FurnitureRepository;
use App\Repository\CategoryRepository;
use App\Repository\TagsRepository;
use App\Repository\ImagesRepository;
use App\Models\Category;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(BaseRepositoryContract::class, BaseRepository::class);
        $this->app->singleton(ArticlesRepositoryContract::class, ArticlesRepository::class);
        $this->app->singleton(FurnitureRepositoryContract::class, FurnitureRepository::class);
        $this->app->singleton(TagsRepositoryContract::class, TagsRepository::class);
        $this->app->singleton(CategoryRepositoryContract::class, CategoryRepository::class);
        $this->app->singleton(BannersRepositoryContract::class, BannersRepository::class);
        $this->app->singleton(ImagesRepositoryContract::class, ImagesRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $view->with('categoryRepository', new CategoryRepository(new Category()));
        });
    }
}
