<div class="header">

  <div class="nav-bar">
    <div class="logo">
      <a href="{{route ('home')}}"><h1 class="">BoolBnB</h1></a>

    </div>
    <div class="login">
      @if (Route::has('login'))
        <div class="links">
          @auth
          <div class="username">
            <a class="nav-button" href="{{route('profilo', Auth::user()->id)}}">{{Auth::user()->name}}</a>
            <a class="nav-button" href="{{ route('logout') }}"
            <a href="{{ route('logout') }}"

            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>
          @else
          <div class="username">
            <a class="nav-button" href="{{ route('login') }}">Accedi</a>
              @if (Route::has('register'))
            <a class="nav-button" href="{{ route('register') }}">Registrati</a>
          </div>
          @endif
          @endauth
          </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

        </div>
      @endif
    </div>
  </div>

</div>
