<?php

namespace App\Providers;

use App\Events\SeasonalMessageEvent;
use App\Events\LatestNewsEvent;
use App\Events\NewAdminUserEvent;
use App\Events\NewArticleEvent;
use App\Events\NewsletterEvent;
use App\Events\NewSubscriberEvent;
use App\Listeners\LatestNewsListener;
use App\Listeners\NewAccountUserListener;
use App\Listeners\NewAdminUserListener;
use App\Listeners\NewArticleListener;
use App\Listeners\NewsletterListener;
use App\Listeners\SeasonalMessageListener;
use App\Listeners\WelcomeSubscriberListener;
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
        Registered::class => [
            SendEmailVerificationNotification::class,
            NewAccountUserListener::class,
        ],

        NewSubscriberEvent::class => [
            WelcomeSubscriberListener::class,
        ],

        NewArticleEvent::class => [
            NewArticleListener::class,
        ],

        NewAdminUserEvent::class => [
            NewAdminUserListener::class,
        ],

        LatestNewsEvent ::class => [
            LatestNewsListener::class,
        ],

        NewsletterEvent::class => [
            NewsletterListener::class,
        ],

        SeasonalMessageEvent::class => [
            SeasonalMessageListener::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
