<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @yield('meta')
        <title>{{ $title ?? __('main.title') }}</title>
        @include('layouts.includes.assets.css')
        @include('layouts.includes.assets.fonts')
        @yield('head')
    </head>
    <body class="container body-content">
    @include('layouts.includes.header')
    <div class="container">
        @include('layouts.includes.assets.messages')
        <div class="row">
            <div class="col-bg-12 col-md-12 col-sm-12">
                @yield('content')
            </div>
    {{--        <div class="col-bg-3 col-md-2 col-sm-0">--}}
    {{--            @include('layouts.includes.aside')--}}
    {{--        </div>--}}
        </div>
    </div>
    @include('layouts.includes.assets.js')
    @include('layouts.includes.footer')
    @yield('body')
    </body>
</html>
