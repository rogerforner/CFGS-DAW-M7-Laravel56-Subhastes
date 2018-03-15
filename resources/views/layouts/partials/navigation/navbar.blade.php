<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerMvl" aria-controls="navbarTogglerMvl" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerMvl">
    {{-- Menú Esquerra --}}
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Enllaç <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Enllaç 1</a>
          <a class="dropdown-item" href="#">Enllaç 2</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Enllaç 3</a>
        </div>
      </li>
    </ul><!-- /navegació-esquerra -->
    {{-- Menú Dreta --}}
    <ul class="navbar-nav ml-auto">
      <!-- JSON Feed RSS -->
      <li class="nav-item">
        <a class="nav-link" href="#">Enllaç</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu dropdown-menu-right shadow-4" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Enllaç 1</a>
          <a class="dropdown-item" href="#">Enllaç 2</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Enllaç 3</a>
        </div>
      </li>
    </ul><!-- /navegació-dreta -->
  </div>
</nav>
