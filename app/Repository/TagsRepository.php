<?php

 namespace App\Repository;

use App\Contracts\TagsRepositoryContract;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Tag;
use App\Contracts\HasTags;

/**
  *
  */
 class TagsRepository extends BaseRepository implements TagsRepositoryContract
 {
     protected $model;

     public function __construct(Tag $model)
     {
         $this->model = $model;
     }

     public function createTag($tag): Tag
     {
         return $this->model->firstOrCreate(['name' => $tag]);
     }

     public function getTag(): Collection
     {
         return $this->model->get();
     }

     public function detach(HasTags $model): void
     {
         $model->tags()->detach();
     }

     public function sync(HasTags $model, array $syncIds): void
     {
         $model->tags()->sync($syncIds);
     }
 }
