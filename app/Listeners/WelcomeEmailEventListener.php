<?php

namespace App\Listeners;

use App\Events\NewRegisteredUserEvent;
use App\Mail\WelcomeEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class WelcomeEmailEventListener
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
     * @param  NewRegisteredUserEvent  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        //Enviar email
        Mail::to('alexbonavila@iesebre.com')->send(new WelcomeEmail);
    }
}
