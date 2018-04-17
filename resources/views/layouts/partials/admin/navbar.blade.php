<nav class="navbar admin navbar-expand-lg navbar-dark bg-dark py-0">
  <a class="navbar-brand" href="{{action('HomeController@index')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
  <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarTogglerAdmin" aria-controls="navbarTogglerAdmin" aria-expanded="false" aria-label="Toggle navigation">
    <span class="icon-bar top-bar"></span>
  	<span class="icon-bar middle-bar"></span>
  	<span class="icon-bar bottom-bar"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerAdmin">
    {{-- Menú Esquerra --}}
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      {{-- Enllaç "Dropdown" (Usuaris) --}}
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUsers" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-users"></i> Users</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownUsers">
          <a class="dropdown-item" href="{{action('UserController@index')}}">List users</a>
          <a class="dropdown-item" href="{{action('UserController@create')}}">Create user</a>
        </div>
      </li>

      {{-- Enllaç "Dropdown" (Subhastes) --}}
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAuctions" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-euro-sign"></i> Auctions</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownAuctions">
          <a class="dropdown-item" href="{{action('AuctionAdminController@index')}}">List auctions</a>
          <a class="dropdown-item" href="{{action('AuctionAdminController@create')}}">Create auction</a>
        </div>
      </li>

      {{-- Enllaç "Dropdown" (Productes) --}}
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProducts" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cubes"></i> Products</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownProducts">
          <a class="dropdown-item" href="{{action('ProductController@index')}}">List products</a>
          <a class="dropdown-item" href="{{action('ProductController@create')}}">Create product</a>
        </div>
      </li>

      {{-- Enllaç "Dropdown" (Stock) --}}
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownStock" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-people-carry"></i> Stock</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownStock">
          <a class="dropdown-item" href="{{action('StockController@index')}}">See stock</a>
          <a class="dropdown-item" href="{{action('StockController@create')}}">Add stock</a>
        </div>
      </li>

      {{-- Enllaç "Dropdown" (Categories) --}}
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCategories" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-tags"></i> Categories</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownCategories">
          <a class="dropdown-item" href="{{action('CategoryAdminController@index')}}">List categories</a>
          <a class="dropdown-item" href="{{action('CategoryAdminController@create')}}">Create category</a>
        </div>
      </li>
    </ul>
    {{-- Menú Dreta --}}
    <ul class="navbar-nav ml-auto">
      <!-- Authentication Links -->
      @guest
        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
        <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
      @else
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              <i class="fas fa-user-circle"></i> {{ Auth::user()->name }} <span class="caret"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{action('HomeController@index')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a class="dropdown-item" href="{{action('UserProfileController@index')}}"><i class="fas fa-user-secret"></i> Profile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-power-off"></i> {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
        </li>
      @endguest
    </ul><!-- /navegació-dreta -->
  </div><!-- /.collapse -->
</nav>
