<?php

namespace Laraflow\Plugin\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * // Crud Service Method Point Do not Remove //
 *
 * @see \Laraflow\Plugin\Plugin
 */
class Plugin extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Laraflow\Plugin\Plugin::class;
    }
}
