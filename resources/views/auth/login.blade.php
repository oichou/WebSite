@extends('layouts.app')

@section('extra-css')
<style media="screen">

button {
  position: relative;
  height: 60px;
  width: 200px;
  border: none;
  outline: none;
  color: white;
  background: #111;
  cursor: pointer;
  border-radius: 5px;
  font-size: 18px;
  font-family: 'Raleway', sans-serif
}

button:before {
  position: absolute;
  content: '';
  top: -2px;
  left: -2px;
  height: calc(100% + 4px);
  width: calc(100% + 4px);
  border-radius: 5px;
  z-index: -1;
  opacity: 0;
  filter: blur(5px);
  background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
  background-size: 400%;
  transition: opacity .3s ease-in-out;
  animation: animate 20s linear infinite
}

button:hover:before {
  opacity: 1
}

button:hover:active {
  background: none
}

button:hover:active:before {
  filter: blur(2px)
}

@keyframes animate {
  0% {
      background-position: 0 0
  }

  50% {
      background-position: 400% 0
  }

  100% {
      background-position: 0 0
  }
}
</style>
@endsection
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
            <div class="row d-flex justify-content-center">
                <button type="submit" >
                  {{ __('Log in') }}
                </button>
            </div>
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
