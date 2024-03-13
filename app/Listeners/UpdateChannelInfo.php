<?php

namespace App\Listeners;

use App\Events\ChannelNeedsUpdate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateChannelInfo
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
    public function handle(ChannelNeedsUpdate $event): void
    {
        //
    }
}
