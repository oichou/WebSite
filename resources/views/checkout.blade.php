@extends('layouts.app')

@section('extra-css')
<script src="https://js.stripe.com/v2/"></script>
<script src="https://js.stripe.com/v3/"></script>
<style media="screen">
@import url('https://fonts.googleapis.com/css?family=Work+Sans');
.sendicon{
  width: 24px;
  height: 24 px;
  filter:invert(100%); padding-top:2px;
}

.butcheck{
  padding-top: 20px;
}
.logo-card{max-width:50px; margin-bottom:15px; margin-top: -19px;}

label{display:flex; font-size:10px; color:white; opacity:.4;}

input{
font-size: 16px;
line-height: 18px;
color: #fff;
font-family: 'Work Sans', sans-serif;
background:transparent;
border:none;
border-bottom:1px solid transparent;
/* color:#dbdce0;  */
transition: border-bottom .4s;
}
input:focus{border-bottom:1px solid #1abc9c; outline:none;}

.cardnumber{display:block; font-size:20px; margin-bottom:8px; }

.name{display:block; font-size:15px; max-width: 200px; float:left; margin-bottom:15px;}

.toleft{float:left;}
.ccv{width:50px; margin-top:-5px; font-size:15px;}

.receipt{background: #dbdce0; border-radius:4px; padding:5%; padding-top:200px; max-width:600px; display:block; margin:auto; margin-top:-180px; z-index:-999; position:relative;}

body {
  /* background: -webkit-linear-gradient(to right, #eecda3, #ef629f); */
  /* background: linear-gradient(to right, #eecda3, #ef629f); */
  font-family: 'Work Sans', sans-serif;
  background: linear-gradient(110deg, #BBDEFB 60%, #42A5F5 60%)
}

.shop {
  font-size: 10px
}

.space {
  letter-spacing: 0.8px
}

.second a:hover {
  color: rgb(92, 92, 92)
}

.active-2 {
  color: rgb(92, 92, 92)
}

.breadcrumb>li+li:before {
  content: ""
}

.breadcrumb {
  padding: 0px;
  font-size: 10px;
  color: #aaa
}

.first {
  background-color: white
}

a {
  text-decoration: none ;
  color: #aaa
}

.btn-lg,
.form-control-sm:focus,
.form-control-sm:active,
a:focus,
a:active {
  outline: none ;
  box-shadow: none
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
.form-control-sm:focus {
  border: 1.5px solid #4bb8a9
}

.btn-group-lg>.btn,
.btn-lg {
  padding: .5rem 0.1rem;
  font-size: 1rem;
  border-radius: 0;
  color: white ;
  background-color: #4bb8a9;
  height: 2.8rem ;
  border-radius: 0.2rem
}

.btn-group-lg>.btn:hover,
.btn-lg:hover {
  background-color: #26A69A
}

.btn-outline-primary {
  background-color: #fff ;
  color: #4bb8a9 ;
  border-radius: 0.2rem ;
  border: 1px solid #4bb8a9
}

.btn-outline-primary:hover {
  background-color: #4bb8a9 ;
  color: #fff ;
  border: 1px solid #4bb8a9
}

.card-2 {
  margin-top: 40px
}

.card-header {
  background-color: #fff;
  border-bottom: 0px solid #aaaa
}

p {
  font-size: 13px
}

.small {
  font-size: 9px
}

.form-control-sm {
  height: calc(2.2em + .5rem + 2px);
  font-size: .875rem;
  line-height: 1.5;
  border-radius: 0
}

.cursor-pointer {
  cursor: pointer
}

.boxed {
  padding: 0px 8px 0 8px;
  background-color: #4bb8a9;
  color: white
}

.boxed-1 {
  padding: 0px 8px 0 8px;
  color: black ;
  border: 1px solid #aaaa
}

.bell {
  opacity: 0.5;
  cursor: pointer
}

@media (max-width: 767px) {
  .breadcrumb-item+.breadcrumb-item {
      padding-left: 0
  }
}
/*  */
.cc{
width: 350px;
height: 190px;
  -webkit-perspective: 600px;
  -moz-perspective: 600px;
  perspective:600px;

}

.card__part{
  box-shadow: 1px 1px #aaa3a3;
  top: 0;
  position: absolute;
  z-index: 1000;
  left: 0;
  display: inline-block;
    width: 320px;
    height: 190px;
    background-image: url('https://image.ibb.co/bVnMrc/g3095.png'), linear-gradient(to right bottom, #fd696b, #fa616e, #f65871, #f15075, #ec4879); /*linear-gradient(to right bottom, #fd8369, #fc7870, #f96e78, #f56581, #ee5d8a)*/
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    border-radius: 8px;

    -webkit-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    -moz-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    -ms-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    -o-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
    -webkit-backface-visibility: hidden;
    -moz-backface-visibility: hidden;
}

.card__front{
  padding: 18px;
-webkit-transform: rotateY(0);
-moz-transform: rotateY(0);
}

.card__back {
  padding: 18px 0;
-webkit-transform: rotateY(-180deg);
-moz-transform: rotateY(-180deg);
}

.card__black-line {
    margin-top: 5px;
    height: 38px;
    background-color: #303030;
}

.card__logo {
    height: 16px;
}

.card__front-logo{
      position: absolute;
    top: 18px;
    right: 18px;
}
.card__square {
    border-radius: 5px;
    height: 30px;
}

.card-number {
    display: block;
    width: 100%;
    word-spacing: 4px;
    font-size: 20px;
    letter-spacing: 2px;
    color: #fff;
    text-align: center;
    margin-bottom: 20px;
    margin-top: 20px;
}

.card__space-75 {
    width: 75%;
    float: left;
}

.card__space-25 {
    width: 25%;
    float: left;
}

.card__label {
    font-size: 10px;
    text-transform: uppercase;
    color: rgba(255,255,255,0.8);
    letter-spacing: 1px;
}

.card__info {
    margin-bottom: 0;
    margin-top: 5px;
    font-size: 16px;
    line-height: 18px;
    color: #fff;
  letter-spacing: 1px;
  text-transform: uppercase;
}

.card__back-content {
    padding: 15px 15px 0;
}
.card__secret--last {
    color: #303030;
    text-align: right;
    margin: 0;
    font-size: 14px;
    right : 100%;
}

.card__secret {
    padding: 5px 12px;
    background-color: #fff;
    position:relative;
}

.card__secret:before{
  content:'';
  position: absolute;
top: -3px;
left: -3px;
height: calc(100% + 6px);
width: calc(100% - 42px);
border-radius: 4px;
  background: repeating-linear-gradient(45deg, #ededed, #ededed 5px, #f9f9f9 5px, #f9f9f9 10px);
}


.card__back-square {
    position: absolute;
    bottom: 15px;
    left: 15px;
}
/*  */
/* Tabs*/
section {

    padding: 0px 0;
}

section .section-title {
    text-align: center;
    color: #007b5e;
    margin-bottom: 50px;
    text-transform: uppercase;
}
#tabs{
	background: white;
    color: black;
}
/* #tabs h6.section-title{
    color: #eee;
} */

#tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #f3f3f3;
    background-color: transparent;
    border-color: transparent transparent #f3f3f3;
    border-bottom: 4px solid ;
    font-size: 20px;
    font-weight: bold;
}
#tabs .nav-tabs .nav-link {
    /* border: 1px solid transparent; */
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
    color: black;;
    font-size: 20px;
}
.stripe-errors{
  color:black;
}
/*  loading */
#load{
  background-color: transparent;
  border: transparent;
  display: none;
}
.blob-1,.blob-2{
	width:40px;
	height:40px;
	position:absolute;
	background:yellow;
	border-radius:50%;
	transform:translate(-50%,-50%);
}
.blob-1{
	left:20%;
	animation:osc-l 2.5s ease infinite;
}
.blob-2{
	left:80%;
	animation:osc-r 2.5s ease infinite;
	background:black;
}
@keyframes osc-l{
	0%{left:20%;}
	50%{left:50%;}
	100%{left:20%;}
}
@keyframes osc-r{
	0%{left:80%;}
	50%{left:50%;}
	100%{left:80%;}
}
/*  */
/* input[type="radio"] {
  height: 16px;
  width: 16px;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
} */
</style>

@endsection
@include('header')

@section('content')
<div class=" container-fluid my-5 ">
    <div class="row justify-content-center ">
        <div class="col-xl-10">
            <div class="card shadow-lg ">
                <div class="row mx-auto justify-content-center text-center">
                    <div class="col-12 mt-3 ">
                        <nav aria-label="breadcrumb" class="second ">
                            <ol class="breadcrumb indigo lighten-6 first ">
                                <li class="breadcrumb-item font-weight-bold "><a class="black-text text-uppercase " href="{{ route('home') }}"><span class="mr-md-3 mr-1">BACK TO SHOP</span></a><i class="fa fa-angle-double-right " aria-hidden="true"></i></li>
                                <li class="breadcrumb-item font-weight-bold"><a class="black-text text-uppercase" href="{{route('cart.index')}}"><span class="mr-md-3 mr-1">SHOPPING BAG</span></a><i class="fa fa-angle-double-right text-uppercase " aria-hidden="true"></i></li>
                                <li class="breadcrumb-item font-weight-bold"><a class="black-text text-uppercase" href="{{route('adress.form',['for' => 'checkout'])}}"><span class="mr-md-3 mr-1">Delivery address</span></a><i class="fa fa-angle-double-right text-uppercase " aria-hidden="true"></i></li>
                                <li class="breadcrumb-item font-weight-bold"><a class="black-text text-uppercase active-2" ><span class="mr-md-3 mr-1">CHECKOUT</span></a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row justify-content-around">
                    <div class="col-md-5">
                        <div class="card border-0">
                            <div class="card-header pb-0">
                                <h2 class="card-title space ">Checkout</h2>
                                <p class="card-text text-muted mt-4 space">SHIPPING DETAILS</p>
                                <hr class="my-0">
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-between">
                                    <!-- <div class="col-auto mt-0">
                                        <p><b>BBBootstrap Team Vasant Vihar 110020 New Delhi India</b></p>
                                    </div> -->
                                    <div class="col-auto">
                                        <p><b >{{ $user->first_name }} {{ $user->last_name}}</b></p>
                                        <p>
                                          <b>{{ $adress->street }}</b><br/>
                                          <b>{{ $adress->city }}</b>
                                          <b>{{ $adress->cp }}</b><br/>
                                          <b>{{ $adress->state }}</b><br/>
                                          <b>{{ $adress->country }}</b><br/>
                                        </p>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col">
                                        <p class="text-muted mb-2">PAYMENT DETAILS</p>
                                        <hr class="mt-0">
                                    </div>
                                </div>
                                <form action="{{ route('purchase') }}" method="post" id='formPayment'>
                                  @csrf
                                <section id="tabs">
                                	<div class="container">
                                		<div class="row">
                                			<div class="col-xs-12 ">
                                				<nav>
                                					<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                              <a class="nav-item nav-link active method" href="#nav-cc" id="nav-home-tab"  data-toggle="tab" role="tabpanel" aria-controls="nav-home" aria-selected="true" data-payement='cc'>
                                                <i class="fa fa-credit-card"></i> Credit Card
                                              </a>
                                              <a class="nav-item nav-link  method" href="#nav-Paypal" id="nav-profile-tab"  data-toggle="tab" role="tab" aria-controls="nav-profile" aria-selected="false" data-payement='paypal'>
                                                <i class="fa fa-paypal"></i> Paypal
                                              </a>
                                						<!-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-Virement" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa fa-university"></i>Bank Transfer</a> -->
                                						<!-- <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-Apple" role="tab" aria-controls="nav-about" aria-selected="false">Apple Pay</a> -->
                                					</div>
                                				</nav>
                                				<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                					<div class="tab-pane fade show active" id="nav-cc" role="tabpanel" aria-labelledby="nav-home-tab">
                                						<span id='change'>Double click to enter ccv</span>
                                            <div id="stripe-errors">

                                            </div>
                                            <div id='cc' class="cc">
                                              <div data-part='card number'id="see" class="card__front card__part">
                                                <img class="card__front-square card__square" src="https://image.ibb.co/cZeFjx/little_square.png">
                                                <div class="form-group">
                                    <!-- <label for="cardNumber">CARD NUMBER</label> -->
                                    <div class="input-group">
                                        <!-- <input
                                            type="tel" class="form-control" name="cardNumber" placeholder="Valid Card Number" autocomplete="cc-number" required autofocus
                                        /> -->
                                        <input id='card_number' name="card_number" type="number" class=" @error('card_number') is-invalid @enderror card-number"  placeholder="1234 5678 9101 1121" required autofocus>
                                        <!-- <span class="input-group-addon"><i class="fa fa-credit-card"></i></span> -->
                                    </div>
                                </div>
                                                <!-- <input name="card_number" type="number" class=" @error('card_number') is-invalid @enderror card-number"  placeholder="1234 5678 9101 1121" required autofocus> -->
                                                @error('card_number')
                                                <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <div class="card__space-75">
                                                  <span class="card__label">Card holder</span>
                                                  <input id='holder' name="holder" class=" @error('holder') is-invalid @enderror card__info"  placeholder="Oussama ICHOUA" data-stripe='number' required autofocus>
                                                  @error('holder')
                                                  <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                  </span>
                                                  @enderror
                                                </div>
                                                <div class="card__space-25">
                                                  <span class="card__label">Expires</span>
                                                  <input  name="expires" id="expire" type="text" class=" @error('expires') is-invalid @enderror card__info"  placeholder="10/25" data-stripe='expire' required autofocus >
                                                  @error('expires')
                                                  <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                  </span>
                                                  @enderror
                                                </div>
                                              </div>

                                              <div data-part='ccv'id="hide" class="card__back card__part">
                                                <div class="card__black-line"></div>
                                                <div class="card__back-content">
                                                  <div class="card__secret">
                                                    <p class="card__secret--last">
                                                      <input id='ccv' name="ccv" type="number" class=" @error('ccv') is-invalid @enderror card__secret--last" placeholder="123" data-stripe='cvc' required autofocus/>
                                                      @error('ccv')
                                                      <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                      </span>
                                                      @enderror
                                                    </p>
                                                  </div>
                                                </div>
                                              </div>
                                          </div>
                                					</div>
                                					<div class="tab-pane fade" id="nav-Paypal" role="tabpanel" aria-labelledby="nav-profile-tab">
                                						<img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png" alt="paypal" width="100%">
                                					</div>
                                					<!-- <div class="tab-pane fade" id="nav-Virement" role="tabpanel" aria-labelledby="nav-contact-tab">
                                						Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                                					</div>
                                					<div class="tab-pane fade" id="nav-Apple" role="tabpanel" aria-labelledby="nav-about-tab">
                                						Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                                					</div> -->
                                				</div>

                                			</div>
                                		</div>
                                	</div>
                                </section>
                                <div class="butcheck row mb-md-5">
                                    <div class="col">
                                      <button value="cc" type="submit" name="submit" id="purchase" class="btn btn-block btn-outline-primary btn-lg">PURCHASE ${{$total}}</button>
                                      <button disabled id='load' class="btn btn-block btn-lg">
                                      	<div class = "blob-1"></div>
                                      	<div class = "blob-2"></div>
                                      </button>
                                    </div>
                                </div>
                                <div class="stripe-errors"></div>
                              </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="card border-0 ">
                            <div class="card-header card-2">
                                <p class="card-text text-muted mt-md-4 mb-2 space"><b>YOUR ORDER</b>
                                  <!-- <span class=" small text-muted ml-2 cursor-pointer">EDIT SHOPPING BAG</span>  -->
                                </p>
                                <hr class="my-2">
                            </div>
                            <div class="card-body pt-0">
                              @foreach($products as $product)
                                <div class="row justify-content-between">
                                  <div class="col-auto col-md-7">
                                    <div class="media flex-column flex-sm-row">
                                      <img class="img-fluid" src="images/{{$product[0]->path}}" width="62" height="62">
                                      <div class="media-body my-auto">
                                        <div class="row ">
                                          <div class="col-auto">
                                            <p class="mb-0"><b>{{ $product[0]->name }}</b></p><small class="text-muted">{{ $product[0]->category }}</small>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class=" pl-0 flex-sm-col col-auto my-auto">
                                    <p class="boxed-1">{{ $product[1] }}</p>
                                  </div>
                                  <div class=" pl-0 flex-sm-col col-auto my-auto ">
                                    <p><b>$ {{ $product[0]->price }}</b></p>
                                  </div>
                                </div>

                                  @endforeach
                                <hr class="my-2">
                                <div class="row ">
                                    <div class="col">
                                        <div class="row justify-content-between">
                                            <div class="col-4">
                                                <p class="mb-1"><b>Subtotal</b></p>
                                            </div>
                                            <div class="flex-sm-col col-auto">
                                                <p class="mb-1"><b>${{ $subtotal }}</b></p>
                                            </div>
                                        </div>
                                        <div class="row justify-content-between">
                                            <div class="col">
                                                <p class="mb-1"><b>Shipping</b></p>
                                            </div>
                                            <div class="flex-sm-col col-auto">
                                                <p class="mb-1"><b>Free</b></p>
                                            </div>
                                        </div>
                                        @if($discount)
                                        <div class="row justify-content-between">
                                          <div class="col-4">
                                            <p><b>Discount {{$discount[0]}}%</b></p>
                                          </div>
                                          <div class="flex-sm-col col-auto">
                                            <p class="mb-1"><b>$ {{ $discount[1] }}</b></p>
                                          </div>
                                        </div>
                                        @endif
                                        <div class="row justify-content-between">
                                            <div class="col-4">
                                                <p><b>Total</b></p>
                                            </div>
                                            <div class="flex-sm-col col-auto">
                                                <p class="mb-1"><b>$ {{ $total }}</b></p>
                                            </div>
                                        </div>
                                        <hr class="my-0">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('extra-js')
<script defer src="{{ asset('js/checkout.js') }}"></script>
@endsection
