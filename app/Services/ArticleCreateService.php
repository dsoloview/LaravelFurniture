<?php

namespace App\Services;

use Illuminate\Support\Collection;
use App\Contracts\ArticleCreateServiceContract;
use App\Models\Article;
use App\Contracts\TagsSynchronizerContract;
use App\Contracts\TagsRepositoryContracts;
use App\Contracts\ArticlesRepositoryContract;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\DB;

use App\Contracts\ImagesRepositoryContract;

/**
 *
 */
class ArticleCreateService implements ArticleCreateServiceContract
{
    public $tagsSynchronizer;
    public $articlesRepository;
    public $imagesRepository;

    public function __construct(
        TagsSynchronizerContract $tagsSynchronizer,
        ArticlesRepositoryContract $articlesRepository,
        ImagesRepositoryContract $imagesRepository,
    ) {
        $this->tagsSynchronizer = $tagsSynchronizer;
        $this->articlesRepository = $articlesRepository;
        $this->imagesRepository = $imagesRepository;
    }

    public function create(Article $article, array $fields, Collection $tags, $image, $date): Article
    {
        DB::transaction(function () use ($fields, $tags, $date, $image) {
            $path = $image->store('images', ['disk' => 'public']);
            $image = $this->imagesRepository->create(['image' => $path]);
            $fields['image_id'] = $image->id;
            $fields['published_at'] = $date;
            $fields['slug'] = SlugService::createSlug(Article::class, 'slug', $fields['title']);
            $article = $this->articlesRepository->create($fields);
            $this->tagsSynchronizer->sync($tags, $article);
        });
        return $article;
    }
}
