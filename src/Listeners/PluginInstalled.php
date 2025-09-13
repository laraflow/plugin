<?php

namespace Laraflow\Plugin\Listerns;

use App\Events\Installed;

class PluginInstalled
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
    public function handle(Installed $event): void
    {
        //
    }
}
