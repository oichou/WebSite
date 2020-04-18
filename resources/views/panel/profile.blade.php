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
  <form class="form-horizontal" method="get" action="{{ route('profile.username') }}">
   <div class="form-group">
    <label class="col-md-2 col-sm-3 col-xs-12 control-label">User Name</label>
    <div class="col-md-10 col-sm-9 col-xs-12">
        <input type="text" class="form-control" value="{{ Auth::user()->username }}" readonly>
        <div class="dec">
       <button id="busername" class="btn btn-dark rounded-pill py-2 btn-block">
         Modify
       </button>
     </div>
     <input id="tusername" type="text" name="username" class="form-control-hh">
     <input id="susername" class="btn-new" type="submit" value="Save new username">
    </div>
  </div>
</form>

 <form class="form-horizontal" method="get" action="{{ route('profile.fname') }}">
   <div class="form-group">
       <label class="col-md-2 col-sm-3 col-xs-12 control-label">First Name</label>
       <div class="col-md-10 col-sm-9 col-xs-12">
           <input type="text" class="form-control" name="fname" value="{{ Auth::user()->first_name }}" readonly>
            <div class="dec">
           <button id="bfname" class="btn btn-dark rounded-pill py-2 btn-block">
             Modify
           </button>
         </div>
         <input id="tfname" type="text" name="fname" class="form-control-hh">
         <input id="sfname" class="btn-new" type="submit" value="Save new First Name">
       </div>
   </div>
 </form>

 <form class="form-horizontal" method="get" action="{{ route('profile.lname') }}">
   <div class="form-group">
       <label class="col-md-2 col-sm-3 col-xs-12 control-label">Last Name</label>
       <div class="col-md-10 col-sm-9 col-xs-12">
           <input type="text" class="form-control" value="{{ Auth::user()->last_name }}" readonly>
           <div class="dec">
          <button id='blname' class="btn btn-dark rounded-pill py-2 btn-block">
            Modify
          </button>
        </div>
        <input id='tlname' type="text" name="lname" class="form-control-hh">
        <input id='slname' class="btn-new" type="submit" value="Save new Last Name">
       </div>
   </div>
 </form>
 <form class="form-horizontal" method="get" action="{{ route('profile.email') }}">
   <div class="form-group">
     <label class="col-md-2 col-sm-3 col-xs-12 control-label">Email</label>
     <div class="col-md-10 col-sm-9 col-xs-12">
         <input type="text" class="form-control" value="{{ Auth::user()->email }}" readonly>
         <div class="dec">
        <button id="bemail" class="btn btn-dark rounded-pill py-2 btn-block">
          Modify
        </button>
      </div>
      <input id='temail' type="text" name="email" class="form-control-hh">
      <input id='semail' class="btn-new" type="submit" value="Save new Email">
     </div>
  </div>
</form>
<form class="form-horizontal" method="get" action="{{ route('profile.phone') }}">
  <div class="form-group">
      <label class="col-md-2 col-sm-3 col-xs-12 control-label">Your phone number</label>
      <div class="col-md-10 col-sm-9 col-xs-12">
          <input type="text" class="form-control" value="{{ Auth::user()->phone }}" readonly>
          <div class="dec">
         <button id='bphone' class="btn btn-dark rounded-pill py-2 btn-block">
           Modify
         </button>
       </div>
       <input id='tphone' type="text" name="phone" class="form-control-hh">
       <input id='sphone' class="btn-new" type="submit" value="Save new Phone Number">
      </div>
  </div>
</form>
<form class="form-horizontal" method="get" action="{{ route('profile.birth') }}">
  <div class="form-group">
      <label class="col-md-2 col-sm-3 col-xs-12 control-label">Your bithdar</label>
      <div class="col-md-10 col-sm-9 col-xs-12">
          <input type="text" class="form-control" value="{{ Auth::user()->birth }}" readonly>
          <div class="dec">
         <button id='bbirth' class="btn btn-dark rounded-pill py-2 btn-block">
           Modify
         </button>
       </div>
       <input id='tbirth' type="text" name="birthday" class="form-control-hh">
       <input id='sbirth' class="btn-new" type="submit" value="Save Your Bithday">
      </div>
  </div>
</form>

</fieldset>


<div class="form-group">
    <!-- <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
        <input class="btn btn-primary" type="submit" value="Set your password">
    </div> -->
    <a class="btn btn-link forgot" href="{{ route('password.request') }}">
        {{ __('Change password') }}
    </a>
</div>


</div>

</div>
@endsection



<!-- Footer -->
@include('footer')
