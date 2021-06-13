<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <div class="container col-12 pt-5">


    <h2>Teacher Name: {{ Auth::user()->adviser->name. "   " .  Auth::user()->adviser->surname}}</h2>
    <div class="container p-5 col-12">

        @include('adviser.pps.teacherDisciplines')
        <br><br>
        @include('adviser.pps.pps1')
        <br><br>
        @include('adviser.pps.pps2')
        <br><br>
        @include('adviser.pps.pps3')
        <br><br>
        @include('adviser.pps.pps4')
        <br><br>
        @include('adviser.pps.pps5')
        <br><br>
        @include('adviser.pps.pps6')
    </div>
    </div>
</body>
