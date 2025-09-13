<?php

namespace Laraflow\Plugin\Listerns;

use App\Events\Uninstalled;

class PluginUninstalled
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
    public function handle(Uninstalled $event): void
    {
        //
    }
}
