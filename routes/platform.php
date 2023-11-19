<?php

declare(strict_types=1);

use App\Models\Picture;
use App\Orchid\Screens\Car\CarListScreen;
use App\Orchid\Screens\Contact\PhotoEditScreen;
use App\Orchid\Screens\Contact\PhotoListScreen;
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
use App\Orchid\Screens\Phone\PhoneEditScreen;
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

$main = 'platform.index';

// Platform
Route::screen('/main', SiteListScreen::class)->name('platform.site');

Route::prefix('phone')->group(function() use ($main) {
    Route::screen('/', SiteListScreen::class)->name('phones')
        ->breadcrumbs(fn(Trail $trail) => $trail
            ->parent($main)
            ->push(__('main.phones'), route('phones'))
        );

    Route::screen('/create', PhoneEditScreen::class)->name('phones.create')
        ->breadcrumbs(fn(Trail $trail) => $trail
            ->parent('phones')
            ->push(__('global.create'), route('phones.create'))
        );
});

Route::prefix('offices')->group(function() use ($main) {
    // Platform > Offices
    Route::screen('/', OfficeListScreen::class)->name('offices')
        ->breadcrumbs(fn(Trail $trail) => $trail
            ->parent($main)
            ->push(__('Offices'), route('offices'))
        );

// Platform > Offices > Office
    Route::screen('/{office}/edit', OfficeEditScreen::class)->name('offices.edit')
        ->breadcrumbs(fn(Trail $trail) => $trail
            ->parent('offices')
            ->push(__('Offices'), route('offices.edit'))
        );

// Platform > Offices > Office
    Route::screen('/create', OfficeEditScreen::class)->name('offices.create')
        ->breadcrumbs(fn(Trail $trail) => $trail
            ->parent('offices')
            ->push(__('Offices'), route('offices.create'))
        );
});

Route::prefix('profile')->group(function() use ($main) {
    // Platform > Profile
    Route::screen('/', UserProfileScreen::class)->name('platform.profile')
        ->breadcrumbs(fn(Trail $trail) => $trail
            ->parent($main)
            ->push(__('Profile'), route('platform.profile'))
        );
});

Route::prefix('cars')->group(function() use ($main) {
// Platform > Cars
    Route::screen('/', CarListScreen::class)->name('platform.cars')
        ->breadcrumbs(fn(Trail $trail) => $trail
            ->parent($main)
            ->push('Каталог', route('platform.cars'))
        );
});

Route::prefix('persons')->group(function() use ($main) {
    // Platform > Persons
    Route::screen('/', PersonListScreen::class)->name('persons')
        ->breadcrumbs(fn(Trail $trail) => $trail
            ->parent($main)
            ->push(__('person.breadcrumbs.list'), route('persons'))
        );
    // Platform > Persons > Create
    Route::screen('/create', PersonEditScreen::class)->name('persons.create')
        ->breadcrumbs(fn(Trail $trail) => $trail
            ->parent('persons')
            ->push(__('person.breadcrumbs.create'), route('persons.create'))
        );

    // Platform > Persons > Edit
    Route::screen('/{person}/edit', PersonEditScreen::class)->name('persons.edit')
        ->breadcrumbs(fn(Trail $trail, $person) => $trail
            ->parent('persons')
            ->push(__('person.breadcrumbs.edit'), route('persons.edit', $person))
        );
});

Route::prefix('vacancies')->group(function() use ($main) {
    // Platform > Vacancies
    Route::screen('/', VacancyListScreen::class)->name('vacancies')
        ->breadcrumbs(fn(Trail $trail) => $trail
            ->parent($main)
            ->push(__('Vacancies'), route('vacancies'))
        );

    // Platform > Vacancies > Create
    Route::screen('/create', VacancyEditScreen::class)->name('vacancies.create')
        ->breadcrumbs(fn(Trail $trail) => $trail
            ->parent('vacancies')
            ->push(__('Vacancy'), route('vacancies.create'))
        );

    // Platform > Vacancies > Edit
    Route::screen('/{vacancy}/edit', VacancyEditScreen::class)->name('vacancies.edit')
        ->breadcrumbs(fn(Trail $trail, $person) => $trail
            ->parent('vacancies')
            ->push(__('Vacancy'), route('vacancies.edit', $person))
        );
});

