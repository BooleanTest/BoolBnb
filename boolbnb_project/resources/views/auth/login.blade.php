@extends('layouts.app')

@section('content')
<div class="container_logiscr">
  <div class="row">
    <div class="block">
      <div class="register_login">{{ __('Accedi') }}</div>
      <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Labels per il passaggio di valori -->
        <div class="name_line">
          <div class="value">
            <label for="email" class="">{{ __('') }}</label>
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('') }}</label>
          </div>
        </div>

        <!-- Input email e pass -->
        <div class="input_group">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="email">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password">
        </div>

        <!-- Checkbox ricordami -->
        <div class="remember">
          <label class="form-check-label" for="remember">{{ __('Ricordami') }}</label>
          <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        </div>

        <!-- Erroris -->
        <div class="errors">
          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span><br>
          @enderror
          @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span><br>
          @enderror
          @if (Route::has('password.request'))
          <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Password dimenticata?') }}
          </a>
          @endif
        </div>

        <!-- Button -->
        <div class="go">
          <button type="submit" class="btn btn-primary">
            {{ __('Login') }}
          </button>
        </div>

      </form>
    </div>
  </div>
</div>
@endsection
