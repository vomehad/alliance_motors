<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Dashboard $dashboard)
    {
        $permissions = ItemPermission::group('menu')
            ->addPermission('monitor', "Доступ к меню");

        $dashboard->registerPermissions($permissions);
    }
}
