<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Informació del lloc web -->
    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="@yield('description')">

    <!-- CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  </head>
  <body>
    <!-- Navbar -->
    @include('layouts.partials.navbar')

    <main id="admin">
      <div class="container-fluid">
        <div class="row">
          <!-- Sidebar -->
          <div id="sidebar" class="col-md-2 bg-dark text-light">
            <hr>
            <h5>Usuari X</h5>
            <hr>
            <!-- Enllaços -->
            <div class="row">
              <div class="col">
                @include('layouts.partials.admin.sidenavv')
              </div>
            </div>
          </div><!-- /.col -->

          <!-- Contingut -->
          <div id="content" class="col-md-9">
            @yield('content')
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </main>

    <!-- Footer -->
    @include('layouts.partials.admin.footer')

    <!-- JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
