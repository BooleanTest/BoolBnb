@extends('layouts.app')

@section('content')
<div class="container_logiscr">
    <div class="row">

                <div class="block">
                  <div class="register_login">{{ __('Iscriviti') }}</div>
                    <form method="POST" action="{{ route('register') }}" class="form">
                        @csrf
                        <div class="name_line">
                            <div class="value">
                              <label for="name" class="">{{ __('') }}</label>
                              <label for="lastname" class="">{{ __('') }}</label>
                              <label for="date_of_birth" class="">{{ __('') }}</label>
                              <label for="email" class="">{{ __('') }}</label>
                              <label for="password" class="">{{ __('') }}</label>
                              <label for="password-confirm" class="">{{ __('') }}</label>
                            </div>
                        </div>
                        <div class="input_group">
                              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nome"><br>
                              <input id="" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="name" autofocus placeholder="Cognome"><br>
                              <input id="" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" required autocomplete="name" autofocus ><br>
                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email"><br>
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password"><br>
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password"><br>
                        </div>
                        <div class="errors">
                          @error('name')
                          <span class="" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                          @error('lastname')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                          @error('date_of_birth')
                          <span class="" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                          @error('email')
                          <span class="" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                          @error('password')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                        <div class="go">
                            <button type="submit" class="">
                                {{ __('Iscriviti') }}
                            </button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
@endsection
