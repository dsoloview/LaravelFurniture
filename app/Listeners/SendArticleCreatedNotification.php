<?php

namespace App\Listeners;

use App\Events\ArticleCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendArticleCreatedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ArticleCreated  $event
     * @return void
     */
    public function handle(ArticleCreated $event)
    {
        if (!empty(config('app.admins_email'))) {
            \Mail::to(config('app.admins_email'))->send(
                new \App\Mail\ArticleCreated($event->article)
            );
        }
    }
}
