<?php

namespace Laraflow\Plugin;

use Illuminate\Support\Collection;

class Plugin
{
    private static $instance = null;

    private array $plugins = [];

    private array $paths = [];

    public static function getInstance(): static
    {
        if (self::$instance === null) {
            self::$instance = new static(
                config('laraflow.plugin.locations.include', []),
                config('laraflow.plugin.locations.exclude', []),
                config('laraflow.plugin.bootstrapper', 'Plugin.php'),
            );
        }

        return self::$instance;
    }

    public function getClasses(): array
    {
        return array_keys($this->plugins);
    }

    private function __construct(array $locations, array $exclude, string $bootstrapper)
    {
        $pattern = '#(' . implode('|', array_map('preg_quote', $exclude)) . ')#i';

        foreach ($locations as $location) {

            $paths = glob(base_path("{$location}/{$bootstrapper}")) ?? [];

            empty($exclude)
                ? array_push($this->paths, ...$paths)
                : array_push($this->paths, ...preg_grep($pattern, $paths, PREG_GREP_INVERT));
        }

        foreach ($this->paths as $path) {
            $this->plugins[$this->classNamespace($path)] = true;
        }
    }

    private function classNamespace(string $path): ?string
    {
        $contents = file_get_contents($path);

        // Extract namespace
        if (preg_match('/namespace\s+([^;]+);/', $contents, $ns)) {
            $namespace = trim($ns[1]);
        } else {
            return null;
        }

        // Extract class name
        if (preg_match('/class\s+([^\s]+)/', $contents, $cls)) {
            $class = trim($cls[1]);
        } else {
            return null;
        }

        return "{$namespace}\\{$class}";
    }

    public function getPlugins(): Collection
    {
        $entries = collect();

        foreach ($this->plugins as $namespace => $instance) {

            $this->plugins[$namespace] = match (true) {
                $instance instanceof LaraflowPlugin => $instance,
                default => new $namespace(app())
            };

            $entries->push($this->plugins[$namespace]->details());
        }

        return $entries;
    }
}
