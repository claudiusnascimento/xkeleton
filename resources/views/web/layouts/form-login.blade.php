<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Bootstrap -->
        <link href="{{ asset('vendor/gentelelladashboard/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{ asset('vendor/gentelelladashboard/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

        <link href="{{ asset('vendor/gentelelladashboard/css/custom.min.css') }}" rel="stylesheet">
    </head>
    <body class="login">

        @yield('content')

        <!-- jQuery -->
        <script src="{{ asset('vendor/gentelelladashboard/vendors/jquery/dist/jquery.min.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('vendor/gentelelladashboard/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    </body>
</html>
