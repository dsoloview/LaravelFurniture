<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

interface ArticlesRepositoryContract
{
    public function homeArticles(int $count): Collection;
    public function publishedPaginate(int $count): LengthAwarePaginator;
    public function create(array $fields): Article;
    public function update(Article $article, array $fields): bool;
    public function delete(Article $article): bool;
}
