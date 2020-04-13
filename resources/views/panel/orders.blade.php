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
  <div class="row">
    @forelse ($orders as $order)
    <div class="col-md-4 col-sm-8">
        <div class="product-grid6">
            <div class="product-image6">
                <a href="#">
                    <img class="pic-1" src="images/{{ $order->path }}" alt="product">
                </a>
            </div>
            <div class="product-content">
                <h3 class="title"><a href="#">{{ $order->name }}</a></h3>
                <div class="price">{{ $order->price }}$, quantity = {{ $order->quantity }}</div>
            </div>
        </div>
    </div>
    @empty
    <div class="">
      You haven't ordered any product yet
    </div>
    @endforelse
  </div>


</div>
@endsection


<!-- Footer -->
@include('footer')
