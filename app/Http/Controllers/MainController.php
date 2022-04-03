<?php

namespace App\Http\Controllers;

use App\Contracts\FurnitureRepositoryContract;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Contracts\ArticlesRepositoryContract;
use App\Contracts\BannersRepositoryContract;

class MainController extends Controller
{
    private $articlesRepository;
    private $furnitureRepository;
    private $categoryRepository;
    private $bannersRepository;

    public function __construct(ArticlesRepositoryContract $articlesRepository, FurnitureRepositoryContract $furnitureRepository, BannersRepositoryContract $bannersRepository)
    {
        $this->articlesRepository = $articlesRepository;
        $this->furnitureRepository = $furnitureRepository;
        $this->bannersRepository = $bannersRepository;
    }
    public function homepage()
    {
        $newFurniture = $this->furnitureRepository->homeFurniture(4);
        $articles = $this->articlesRepository->homeArticles(3);
        $banners = $this->bannersRepository->getBanners(3);

        return view('pages.homepage', compact('articles', 'newFurniture', 'banners'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contacts()
    {
        return view('pages.contacts');
    }

    public function financial()
    {
        return view('pages.financial');
    }

    public function terms()
    {
        return view('pages.terms');
    }

    public function account()
    {
        return view('pages.account.account');
    }
}
