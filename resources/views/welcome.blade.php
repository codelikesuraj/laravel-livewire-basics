<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Livewire</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <liveire:styles />

        @vite( 'resources/js/app.js')
    </head>
    <body class="antialiased">
        <div class="grid grid-cols-1 justify-center">
            <livewire:contact-form />
            <livewire:search-dropdown />
        </div>

        <!-- Scripts -->
        <livewire:scripts />
    </body>
</html>
