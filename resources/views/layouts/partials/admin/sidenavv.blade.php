<nav class="nav flex-column">
  {{-- Enllaç Normal --}}
  <a class="nav-link text-white" href="{{ url('/admin') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>

  {{-- Enllaç "Dropdown" (Usuaris) --}}
  <a class="nav-link text-white"
     data-toggle="collapse" href="#collapseUsers" aria-expanded="false"
     aria-controls="collapseUsers">
    <i class="fas fa-users"></i> Usuaris
  </a>
  <div class="collapse" id="collapseUsers">
    <li><a class="nav-link text-white" href="#">Llistar</a></li>
    <li><a class="nav-link text-white" href="#">Crear</a></li>
  </div>

  {{-- Enllaç "Dropdown" (Rols) --}}
  <a class="nav-link text-white"
     data-toggle="collapse" href="#collapseRoles" aria-expanded="false"
     aria-controls="collapseRoles">
    <i class="fas fa-user-secret"></i> Rols
  </a>
  <div class="collapse" id="collapseRoles">
    <li><a class="nav-link text-white" href="#">Llistar</a></li>
    <li><a class="nav-link text-white" href="#">Crear</a></li>
  </div>

  {{-- Enllaç "Dropdown" (Rols) --}}
  <a class="nav-link text-white"
     data-toggle="collapse" href="#collapseAuctions" aria-expanded="false"
     aria-controls="collapseAuctions">
    <i class="fas fa-euro-sign"></i> Subhastes
  </a>
  <div class="collapse" id="collapseAuctions">
    <li><a class="nav-link text-white" href="#">Llistar</a></li>
    <li><a class="nav-link text-white" href="#">Crear</a></li>
  </div>
</nav>

{{-- Enllaç "Dropdown" (Apostes) --}}
