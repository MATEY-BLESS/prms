<?php

namespace App\Listeners;

use App\Mail\LatestNewsMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class LatestNewsListener implements ShouldQueue
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //send this later to mulitple users and/or subscribers
        sleep(10);
        Mail::to('multiple@users.com')->send(new LatestNewsMail($event->article));
    }
}
