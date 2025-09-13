<?php

namespace Laraflow\Plugin\Listerns;

use App\Events\Disabled;

class PluginDisabled
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
    public function handle(Disabled $event): void
    {
        //
    }
}
