<?php

 namespace App\Repository;

use App\Contracts\ArticlesRepositoryContract;
use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

/**
  *
  */
 class ArticlesRepository extends BaseRepository implements ArticlesRepositoryContract
 {
     protected $model;

     public function __construct(Article $model)
     {
         $this->model = $model;
     }

     public function homeArticles(int $count): Collection
     {
         return $this->model->whereNotNull('published_at')->orderBy('published_at', 'desc')->orderBy('created_at', 'desc')->take($count)->get();
     }

     public function publishedPaginate(int $count): LengthAwarePaginator
     {
         return $this->model->whereNotNull('published_at')->orderBy('published_at', 'desc')->orderBy('created_at', 'desc')->paginate($count);
     }

     public function create(array $fields): Article
     {
         return $this->model->create($fields);
     }

     public function update(Article $article, array $fields): bool
     {
         return $article->update($fields);
     }

     public function delete(Article $article): bool
     {
         return $article->delete();
     }
 }
