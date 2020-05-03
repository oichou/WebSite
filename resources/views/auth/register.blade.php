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
    <form method="POST" action="{{ route('register') }}">
      @csrf
        <div class="illustration">
          <i class="icon ion-ios-locked-outline"></i>
        </div>

        <div class="form-group">
          <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required autocomplete="fname" placeholder="First Name" autofocus>

          @error('fname')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <div class="form-group">
          <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname" placeholder="Last Name" autofocus>

          @error('lname')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <div class="form-group">
          <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="Username" autofocus>

          @error('username')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <div class="form-group">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Adress Email">

          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <div class="form-group">

          <input id="email-confirm" type="email" class="form-control " name="email_confirm" value="{{ old('email') }}" required autocomplete="email" placeholder="Confirm Email">

        </div>

        <div class="form-group">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <div class="form-group">

          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">

        </div>

        <div class="form-group">
          <div class="row d-flex justify-content-center">
              <button type="submit" >
                {{ __('Register') }}
              </button>
          </div>
        </div>

        <a class="btn btn-link forgot" href="{{ route('login') }}">
          <p>You already have an account!Sign in</p>
        </a>
      </form>
</div>
@endsection
