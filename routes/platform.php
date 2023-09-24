<?php

declare(strict_types=1);

use App\Orchid\Screens\Car\CarListScreen;
use App\Orchid\Screens\Examples\ExampleActionsScreen;
use App\Orchid\Screens\Examples\ExampleCardsScreen;
use App\Orchid\Screens\Examples\ExampleChartsScreen;
use App\Orchid\Screens\Examples\ExampleFieldsAdvancedScreen;
use App\Orchid\Screens\Examples\ExampleFieldsScreen;
use App\Orchid\Screens\Examples\ExampleLayoutsScreen;
use App\Orchid\Screens\Examples\ExampleScreen;
use App\Orchid\Screens\Examples\ExampleTextEditorsScreen;
use App\Orchid\Screens\Office\OfficeEditScreen;
use App\Orchid\Screens\Office\OfficeListScreen;
use App\Orchid\Screens\Page\PageAboutEditScreen;
use App\Orchid\Screens\Page\PageAboutListScreen;
use App\Orchid\Screens\Person\PersonEditScreen;
use App\Orchid\Screens\Person\PersonListScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\Site\SiteListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use App\Orchid\Screens\Vacancy\VacancyEditScreen;
use App\Orchid\Screens\Vacancy\VacancyListScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

// Platform
Route::screen('/main', SiteListScreen::class)->name('platform.site');

// Platform > Offices
Route::screen('/offices', OfficeListScreen::class)->name('platform.offices')
    ->breadcrumbs(fn(Trail $trail) => $trail
//        ->parent('platform.site')
        ->push(__('Offices'), route('platform.offices'))
    );

// Platform > Offices > Office
Route::screen('/offices/{office}/edit', OfficeEditScreen::class)->name('platform.offices.edit')
    ->breadcrumbs(fn(Trail $trail) => $trail
        ->parent('platform.offices')
        ->push(__('Offices'), route('platform.offices.edit'))
    );

// Platform > Offices > Office
Route::screen('/offices/create', OfficeEditScreen::class)->name('platform.offices.create')
    ->breadcrumbs(fn(Trail $trail) => $trail
//        ->parent('platform.site')
        ->parent('platform.offices')
        ->push(__('Offices'), route('platform.offices.create'))
    );

// Platform > Profile
Route::screen('profile', UserProfileScreen::class)->name('platform.profile')
    ->breadcrumbs(fn(Trail $trail) => $trail
//        ->parent('platform.site')
        ->push(__('Profile'), route('platform.profile'))
    );

// Platform > System > Users > User
Route::screen('users/{user}/edit', UserEditScreen::class)->name('platform.systems.users.edit')
    ->breadcrumbs(fn(Trail $trail, $user) => $trail
//        ->parent('platform.site')
        ->parent('platform.systems.users')
        ->push($user->name, route('platform.systems.users.edit', $user))
    );

// Platform > System > Users > Create
Route::screen('users/create', UserEditScreen::class)->name('platform.systems.users.create')
    ->breadcrumbs(fn(Trail $trail) => $trail
//        ->parent('platform.site')
        ->parent('platform.systems.users')
        ->push(__('Create'), route('platform.systems.users.create'))
    );

// Platform > System > Users
Route::screen('users', UserListScreen::class)->name('platform.systems.users')
    ->breadcrumbs(fn(Trail $trail) => $trail
//        ->parent('platform.site')
        ->push(__('Users'), route('platform.systems.users'))
    );

// Platform > System > Roles > Role
Route::screen('roles/{role}/edit', RoleEditScreen::class)->name('platform.systems.roles.edit')
    ->breadcrumbs(fn(Trail $trail, $role) => $trail
        ->parent('platform.systems.roles')
        ->push($role->name, route('platform.systems.roles.edit', $role))
    );

// Platform > System > Roles > Create
Route::screen('roles/create', RoleEditScreen::class)->name('platform.systems.roles.create')
    ->breadcrumbs(fn(Trail $trail) => $trail
        ->parent('platform.systems.roles')
        ->push(__('Create'), route('platform.systems.roles.create'))
    );

