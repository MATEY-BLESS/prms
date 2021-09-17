<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SeasonalMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public $seasonalmessage;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($seasonalmessage)
    {
        $this->seasonalmessage = $seasonalmessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('notifications.emails.seasonal-message');
    }
}
