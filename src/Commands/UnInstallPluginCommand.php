<?php

namespace Laraflow\Plugin\Commands;

use Illuminate\Console\Command;

class UnInstallPluginCommand extends Command
{
    public $signature = 'plugin:uninstall';

    public $description = 'To remove configuration of plugin module';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
