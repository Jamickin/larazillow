<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @routes
        @vite('resources/js/app.js')
        @inertiaHead
        <title>Laravel</title>
    </head>
    <body class="bg-slate-200 dark:bg-gray-900 text-gray-800 dark:text-gray-300">
    @inertia
    </body>
</html>
