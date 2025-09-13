<?php

namespace Laraflow\Plugin;

use Illuminate\Support\ServiceProvider;

abstract class LaraflowPlugin extends ServiceProvider
{
    abstract public function details(): array;
    abstract public function migrations(): array;
    abstract public function views(): array;
    abstract public function navigations(): array;

    public function register()
    {

    }

    public function boot()
    {

    }

}
