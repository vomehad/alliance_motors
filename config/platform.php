<?php

return [
    'domain' => env('DASHBOARD_DOMAIN', null),
    'prefix' => env('DASHBOARD_PREFIX', '/admin'),
    'middleware' => [
        'public'  => ['web', 'cache.headers:private;must_revalidate;etag'],
        'private' => ['web', 'platform', 'cache.headers:private;must_revalidate;etag'],
    ],
    'guard' => config('auth.defaults.guard', 'web'),
    'auth' => true,
    'index' => 'platform.site',
    'profile' => 'platform.profile',
    'resource' => [
        'stylesheets' => [],
        'scripts'     => [],
    ],
    'vite' => [],
    'template' => [
        'header' => '',
        'footer' => '',
    ],
    'attachment' => [
        'disk'      => env('FILESYSTEM_DISK', 'public'),
        'generator' => \Orchid\Attachment\Engines\Generator::class,
    ],
    'icons' => [
        'bs'  => \Orchid\Support\BootstrapIconsPath::getFolder(),
    ],

    /*
     |--------------------------------------------------------------------------
     | Notifications
     |--------------------------------------------------------------------------
     |
     | Notifications are an excellent way to inform your users about what is
     | happening in your application. These notifications can be viewed by
     | clicking on the notification bell icon in the application's navigation bar.
     | The notification bell will have an unread count indicator when there are
     | unread announcements or notifications.
     |
     | By default, the interval for updating notifications is set to one minute.
     */

    'notifications' => [
        'enabled'  => true,
        'interval' => 60,
    ],

    /*
     |--------------------------------------------------------------------------
     | Search
     |--------------------------------------------------------------------------
     |
     | This configuration option determines which models will be searchable in the
     | sidebar search feature. To be searchable, a model must have a Presenter and
     | a Scout class defined for it.
     |
     | Example:
     |
     | 'search' => [
     |     \App\Models\User::class,
     |     \App\Models\Post::class,
     | ],
     |
     */

    'search' => [
        // \App\Models\User::class
    ],

    /*
     |--------------------------------------------------------------------------
     | Hotwire Turbo
     |--------------------------------------------------------------------------
     |
     | Turbo Drive maintains a cache of recently visited pages.
     | This cache serves two purposes: to display pages without accessing
     | the network during restoration visits, and to improve perceived
     | performance by showing temporary previews during application visits.
     |
     */

    'turbo' => [
        'cache'   => true,
    ],

    /*
     |--------------------------------------------------------------------------
     | Fallback Page
     |--------------------------------------------------------------------------
     |
     | If the request does not match any route and arguments,
     | Orchid will automatically generate its own 404 page.
     | It can be disabled if you want to declare routes on the same
     | domain and prefix or create your own page.
     |
     */

    'fallback' => true,

    /*
    |--------------------------------------------------------------------------
    | Workspace
    |--------------------------------------------------------------------------
    |
    | The workspace option sets the template that wraps the content of the screens.
    | It determines whether the entire user screen will be used or whether
    | the content will be compressed to a fixed width.
    |
    | Options: 'platform::workspace.compact', 'platform::workspace.full'
    |
    */

    'workspace' => 'platform::workspace.compact',

    /*
    |--------------------------------------------------------------------------
    | Prevents Abandonment
    |--------------------------------------------------------------------------
    |
    | This option determines whether the Prevents Abandonment feature is enabled
    | or disabled for the application.
    |
    */

    'prevents_abandonment' => true,

    /*
     |--------------------------------------------------------------------------
     | Service Provider
     |--------------------------------------------------------------------------
     |
     | This value is a class namespace of the platform's service provider. You
     | can override it to define a custom namespace. This may be useful if you
     | want to place Orchid's service provider in a location different from
     | "app/Orchid".
     |
     */

    'provider' => \App\Orchid\PlatformProvider::class,

];
