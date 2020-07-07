<div class="header">

  <div class="nav-bar">
    <div class="logo">
      <h1 class="">BoolBnB</h1>
    </div>
    <div class="login">
      @if (Route::has('login'))
        <div class="links">
          @auth
            <a class="h-username" href="{{route('profilo', Auth::user()->id)}}">{{Auth::user()->name}}</a>
            <a class="h-logout" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          @else
            <a class="h-logout" href="{{ route('login') }}">Accedi</a>
            @if (Route::has('register'))
              <a class="h-logout" href="{{ route('register') }}">Registrati</a>
            @endif
          @endauth
        </div>
      @endif
    </div>
  </div>

  {{-- h sta per header --}}

  <div class="search-h-bar">
    <form class="search-h-form" action="" method="post">

      <div class="search-h-box">
        <label for="">
          <input type="text" name="" value="" placeholder="Dove vuoi andare?">
        </label>
      </div>

    </form>
  </div>

</div>
