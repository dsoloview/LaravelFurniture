<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Category;
use App\Contracts\CategoryRepositoryContract;
use App\Contracts\MenuActiveServiceContract;
use App\Repository\CategoryRepository;

/**
 *
 */
class MenuActiveService implements MenuActiveServiceContract
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function isActive(Category $category, $path): bool
    {
        $result = $this->categoryRepository->descendantsAndSelf($category->id);
        foreach ($result as $item) {
            if (strstr($path, $item->slug)) {
                return true;
            }
        }
        return false;
    }
}
