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
      <li><a href="{{ route('overview')}}"> My Online Orders</a> </li>
    </ul>
  </div>

  <!-- Menu -->

  <div class="tit">
    <h1>MY ACCOUNT</h1>
    <ul class="bod">
        <li><h2 class="aa">Shopping History</h2>
          <p class="bb">View your online orders. my Oussafa members can also view in-store receipts.</p>
          <div class="links">
            <a href="{{ route('overview')}}">View Online Orders</a>
            <a href="{{ route('home')}}">View in Store</a>
          </div>
        </li>

        <li><h2 class="aa">Personal Details</h2>
          <p class="bb">Update your contact details, password & manage payment cards.</p>
          <div class="links">
            <a href="{{ route('register') }}">Join my Oussafa</a>
          </div>
        </li>

        <li><h2 class="aa">Become a my Oussafa member</h2>
          <p class="bb">my Oussafa helps you get the most from shopping with us by giving you rewards and treats throughout the year.</p>
          <div class="links">
            <a href="#">View in Store</a>
          </div>
        </li>

        <li><h2 class="aa">Shopping Cart</h2>
          <p class="bb">View your Cart and modify it in case you would love to make a change.</p>
          <div class="links">
            <a href="#">View Your Cart</a>
          </div>
        </li>

    </ul>
  </div>

</div>
@endsection


<!-- Footer -->
@include('footer')
