<?php

namespace App\Listeners;

use App\Events\TicketCreated;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketCreated as NewTicketMail;

class SendNewTicketMail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TicketCreated $event): void
    {
        if (isset($event->ticket->email)) {
            Mail::to($event->ticket->email)
                ->send(new NewTicketMail($event->ticket));
        }
    }
}
