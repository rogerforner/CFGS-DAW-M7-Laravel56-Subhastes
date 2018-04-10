<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-0">
  <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
  <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarTogglerApp" aria-controls="navbarTogglerApp" aria-expanded="false" aria-label="Toggle navigation">
    <span class="icon-bar top-bar"></span>
  	<span class="icon-bar middle-bar"></span>
  	<span class="icon-bar bottom-bar"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerApp">
    {{-- Menú Esquerra --}}
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/') }}">Home {!! Request::is('/') ? '<span class="sr-only">(current)</span>' : '' !!}</a>
      </li>
    </ul><!-- /navegació-esquerra -->
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
  </div>
</nav>
