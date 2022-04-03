<?php

 namespace App\Repository;

use App\Contracts\BannersRepositoryContract;
use App\Repository\BaseRepository;
use App\Models\Banner;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

/**
  *
  */
 class BannersRepository extends BaseRepository implements BannersRepositoryContract
 {
     protected $model;

     public function __construct(Banner $model)
     {
         $this->model = $model;
     }

     public function getBanners(int $count): Collection
     {
         return $this->model->inRandomOrder()->take($count)->get();
     }
 }
