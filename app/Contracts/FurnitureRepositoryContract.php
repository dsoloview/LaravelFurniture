<?php

namespace App\Contracts;

use Illuminate\Support\Collection;
use App\Models\Furniture;
use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

interface FurnitureRepositoryContract
{
    // Метод для главной
    public function homeFurniture(int $count): Collection;

    public function create($fields);

    // Методы для категорий
    public function categoryFurniturePaginated(Category $category, int $count): LengthAwarePaginator;
    public function catalogPaginated(int $count): LengthAwarePaginator;
}
