<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('default/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('default/css/phc_styles.css') }}" rel="stylesheet">
    <link href="{{ asset('default/css/slim.css') }}" rel="stylesheet">


    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>
<body class="base_bg">
    <!-- Main Header -->
    @include('layouts/partials/site/header')

    <div class="login_form_wrap clearfix">
      <!-- Start of Main Container -->
      @include('layouts/partials/site/navigation')
      @yield('content')
    </div>

    @include('layouts/partials/site/footer')

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="{{ asset("default/js/jquery-1.8.2.min.js") }}"><\/script>');</script>

    <script src="{{ asset('/default/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/default/js/jquery.validate.js') }}"></script>
    <script src="{{ asset('/default/js/validation_rules.js') }}"></script>
</body>
</html>
