<?php

namespace Laraflow\Plugin\Listerns;

use App\Events\Enabled;

class PluginEnabled
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
    public function handle(Enabled $event): void
    {
        //
    }
}
