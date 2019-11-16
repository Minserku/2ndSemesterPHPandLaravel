<?php

namespace App\Listeners;

use App\Events\ArticlesEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ArticlesEvenetListener
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
     * @param  ArticlesEvent  $event
     * @return void
     */
    public function handle(ArticlesEvent $event)
    {
        //
    }
}
