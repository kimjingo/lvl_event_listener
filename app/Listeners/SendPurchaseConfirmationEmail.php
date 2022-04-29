<?php

namespace App\Listeners;

use App\Mail\PurchaseConfirmation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendPurchaseConfirmationEmail
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
        $purchase=$event->purchase;
        info($purchase->name);
        //send out email
        Mail::to($purchase->email)->send(new PurchaseConfirmation($purchase));

    }
}
