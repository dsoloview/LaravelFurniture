<?php

 namespace App\Repository;

use App\Repository\BaseRepository;
use App\Models\Image;
use App\Contracts\ImagesRepositoryContract;

/**
  *
  */
 class ImagesRepository extends BaseRepository implements ImagesRepositoryContract
 {
     protected $model;

     public function __construct(Image $model)
     {
         $this->model = $model;
     }

     public function create($image): Image
     {
         return $this->model->create($image);
     }
 }
