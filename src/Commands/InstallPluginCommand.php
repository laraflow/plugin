<?php

namespace Laraflow\Plugin\Commands;

use Illuminate\Console\Command;

class InstallPluginCommand extends Command
{
    public $signature = 'plugin:install';

    public $description = 'To load configuration of plugin module';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
