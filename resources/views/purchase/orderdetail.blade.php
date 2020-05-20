@extends('layouts.app')

@section('title')
<title>Order N°{{$order->id}} details</title>
@endsection

@section('extra-css')
<link href="{{ asset('css/purchase/orderdetail.css') }}" rel="stylesheet">
@endsection

@include('header')

@section('content')
    <div class="container">

    <div class="card mt-50 mb-50">
    <div class="col d-flex"><span class="text-muted" id="orderno">order #{{$order->id}}</span></div>
    <div class="gap">
        <div class="col-2 d-flex mx-auto"> </div>
    </div>
    <div class="title mx-auto"> Thank you for your order! </div>
    <div class="main">
      <span id="sub-title">
            <p><b>Payment Summary</b></p>
        </span>
        @foreach($ppqs as $ppq)
        <div class="row row-main">
            <div class="col-3">
              <img class="img-fluid" src="../images/{{ $ppq[0]->path }}">
            </div>
            <div class="col-6">
                <div class="row d-flex">
                    <p><b>{{$ppq[0]->name}}</b></p>
                </div>
                <div class="row d-flex">
                    <p class="text-muted">{{$ppq[0]->brand}} : {{$ppq[0]->category}}</p>
                </div>
            </div>
            <div class="col-3 d-flex justify-content-end">
                <p><b>${{$ppq[1]}}</b></p>
            </div>
        </div>
        @endforeach
        <hr>
        @if($missing)
          @foreach($missing as $ms)
          <div class="row row-main">
            <div class="col-6">
                <div class="row d-flex">
                    this product is missing
                </div>
                <div class="row d-flex">
                    does not exist any more in our database
                </div>
            </div>
            <div class="col-3 d-flex justify-content-end">
                id : {{$ms}}
            </div>
          </div>
          @endforeach
        @endif
        <div class="total">
            <div class="row">
                <div class="col"> <b> Total:</b> </div>
                <div class="col d-flex justify-content-end">
                  <b>${{$order->price}}</b>
                </div>
            </div>
            <a href="{{route('home')}}" class="btn btn-block btn-outline-info d-flex mx-auto"> <b>Home</b> </a>
        </div>
    </div>
</div>
<div class="card2">
    <div class="row d-flex justify-content-between px-3 top">
        <div class="d-flex">
            <h5>ORDER <span class="text-primary font-weight-bold">#{{ $order->id }}</span></h5>
        </div>
        <div class="d-flex flex-column text-sm-right">
            <p class="mb-0">Expected Arrival <span>{{$order->date_delivery}}</span></p>
            <p>USPS <span class="font-weight-bold">Generer un numero de suivie ici</span></p>
        </div>
    </div> <!-- Add class 'active' to progress -->
    <div class="row d-flex justify-content-center">
        <div class="col-12">
            <ul id="progressbar" class="text-center">
                <li class="active step0"></li>
                <li class="active step0"></li>
                <li class="active step0"></li>
                @if($order->date_delivery <= now())
                <li class="active step0"></li>
                @else
                <li class="step0"></li>
                @endif
            </ul>
        </div>
    </div>
    <div class="row justify-content-between top">
        <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/9nnc9Et.png">
            <div class="d-flex flex-column">
                <p class="font-weight-bold">Order<br>Processed</p>
            </div>
        </div>
        <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/u1AzR7w.png">
            <div class="d-flex flex-column">
                <p class="font-weight-bold">Order<br>Shipped</p>
            </div>
        </div>
        <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/TkPm63y.png">
            <div class="d-flex flex-column">
                <p class="font-weight-bold">Order<br>En Route</p>
            </div>
        </div>
        <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/HdsziHP.png">
            <div class="d-flex flex-column">
                <p class="font-weight-bold">Order<br>Arrived</p>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
