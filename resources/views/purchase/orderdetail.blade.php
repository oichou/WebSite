@extends('layouts.app')
@section('extra-css')
<style media="screen">
body {
background: rgb(213, 217, 233);
/* min-height: 100vh;
vertical-align: middle;
display: flex;
font-family: Muli;
font-size: 14px */
}

.card {
margin: auto;
width: 320px;
max-width: 600px;
border-radius: 20px
}

.mt-50 {
margin-top: 50px
}

.mb-50 {
margin-bottom: 50px
}

@media(max-width:767px) {
.card {
  width: 80%
}
}

@media(height:1366px) {
.card {
  width: 75%
}
}

#orderno {
padding: 1vh 2vh 0;
font-size: smaller
}

.gap .col-2 {
background-color: rgb(213, 217, 233);
width: 1.2rem;
padding: 1.2rem;
margin-top: -2.5rem;
border-radius: 1.2rem
}

.title {
display: flex;
text-align: center;
font-size: 2rem;
font-weight: bold;
padding: 12%
}

.main {
padding: 0 2rem
}

.main img {
border-radius: 7px;
width : 65px;
}

.main p {
margin-bottom: 0;
font-size: 0.75rem
}

#sub-title p {
margin: 1vh 0 2vh 0;
font-size: 1rem
}

.row-main {
padding: 1.5vh 0;
align-items: center
}

hr {
margin: 1rem -1vh;
border-top: 1px solid rgb(214, 214, 214)
}

.total {
font-size: 1rem
}

@media(height: 1366px) {
.main p {
  margin-bottom: 0;
  font-size: 1.2rem
}

.total {
  font-size: 1.5rem
}
}

.btn {
/* background-color: rgb(3, 122, 219); */
/* border-color: rgb(3, 122, 219); */
/* color: white; */
margin: 7vh 0;
border-radius: 7px;
width: 60%;
font-size: 0.8rem;
padding: 0.8rem;
justify-content: center
}

.btn:focus {
box-shadow: none;
outline: none;
box-shadow: none;
color: white;
-webkit-box-shadow: none;
-webkit-user-select: none;
transition: none
}

.btn:hover {
color: white
}
/*  */
/* body {
    color: #000;
    overflow-x: hidden;
    height: 100%;
    background-color: #8C9EFF;
    background-repeat: no-repeat
} */

.card2 {
    z-index: 0;
    background-color: #ECEFF1;
    padding-bottom: 20px;
    margin-top: 90px;
    margin-bottom: 90px;
    border-radius: 10px
}

.top {
    padding-top: 40px;
    padding-left: 13% !important;
    padding-right: 13% !important
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: #455A64;
    padding-left: 0px;
    margin-top: 30px
}

#progressbar li {
    list-style-type: none;
    font-size: 13px;
    width: 25%;
    float: left;
    position: relative;
    font-weight: 400
}

#progressbar .step0:before {
    font-family: FontAwesome;
    content: "\f10c";
    color: #fff
}

#progressbar li:before {
    width: 40px;
    height: 40px;
    line-height: 45px;
    display: block;
    font-size: 20px;
    background: #C5CAE9;
    border-radius: 50%;
    margin: auto;
    padding: 0px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 12px;
    background: #C5CAE9;
    position: absolute;
    left: 0;
    top: 16px;
    z-index: -1
}

#progressbar li:last-child:after {
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
    position: absolute;
    left: -50%
}

#progressbar li:nth-child(2):after,
#progressbar li:nth-child(3):after {
    left: -50%
}

#progressbar li:first-child:after {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
    position: absolute;
    left: 50%
}

#progressbar li:last-child:after {
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px
}

#progressbar li:first-child:after {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: #651FFF
}

#progressbar li.active:before {
    font-family: FontAwesome;
    content: "\f00c"
}

.icon {
    width: 60px;
    height: 60px;
    margin-right: 15px
}

.icon-content {
    padding-bottom: 20px
}

@media screen and (max-width: 992px) {
    .icon-content {
        width: 50%
    }
}
</style>
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
