<?php

 namespace App\Repository;

use App\Contracts\BaseRepositoryContract;
use App\Repository\FurnitureRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

/**
  *
  */
 class BaseRepository implements BaseRepositoryContract
 {
     protected $model;

     public function __construct(Model $model)
     {
         $this->model = $model;
     }

     public function all()
     {
         return $this->model->get();
     }

     public function paginate($count): LengthAwarePaginator
     {
         return $this->model->paginate($count);
     }
 }
