<?php

namespace App\Listeners;

use App\Mail\SeasonalMessageMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SeasonalMessageListener implements ShouldQueue
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
        Mail::to('multiple@users.com')->send(new SeasonalMessageMail($event->seasonalmessage));
    }
}
