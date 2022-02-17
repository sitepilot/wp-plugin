<?php

namespace Sitepilot\WpPlugin\Support;

use Sitepilot\WpFramework\Support\Application;

abstract class PluginProvider extends Application
{
    protected array $plugin;

    public function __register(): void
    {
        $this->plugin = get_file_data($this->file, [
            'version' => 'Version'
        ], 'plugin');
    }

    public function get_version(): string
    {
        return $this->plugin['version'] ?? '';
    }

    public function get_url(string $path = ''): string
    {
        return plugins_url($path, $this->file);
    }
}
