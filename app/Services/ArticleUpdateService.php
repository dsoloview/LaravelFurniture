<?php

namespace App\Services;

use Illuminate\Support\Collection;
use App\Contracts\ArticleUpdateServiceContract;
use App\Models\Article;
use Illuminate\Support\Str;
use App\Contracts\TagsSynchronizerContract;
use App\Contracts\TagsRepositoryContracts;
use App\Contracts\ArticlesRepositoryContract;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\DB;
use App\Contracts\ImagesRepositoryContract;

/**
 *
 */
class ArticleUpdateService implements ArticleUpdateServiceContract
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

    public function update(Article $article, array $fields, Collection $tags, $image, $date): Article
    {
        DB::transaction(function () use ($article, $tags, $fields, $date, $image) {
            if (isset($image)) {
                $path = $image->store('images', ['disk' => 'public']);
                $image = $this->imagesRepository->create(['image' => $path]);
                $fields['image_id'] = $image->id;
            }
            $fields['published_at'] = $date;
            $fields['slug'] = SlugService::createSlug(Article::class, 'slug', $fields['title']);
            $this->tagsSynchronizer->sync($tags, $article);
            $article = $this->articlesRepository->update($article, $fields);
        });

        return $article;
    }
}
