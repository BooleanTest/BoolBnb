<div class="header">

  <div class="nav-bar">
    <div class="logo">
      <h1 class="">BoolBnB</h1>
    </div>
    <div class="login">
      @if (Route::has('login'))
        <div class="links">
          @auth
            <a href="{{ url('/') }}">Benvenuto</a>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          @else
            <a href="{{ route('login') }}">Accedi</a>
            @if (Route::has('register'))
              <a href="{{ route('register') }}">Registrati</a>
            @endif
          @endauth
        </div>
      @endif
    </div>
  </div>

  <div class="search-bar">
    Fantastica barra di ricerca
  </div>

</div>
