<?php

namespace App\Listeners;

use App\Events\requestNotify;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class popUp
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
     * @param  requestNotify  $event
     * @return void
     */
    public function handle(requestNotify $event)
    {
        //
    }
}
