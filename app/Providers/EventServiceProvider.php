<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // Registered::class => [
        //     SendEmailVerificationNotification::class,
        // ],

        // \App\Events\ArticlesEvent::class => [
        //   \App\Listeners\ArticlesEvenetListener::class,

        \Illuminate\Auth\Events\Login::class => [ 
          //라라벨 내장 이벤트 클래스
          \App\Listeners\UsersEventListener::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        // \Event::listen('article.created', function ($article){//클로저
        //   var_dump('이벤트를 받았습니다. 받은 데이터(상태)는 다음과 같습니다.');
        //   var_dump($article->toArray());
        // });

        // \Event::listen(
        //   'article.created',
        //   \App\Listeners\ArticlesEventListener::class
        // );
        \Event::listen(
          \App\Events\ArticleCreated::class,
          \App\Listeners\ArticlesEventListener::class
        );
    }
}
