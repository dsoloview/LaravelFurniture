<?php

 namespace App\Repository;

use App\Contracts\BaseCategoryContract;
use App\Contracts\CategoryRepositoryContract;
use App\Repository\FurnitureRepository;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

/**
  *
  */
 class CategoryRepository implements CategoryRepositoryContract
 {
     protected $model;

     public function __construct(Category $model)
     {
         $this->model = $model;
     }
     public function descendantsAndSelf($id): Collection
     {
         return $this->model->descendantsAndSelf($id);
     }

     public function getCategories(): Collection
     {
         return $this->model->get();
     }
 }
