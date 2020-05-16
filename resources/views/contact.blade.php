@extends('layouts.app')
<!-- Header -->
@include('header')

@section('content')

<div class="container-contact100">
  <div class="contact100-map" data-map-x="40.722047" data-map-y="-73.986422" data-pin="images/icons/map-marker.png" data-scrollwhell="0" data-draggable="1"></div>

  <button class="contact100-btn-show">
    <i class="fa fa-envelope-o" aria-hidden="true"></i>
  </button>

  <div class="wrap-contact100">
    <button class="contact100-btn-hide">
      <i class="fa fa-close" aria-hidden="true"></i>
    </button>

    @if(count($errors) > 0)
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert">x</button>
      <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
      </ul>
    </div>
    @endif

    @if($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>{{ $message }}</strong>
      </div>
    @endif

    <form class="contact100-form validate-form" method="post" action="{{ url('send')}}">
      {{ csrf_field() }}
      <span class="contact100-form-title">
        Contact Us
      </span>

      <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Name is required">
        <span class="label-input100">Your Name</span>
        <input class="input100" type="text" name="name" placeholder="Enter your name">
        <span class="focus-input100"></span>
      </div>

      <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
        <span class="label-input100">Email</span>
        <input class="input100" type="text" name="email" placeholder="Enter your email addess">
        <span class="focus-input100"></span>
      </div>

      <div class="wrap-input100 validate-input" data-validate = "Message is required">
        <span class="label-input100">Message</span>
        <textarea class="input100" name="message" placeholder="Your message here..."></textarea>
        <span class="focus-input100"></span>
      </div>

      <div class="container-contact100-form-btn">
        <input class="contact100-form-btn fa fa-long-arrow-right m-l-7" type="submit" name='sendemail' value="Send">
      </div>
    </form>

  </div>
</div>



<div id="dropDownSelect1"></div>

@endsection

<!-- Footer -->
@include('footer')
