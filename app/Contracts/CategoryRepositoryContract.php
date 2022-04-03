<?php

namespace App\Contracts;

use Illuminate\Support\Collection;
use App\Models\Car;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;

interface CategoryRepositoryContract
{
    // Метод для главной
    public function descendantsAndSelf($id): Collection;
    public function getCategories(): Collection;
}
