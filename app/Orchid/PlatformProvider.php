<?php

declare(strict_types=1);

namespace App\Orchid;

use App\Interfaces\Permissions;
use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param Dashboard $dashboard
     *
     * @return void
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * Register the application menu.
     *
     * @return Menu[]
     */
    public function menu(): array
    {
        return [
            Menu::make('Get Started')
                ->permission(Permissions::MAIN)
                ->icon('bs.book')
                ->title('Navigation')
                ->route(config('platform.index')),

            Menu::make('Example Screen')
                ->permission(Permissions::MAIN)
                ->icon('bs.collection')
                ->route('platform.example')
                ->badge(fn () => 6),

            Menu::make('Form Elements')
                ->permission(Permissions::MAIN)
                ->icon('bs.journal')
                ->route('platform.example.fields')
                ->active('*/form/examples/*'),

            Menu::make('Overview Layouts')
                ->permission(Permissions::MAIN)
                ->icon('bs.columns-gap')
                ->route('platform.example.layouts')
                ->active('*/layout/examples/*'),

            Menu::make('Charts')
                ->permission(Permissions::MAIN)
                ->icon('bs.bar-chart')
                ->route('platform.example.charts'),

            Menu::make('Cards')
                ->permission(Permissions::MAIN)
                ->icon('bs.card-text')
                ->route('platform.example.cards')
                ->divider(),

            Menu::make(__('Users'))
                ->permission(Permissions::MAIN)
                ->icon('bs.people')
                ->route('platform.systems.users')
                ->title(__('Access Controls')),

            Menu::make(__('Roles'))
                ->permission(Permissions::MAIN)
                ->icon('bs.lock')
                ->route('platform.systems.roles')
                ->divider(),

            Menu::make('Documentation')
                ->permission(Permissions::MAIN)
                ->title('Docs')
                ->icon('bs.box-arrow-up-right')
                ->url('https://orchid.software/en/docs')
                ->target('_blank'),
        ];
    }

    /**
     * Register permissions for the application.
     *
     * @return ItemPermission[]
     */
    public function permissions(): array
    {
        return [
            ItemPermission::group(__('Orchid.Permissions.Group.Menu'))
                ->addPermission(Permissions::MAIN, __('Orchid.Permissions.Menu.Main')),
        ];
    }
}
