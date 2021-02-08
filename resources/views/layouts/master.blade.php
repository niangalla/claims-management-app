<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=no">
        <title>Claims - {{ $title }}</title>
        {{-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/bulma.min.css">
        <link rel="stylesheet" href="assets/css/bootswatch_litera_bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="assets/css/flashy.css">
        <link rel="stylesheet" href="assets/css/about.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        {{-- <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css"> --}}
        <script src="assets/js/jquery-3.4.1.min.js"></script>
        {{-- <script src="assets/js/bootstrap.min.js"></script> --}}
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="assets/js/flashy.js"></script>
    </head>

    <body id="jumbo" style="margin-top: 69px;">

        @include('layouts/partials/_nav')
        @include('flashy::message')

        @yield('content')

        <footer>
         Built with &hearts; by ALLA NIANG Copyright &copy; 2021 - All Rights Reserved
        </footer>

    </body>

</html>
