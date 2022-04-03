<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests;
use App\Http\Requests\TagRequest;
use App\Http\Requests\ArticleFormRequest;
use Illuminate\Support\Str;
use App\Services\TagsSynchronizer;
use App\Contracts\ArticlesRepositoryContract;
use App\Contracts\TagsSynchronizerContract;
use App\Contracts\ArticleUpdateServiceContract;
use App\Contracts\ArticleCreateServiceContract;

class ArticleController extends Controller
{
    private $articlesRepository;

    public function __construct(ArticlesRepositoryContract $articlesRepository)
    {
        $this->articlesRepository = $articlesRepository;
    }

    public function index()
    {
        $articles = $this->articlesRepository->publishedPaginate(5);
        return view('pages.articles', compact('articles'));
    }

    public function show(Article $article)
    {
        if ($article->published_at == null) {
            abort(404);
        }

        return view('pages.articles.article', ['article' => $article]);
    }

    public function create()
    {
        $this->authorize('create', Article::class);

        return view('pages.articles.create');
    }

    public function store(ArticleFormRequest $request, TagRequest $tagRequest, Article $article, ArticleCreateServiceContract $articleCreateService)
    {
        $this->authorize('create', Article::class);

        $article = $articleCreateService->create(
            $article,
            $request->validated(),
            $tagRequest->tags,
            $request->image,
            $request->getPublishedAt()
        );

        return back()->with('success', 'Успех');
    }

    public function update(ArticleFormRequest $request, TagRequest $tagRequest, Article $article, ArticleUpdateServiceContract $articleUpdateService)
    {
        $this->authorize('update', $article);

        $article = $articleUpdateService->update(
            $article,
            $request->validated(),
            $tagRequest->tags,
            $request->image,
            $request->getPublishedAt(),
        );

        if ($request['published_at'] == null) {
            return redirect(route('articles.index'));
        }

        return redirect(route('articles.show', ['article' => $article]));
    }

    public function edit(Article $article)
    {
        $this->authorize('update', $article);

        return view('pages.articles.edit', compact('article'));
    }

    public function destroy(Article $article)
    {
        $this->articlesRepository->delete($article);

        return redirect(route('articles.index'));
    }
}
