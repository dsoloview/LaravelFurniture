<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

interface MenuActiveServiceContract
{
    public function isActive(Category $category, $path): bool;
}
