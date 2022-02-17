<?php

namespace Sitepilot\WpPlugin\Support;

use Sitepilot\WpFramework\Support\Application;

abstract class PluginProvider extends Application
{
    /**
     * The WordPress plugin data.
     *
     * @var array
     */
    protected array $plugin;

    /**
     * Register plugin services.
     *
     * @return void
     */
    public function __register(): void
    {
        $this->plugin = get_file_data($this->file, [
            'version' => 'Version'
        ], 'plugin');
    }

    /**
     * Returns the plugin version.
     *
     * @return string
     */
    public function get_version(): string
    {
        return $this->plugin['version'] ?? '';
    }

    /**
     * Get plugin url path.
     *
     * @param string $path
     * @return string
     */
    public function get_url(string $path = ''): string
    {
        return plugins_url($path, $this->file);
    }
}
