<?php namespace Wpjscc\Ui;

use Backend;
use Backend\Models\UserRole;
use System\Classes\PluginBase;

/**
 * ui Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     */
    public function pluginDetails(): array
    {
        return [
            'name'        => 'wpjscc.ui::lang.plugin.name',
            'description' => 'wpjscc.ui::lang.plugin.description',
            'author'      => 'wpjscc',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     */
    public function register(): void
    {

    }

    /**
     * Boot method, called right before the request route.
     */
    public function boot(): void
    {

    }

    /**
     * Registers any frontend components implemented in this plugin.
     */
    public function registerComponents(): array
    {
        return []; // Remove this line to activate

        return [
            'Wpjscc\Ui\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any backend permissions used by this plugin.
     */
    public function registerPermissions(): array
    {
        return []; // Remove this line to activate

        return [
            'wpjscc.ui.some_permission' => [
                'tab' => 'wpjscc.ui::lang.plugin.name',
                'label' => 'wpjscc.ui::lang.permissions.some_permission',
                'roles' => [UserRole::CODE_DEVELOPER, UserRole::CODE_PUBLISHER],
            ],
        ];
    }

    /**
     * Registers backend navigation items for this plugin.
     */
    public function registerNavigation(): array
    {
        // return []; // Remove this line to activate

        return [
            'ui' => [
                'label'       => 'wpjscc.ui::lang.plugin.name',
                'url'         => Backend::url('wpjscc/ui/configs'),
                'icon'        => 'icon-leaf',
                'permissions' => ['wpjscc.ui.*'],
                'order'       => 500,
            ],
        ];
    }
}
