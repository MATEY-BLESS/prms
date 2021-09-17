<?php

namespace App\Listeners;

use App\Mail\NewAccountUserMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NewAccountUserListener implements ShouldQueue
{
    // public $user;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->user = $user;
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
        Mail::to($event->user)->send(new NewAccountUserMail($event->user));
    }
}
