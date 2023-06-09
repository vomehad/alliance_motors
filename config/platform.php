<?php

use App\Orchid\PlatformProvider;
use Orchid\Attachment\Engines\Generator;
use Orchid\Support\BootstrapIconsPath;

return [
    'domain' => env('DASHBOARD_DOMAIN', null),
    'prefix' => env('DASHBOARD_PREFIX', '/admin'),
    'middleware' => [
        'public'  => ['web', 'cache.headers:private;must_revalidate;etag'],
        'private' => ['web', 'platform', 'cache.headers:private;must_revalidate;etag'],
    ],
    'guard' => config('auth.defaults.guard', 'web'),
    'auth' => true,
    'index' => 'platform.main',
    'profile' => 'platform.profile',
    'resource' => ['stylesheets' => [], 'scripts'     => []],
    'vite' => [],
    'template' => ['header' => '', 'footer' => ''],
    'attachment' => ['disk'      => env('FILESYSTEM_DISK', 'public'), 'generator' => Generator::class],
    'icons' => ['bs'  => BootstrapIconsPath::getFolder()],'notifications' => ['enabled'  => true, 'interval' => 60],
    'search' => [],
    'turbo' => ['cache'   => true],
    'fallback' => true,
    'workspace' => 'platform::workspace.compact',
    'prevents_abandonment' => true,
    'provider' => PlatformProvider::class,
];