// Platform > System > Roles
Route::screen('roles', RoleListScreen::class)->name('platform.systems.roles')
    ->breadcrumbs(fn(Trail $trail) => $trail
//        ->parent('platform.site')
        ->push(__('Roles'), route('platform.systems.roles'))
    );

// Platform > Cars
Route::screen('cars', CarListScreen::class)->name('platform.cars')
    ->breadcrumbs(fn(Trail $trail) => $trail
//        ->parent('platform.site')
        ->push('Каталог', route('platform.cars'))
    );

// Platform > Persons
Route::screen('persons', PersonListScreen::class)->name('platform.persons')
    ->breadcrumbs(fn(Trail $trail) => $trail
//        ->parent('platform.site')
        ->push(__('Persons'), route('platform.persons'))
    );

// Platform > Persons > Create
Route::screen('persons/create', PersonEditScreen::class)->name('platform.persons.create')
    ->breadcrumbs(fn(Trail $trail) => $trail
        ->parent('platform.persons')
        ->push(__('Person'), route('platform.persons.create'))
    );

// Platform > Persons > Edit
Route::screen('persons/{person}/edit', PersonEditScreen::class)->name('platform.persons.edit')
    ->breadcrumbs(fn(Trail $trail, $person) => $trail
        ->parent('platform.persons')
        ->push(__('Person'), route('platform.persons.edit', $person))
    );

// Platform > Vacancies
Route::screen('vacancies', VacancyListScreen::class)->name('platform.vacancies')
    ->breadcrumbs(fn(Trail $trail) => $trail
//        ->parent('platform.site')
        ->push(__('Vacancies'), route('platform.vacancies'))
    );

// Platform > Vacancies > Create
Route::screen('vacancies/create', VacancyEditScreen::class)->name('platform.vacancies.create')
    ->breadcrumbs(fn(Trail $trail) => $trail
        ->parent('platform.vacancies')
        ->push(__('Vacancy'), route('platform.vacancies.create'))
    );

// Platform > Vacancies > Edit
Route::screen('vacancies/{vacancy}/edit', VacancyEditScreen::class)->name('platform.vacancies.edit')
    ->breadcrumbs(fn(Trail $trail, $person) => $trail
        ->parent('platform.vacancies')
        ->push(__('Vacancy'), route('platform.vacancies.edit', $person))
    );

// Platform > Settings > About
Route::screen('settings/about', PageAboutListScreen::class)->name('platform.about')
    ->breadcrumbs(fn(Trail $trail) => $trail
//        ->parent('platform.site')
        ->push(__('About'), route('platform.about'))
    );

// Platform > Settings > About > Create
Route::screen('settings/about/create', PageAboutEditScreen::class)->name('platform.about.create')
    ->breadcrumbs(fn(Trail $trail) => $trail
        ->parent('platform.about')
        ->push(__('About'), route('platform.about.create'))
    );

// Platform > Settings > About > Edit
Route::screen('settings/about/{about}/edit', PageAboutEditScreen::class)->name('platform.about.edit')
    ->breadcrumbs(fn(Trail $trail, $about) => $trail
        ->parent('platform.about')
        ->push(__('About'), route('platform.about.edit', $about))
    );




// Example...
Route::screen('example', ExampleScreen::class)->name('platform.example')
    ->breadcrumbs(fn(Trail $trail) => $trail
        ->parent('platform.site')
        ->push('Example Screen')
    );

Route::screen('/form/examples/fields', ExampleFieldsScreen::class)->name('platform.example.fields');
Route::screen('/form/examples/advanced', ExampleFieldsAdvancedScreen::class)->name('platform.example.advanced');
Route::screen('/form/examples/editors', ExampleTextEditorsScreen::class)->name('platform.example.editors');
Route::screen('/form/examples/actions', ExampleActionsScreen::class)->name('platform.example.actions');

Route::screen('/layout/examples/layouts', ExampleLayoutsScreen::class)->name('platform.example.layouts');
Route::screen('/charts/examples/charts', ExampleChartsScreen::class)->name('platform.example.charts');
Route::screen('/cards/examples/cards', ExampleCardsScreen::class)->name('platform.example.cards');

//Route::screen('idea', Idea::class, 'platform.screens.idea');
