<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Informació del lloc web -->
    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="@yield('description')">

    <!-- CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  <body>
    <!-- Navbar -->
    @include('layouts.partials.admin.navbar')

    <!-- Contingut -->
    <main id="admin">
      @yield('content')
    </main>

    <!-- Footer -->
    @include('layouts.partials.app.footer')

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Scripts -->
    @yield('scripts')
  </body>
</html>
