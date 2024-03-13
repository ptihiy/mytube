<?php

namespace App\Listeners;

use App\Events\ChannelDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ClearChannelData
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
    public function handle(ChannelDeleted $event): void
    {
        \Log::info($event->item->id);
    }
}
