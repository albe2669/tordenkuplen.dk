<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tordenkuplen</title>
    <link rel="icon" href="img/favicon.png">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div id="app">
        <v-app>
            <app></app>
        </v-app>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    @yield('extra-js')
</body>

</html>
