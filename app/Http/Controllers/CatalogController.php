<?php

namespace App\Http\Controllers;

use App\Contracts\FurnitureRepositoryContract;
use App\Models\Category;

use App\Models\Furniture;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    private $furnitureRepository;

    public function __construct(FurnitureRepositoryContract $furnitureRepository)
    {
        $this->furnitureRepository = $furnitureRepository;
    }

    public function catalog(Category $category)
    {
        $furniture_items = $this->furnitureRepository->catalogPaginated(16);
        return view('pages.catalog.catalog', compact('furniture_items'));
    }

    public function detail(Furniture $furniture)
    {
        return view('pages.catalog.detail', ['furniture' => $furniture]);
    }

    public function category(Category $category)
    {
        $furniture_items = $this->furnitureRepository->categoryFurniturePaginated($category, 16);
        return view('pages.catalog.catalog', compact('furniture_items', 'category'));
    }

    public function newarrivals()
    {
        $furniture_items = $this->furnitureRepository->newArrivalsPaginated(16);
        return view('pages.catalog.catalog', compact('furniture_items'));
    }

    public function sale()
    {
        $furniture_items = $this->furnitureRepository->salePaginated(16);
        return view('pages.catalog.catalog', compact('furniture_items'));
    }
}
