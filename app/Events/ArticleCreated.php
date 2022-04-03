<?php

namespace App\Events;

use App\Models\Article;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ArticleCreated
{
    use Dispatchable;
    use SerializesModels;


    public $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }
}