Route::prefix('settings')->group(function() use ($main) {
    // Platform > Settings > About
    Route::screen('/about', PageAboutListScreen::class)->name('about')
        ->breadcrumbs(fn(Trail $trail) => $trail
            ->parent($main)
            ->push(__('About'), route('about'))
        );

    // Platform > Settings > About > Create
    Route::screen('/about/create', PageAboutEditScreen::class)->name('about.create')
        ->breadcrumbs(fn(Trail $trail) => $trail
            ->parent('about')
            ->push(__('About'), route('about.create'))
        );

    // Platform > Settings > About > Edit
    Route::screen('/about/{about}/edit', PageAboutEditScreen::class)->name('about.edit')
        ->breadcrumbs(fn(Trail $trail, $about) => $trail
            ->parent('about')
            ->push(__('About'), route('about.edit', $about))
        );
});

Route::prefix('contacts')->group(function() use ($main) {
    // Platform > Contacts > Photo
    Route::screen('/photo', PhotoListScreen::class)->name('photos')
        ->breadcrumbs(fn(Trail $trail) => $trail
            ->parent($main)
            ->push(__('Photo'), route('photos'))
        );

    // Platform > Contacts > Photo > Create
    Route::screen('/photo/create', PhotoEditScreen::class)->name('photos.create')
        ->breadcrumbs(fn(Trail $trail) => $trail
            ->parent('photos')
            ->push(__('Photo'), route('photos.create'))
        );

    // Platform > Contacts > Photo > Create
    Route::screen('/photo/{photo}/edit', PhotoEditScreen::class)->name('photos.edit')
        ->breadcrumbs(fn(Trail $trail, Picture $photo) => $trail
            ->parent('photos')
            ->push(__('Photo'), route('photos.edit', $photo))
        );
});

Route::prefix('users')->group(function() use ($main) {
    // Platform > System > Users
    Route::screen('/', UserListScreen::class)->name('platform.systems.users')
        ->breadcrumbs(fn(Trail $trail) => $trail
            ->parent($main)
            ->push(__('Users'), route('platform.systems.users'))
        );

// Platform > System > Users > User
    Route::screen('/{user}/edit', UserEditScreen::class)->name('platform.systems.users.edit')
        ->breadcrumbs(fn(Trail $trail, $user) => $trail
            ->parent('platform.systems.users')
            ->push($user->name, route('platform.systems.users.edit', $user))
        );

// Platform > System > Users > Create
    Route::screen('/create', UserEditScreen::class)->name('platform.systems.users.create')
        ->breadcrumbs(fn(Trail $trail) => $trail
            ->parent('platform.systems.users')
            ->push(__('Create'), route('platform.systems.users.create'))
        );
});

Route::prefix('roles')->group(function() use ($main) {
    // Platform > System > Roles
    Route::screen('/', RoleListScreen::class)->name('platform.systems.roles')
        ->breadcrumbs(fn(Trail $trail) => $trail
            ->parent($main)
            ->push(__('Roles'), route('platform.systems.roles'))
        );

// Platform > System > Roles > Role
    Route::screen('/{role}/edit', RoleEditScreen::class)->name('platform.systems.roles.edit')
        ->breadcrumbs(fn(Trail $trail, $role) => $trail
            ->parent('platform.systems.roles')
            ->push($role->name, route('platform.systems.roles.edit', $role))
        );

// Platform > System > Roles > Create
    Route::screen('/create', RoleEditScreen::class)->name('platform.systems.roles.create')
        ->breadcrumbs(fn(Trail $trail) => $trail
            ->parent('platform.systems.roles')
            ->push(__('Create'), route('platform.systems.roles.create'))
        );
});







// Example...
Route::screen('example', ExampleScreen::class)->name('platform.example')
    ->breadcrumbs(fn(Trail $trail) => $trail
        ->parent($main)
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
