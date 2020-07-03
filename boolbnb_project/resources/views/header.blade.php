<div class="header">
  <div class="logo">
    <h1 class="ciao">BoolBNB</h1>
  </div>
  <div class="login">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
  </div>
</div>
