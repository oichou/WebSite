@extends('layouts.app')

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
          <button type="submit" class="btn btn-primary btn-block">
              {{ __('Register') }}
          </button>
        </div>

        <a class="btn btn-link forgot" href="{{ route('login') }}">
          <p>You already have an account!Sign in</p>
        </a>
      </form>
</div>
@endsection
