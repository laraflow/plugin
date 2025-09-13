<?php

// config for Laraflow/Plugin
return [

    /*
    |--------------------------------------------------------------------------
    | Enable Plugin Routes
    |--------------------------------------------------------------------------
    | This setting control plugin should be registered
    */
    'enabled' => env('PLUGIN_ENABLED', true),

    /*
    |--------------------------------------------------------------------------
    | Plugin Locations
    |--------------------------------------------------------------------------
    |
    | This value will be used across system to lookup where plugins are located.
    | the path has to be related to application base directory. System use glob
    | function to search for plugin file.
    */

    'locations' => [
        'include' => [
            'plugins/*/*',
            'vendor/*/*',
        ],
        'exclude' => [
            //            'vendor/laraflow/plugin'
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Bootstrapper
    |--------------------------------------------------------------------------
    |
    | This value will be used to locate root file
    */

    'bootstrapper' => 'Plugin.php',
];
