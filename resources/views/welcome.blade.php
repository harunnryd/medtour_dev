<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script>window.Laravel = {csrf_token: '{{ csrf_token() }}'}</script>
        <meta name="_token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
        <title>Percobaan</title>
    </head>
    <body>
        <transition>
            <router-view>
                <div id="app">

                </div>
            </router-view>
        </transition>
    </body>
    <script src="{{ mix('/js/app.js') }}"></script>
</html>
