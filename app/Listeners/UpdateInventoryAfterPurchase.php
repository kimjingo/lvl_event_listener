<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Item;

class UpdateInventoryAfterPurchase
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
        info("hello");
        $purchase = $event->purchase;
        info($purchase->name);
        foreach(json_decode($purchase->items) as $id => $quantity){
            Item::find($id)->decrement('quantity', $quantity);
        }
    }
}
