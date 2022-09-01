<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'r&d') }}</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <div id="app"><example-component></example-component></div>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{asset('js/app.js')}}"></script>
    </head>
    <body>
        <div id="app"></div>
    </body>
</html>
