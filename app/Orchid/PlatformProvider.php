<?php

declare(strict_types=1);

namespace App\Orchid;

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
            Menu::make('Главная')
                ->icon('bs.phone')
                ->route('platform.site'),

            Menu::make('Офисы')
                ->icon('bs.book')
                ->route('offices'),

            Menu::make('Каталог')
                ->icon('bs.car-front')
                ->route('platform.cars'),

            Menu::make('Персонал')
                ->icon('bs.person')
                ->route('persons'),

            Menu::make('Вакансии')
                ->icon('bs.basket3-fill')
                ->route('vacancies'),

            Menu::make('Настройки "О компании"')
                ->icon('bs.about')
                ->route('about'),

            Menu::make('Настройка фото контактов')
                ->icon('film')
                ->route('photos')
            ,

//            Menu::make('Form Elements')
//                ->icon('bs.journal')
//                ->route('platform.example.fields')
//                ->active('*/form/examples/*'),
//
//            Menu::make('Overview Layouts')
//                ->icon('bs.columns-gap')
//                ->route('platform.example.layouts')
//                ->active('*/layout/examples/*'),
//
//            Menu::make('Charts')
//                ->icon('bs.bar-chart')
//                ->route('platform.example.charts'),
//
//            Menu::make('Cards')
//                ->icon('bs.card-text')
//                ->route('platform.example.cards')
//                ->divider(),

            Menu::make(__('Users'))
                ->icon('bs.people')
                ->route('platform.systems.users')
                ->permission('platform.systems.users')
                ->title(__('Access Controls')),

            Menu::make(__('Roles'))
                ->icon('bs.lock')
                ->route('platform.systems.roles')
                ->permission('platform.systems.roles')
                ->divider(),

//            Menu::make('Documentation')
//                ->title('Docs')
//                ->icon('bs.box-arrow-up-right')
//                ->url('https://orchid.software/en/docs')
//                ->target('_blank'),
//
//            Menu::make('Changelog')
//                ->icon('bs.box-arrow-up-right')
//                ->url('https://github.com/orchidsoftware/platform/blob/master/CHANGELOG.md')
//                ->target('_blank')
//                ->badge(fn () => Dashboard::version(), Color::DARK),
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
            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users')),
        ];
    }
}
