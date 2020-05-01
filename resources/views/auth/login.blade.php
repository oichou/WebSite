@extends('layouts.app')

<!-- Header -->
@include('header')

@section('content')
<div class="login-dark">
    <form method="POST" action="{{ route('login') }}">
      @csrf
        <div class="illustration">
          <i class="icon ion-ios-locked-outline"></i>
        </div>

        <div class="form-group">
          
          <input id="Login" type="text" class="form-control @error('Login') is-invalid @enderror" name="Login" value="{{ old('Login') }}" required autocomplete="Login" placeholder="username ou email" autofocus>

          @error('Login')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <div class="form-group">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

          <div class="form-group">
            <input class="form-check-input remember" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

            <label class="form-check-label remember" >
                {{ __('Remember Me') }}
            </label>
          </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">
              {{ __('Log in') }}
          </button>
        </div>

        @if (Route::has('password.request'))
            <a class="btn btn-link forgot" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
        <a class="btn btn-link forgot" href="{{ route('register') }}">
          Don't have an account!Sign up
        </a>
      </form>
</div>
@endsection
