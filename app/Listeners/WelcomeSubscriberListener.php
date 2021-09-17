<?php

namespace App\Listeners;

use App\Events\NewSubscriberEvent;
use App\Mail\WelcomeSubscriber;
use App\Models\Subscriber;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class WelcomeSubscriberListener implements ShouldQueue
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        sleep(10);
        Mail::to($event->subscriber->email)->send(new WelcomeSubscriber($event->subscriber));
    }
}
