<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ $title ?? null }} - {{ config('app.name') }}</title>

        @vite(['resources/js/app.js', 'resources/sass/app.scss'])
    </head>
    <body class="bg-white text-base dark:bg-neutral-900 text-neutral-900 dark:text-neutral-200">
        <x-layouts.header />
        {{ $slot }}
    </body>
</html>
