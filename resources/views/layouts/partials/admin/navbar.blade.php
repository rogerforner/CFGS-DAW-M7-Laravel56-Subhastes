<nav class="navbar admin navbar-expand-lg navbar-dark bg-dark py-0">
  <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarTogglerAdmin" aria-controls="navbarTogglerAdmin" aria-expanded="false" aria-label="Toggle navigation">
    <span class="icon-bar top-bar"></span>
  	<span class="icon-bar middle-bar"></span>
  	<span class="icon-bar bottom-bar"></span>
  </button>
  <a class="navbar-brand" href="{{ url('/admin') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
  <div class="collapse navbar-collapse" id="navbarTogglerAdmin">
    {{-- Menú Esquerra --}}
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      {{-- Enllaç "Dropdown" (Usuaris) --}}
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUsers" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-users"></i> Usuaris</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownUsers">
          <a class="dropdown-item" href="#">Llistar</a>
          <a class="dropdown-item" href="#">Crear</a>
        </div>
      </li>

      {{-- Enllaç "Dropdown" (Rols) --}}
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownRoles" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-secret"></i> Rols</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownRoles">
          <a class="dropdown-item" href="#">Llistar</a>
          <a class="dropdown-item" href="#">Crear</a>
        </div>
      </li>

      {{-- Enllaç "Dropdown" (Subhastes) --}}
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAuctions" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-euro-sign"></i> Subhastes</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownAuctions">
          <a class="dropdown-item" href="#">Llistar</a>
          <a class="dropdown-item" href="#">Crear</a>
        </div>
      </li>

      {{-- Enllaç "Dropdown" (Productes) --}}
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProducts" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cubes"></i> Productes</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownProducts">
          <a class="dropdown-item" href="#">Llistar</a>
          <a class="dropdown-item" href="#">Crear</a>
        </div>
      </li>

      {{-- Enllaç "Dropdown" (Categories) --}}
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCategories" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-tags"></i> Categories</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownCategories">
          <a class="dropdown-item" href="#">Llistar</a>
          <a class="dropdown-item" href="#">Crear</a>
        </div>
      </li>
    </ul>
  </div><!-- /.collapse -->
</nav>