<?php

namespace Laraflow\Plugin;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

abstract class LaraflowPlugin extends ServiceProvider
{
    abstract public function details(): array;

    abstract public function migrations(): array;

    abstract public function views(): array;

    abstract public function navigations(): array;

    public function components(): array
    {
        return [];
    }

    public function register()
    {

    }

    public function boot()
    {
        Blade::components($this->components());
    }
}
