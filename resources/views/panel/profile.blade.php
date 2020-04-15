@extends('layouts.app')

<!-- Header -->
@include('header')

@section('content')
<div class="container products-section">
  <div class="sidebar_panel">
    <div class="hello">
      <h2> Hello <span>{{ Auth::user()->first_name }}</span></h2>
    </div>
    <ul>
      <li><a href="{{route('overview')}}"> Account Overview</a> </li>
      <li><a href="{{ route('profile')}}"> My Profile</a></li>
      <li><a href="{{ route('orders')}}"> My Online Orders</a> </li>
    </ul>
  </div>

  <!-- Menu -->

  <div class="tit">
    <h2 class="title">Profile</h2>
    <form class="form-horizontal" method="get">
      <div class="form-group">
                                      <label class="col-md-2 col-sm-3 col-xs-12 control-label">User Name</label>
                                      <div class="col-md-10 col-sm-9 col-xs-12">
                                          <input type="text" class="form-control" value="{{ Auth::user()->username }}" readonly>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-md-2 col-sm-3 col-xs-12 control-label">First Name</label>
                                      <div class="col-md-10 col-sm-9 col-xs-12">
                                          <input type="text" class="form-control" value="{{ Auth::user()->first_name }}" readonly>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-md-2 col-sm-3 col-xs-12 control-label">Last Name</label>
                                      <div class="col-md-10 col-sm-9 col-xs-12">
                                          <input type="text" class="form-control" value="{{ Auth::user()->last_name }}" readonly>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-md-2 col-sm-3 col-xs-12 control-label">Email</label>
                                      <div class="col-md-10 col-sm-9 col-xs-12">
                                          <input type="text" class="form-control" value="{{ Auth::user()->email }}" readonly>
                                          <p class="help-block">This is the email </p>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-md-2 col-sm-3 col-xs-12 control-label">Your phone number</label>
                                      <div class="col-md-10 col-sm-9 col-xs-12">
                                          <input type="text" class="form-control" value="{{ Auth::user()->phone }}" readonly>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-md-2 col-sm-3 col-xs-12 control-label">Your bithdar</label>
                                      <div class="col-md-10 col-sm-9 col-xs-12">
                                          <input type="text" class="form-control" value="{{ Auth::user()->birth }}" readonly>
                                      </div>
                                  </div>

                              </fieldset>


                              <div class="form-group">
                                  <!-- <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                                      <input class="btn btn-primary" type="submit" value="Set your password">
                                  </div> -->
                                  <a class="btn btn-link forgot" href="{{ route('password.request') }}">
                                      {{ __('Change password') }}
                                  </a>
                              </div>
    </form>

  </div>

</div>
@endsection


<!-- Footer -->
@include('footer')
