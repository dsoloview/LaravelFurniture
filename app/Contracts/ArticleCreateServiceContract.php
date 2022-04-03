<?php

namespace App\Contracts;

use Illuminate\Support\Collection;
use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

interface ArticleCreateServiceContract
{
    public function create(Article $article, array $fields, Collection $tags, $image, $date): Article;
}
