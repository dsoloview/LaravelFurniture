<?php

 namespace App\Repository;

use App\Contracts\FurnitureRepositoryContract;
use App\Models\Category;
use App\Models\Furniture;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

/**
  *
  */
 class FurnitureRepository extends BaseRepository implements FurnitureRepositoryContract
 {
     protected $model;
     protected $categoryRepository;

     public function __construct(Furniture $model, CategoryRepository $categoryRepository)
     {
         $this->categoryRepository = $categoryRepository;
         $this->model = $model;
     }

     // Метод для главной
     public function homeFurniture(int $count): Collection
     {
         return $this->model->where('is_new', 1)->take($count)->get();
     }

     public function create($fields)
     {
         return Furniture::create($fields);
     }

     public function update(Furniture $furniture, $fields)
     {
         return $furniture->update($fields);
     }

     public function delete(Furniture $furniture): bool
     {
         return $furniture->delete();
     }

     public function getCar(Furniture $furniture)
     {
         return $this->model->find($furniture->id);
     }


     public function catalogPaginated(int $count): LengthAwarePaginator
     {
         return $this->model->paginate($count);
     }
     public function categoryFurniturePaginated(Category $category, int $count): LengthAwarePaginator
     {
         $categories = $this->categoryRepository->descendantsAndSelf($category->id);
         foreach ($categories as $item) {
             $ids[] = $item->id;
         }
         return $this->model->whereIn('furniture_category_id', $ids)->paginate($count);
     }

     public function newArrivalsPaginated(int $count): LengthAwarePaginator
     {
         return $this->model->where('is_new', 1)->paginate($count);
     }

     public function salePaginated(int $count): LengthAwarePaginator
     {
         return $this->model->whereNotNull('old_price')->paginate($count);
     }
 }
