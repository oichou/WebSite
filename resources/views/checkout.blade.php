@extends('layouts.app')

@section('extra-css')
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
.cc{
  background:#16181a;  border-radius:14px; max-width: 100%; display:block; margin:auto;
  padding:60px; padding-left:20px; padding-right:20px;box-shadow: 2px 10px 40px black; z-index:99;
}

.logo-card{max-width:50px; margin-bottom:15px; margin-top: -19px;}

label{display:flex; font-size:10px; color:white; opacity:.4;}

input{font-family: 'Work Sans', sans-serif;background:transparent; border:none; border-bottom:1px solid transparent; color:#dbdce0; transition: border-bottom .4s;}
input:focus{border-bottom:1px solid #1abc9c; outline:none;}

.cardnumber{display:block; font-size:20px; margin-bottom:8px; }

.name{display:block; font-size:15px; max-width: 200px; float:left; margin-bottom:15px;}

.toleft{float:left;}
.ccv{width:50px; margin-top:-5px; font-size:15px;}

.receipt{background: #dbdce0; border-radius:4px; padding:5%; padding-top:200px; max-width:600px; display:block; margin:auto; margin-top:-180px; z-index:-999; position:relative;}
body{
/* background: #00d2ff; */
/* background: -webkit-linear-gradient(to right, #3a7bd5, #00d2ff); */
/* background: linear-gradient(to right, #3a7bd5, #00d2ff); */
  /* Thanks to uigradients :) */
}
body {
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
                                <li class="breadcrumb-item font-weight-bold "><a class="black-text text-uppercase " href="#"><span class="mr-md-3 mr-1">BACK TO SHOP</span></a><i class="fa fa-angle-double-right " aria-hidden="true"></i></li>
                                <li class="breadcrumb-item font-weight-bold"><a class="black-text text-uppercase" href="#"><span class="mr-md-3 mr-1">SHOPPING BAG</span></a><i class="fa fa-angle-double-right text-uppercase " aria-hidden="true"></i></li>
                                <li class="breadcrumb-item font-weight-bold"><a class="black-text text-uppercase active-2" href="#"><span class="mr-md-3 mr-1">CHECKOUT</span></a></li>
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
                                        <p><b>{{ $user->first_name }} {{ $user->last_name}}</b></p>
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
                                <div class="cc">
                                  <!-- <button class="proceed">
                                    <i class="fa fa-arrow-right sendicon"></i> -->
                                    <!-- <svg class="sendicon" width="24" height="24" viewBox="0 0 24 24">
                                      <path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
                                    </svg> -->
                                  <!-- </button> -->
                                  <img src="https://seeklogo.com/images/V/VISA-logo-62D5B26FE1-seeklogo.com.png" class="logo-card">
                                  <label>Card number:</label>
                                  <input id="user" type="text" class="input cardnumber"  placeholder="1234 5678 9101 1121">
                                  <label>Name:</label>
                                  <input class="input name"  placeholder="Edgar Pérez">
                                  <label class="toleft">CCV:</label>
                                  <input class="input toleft ccv" placeholder="321">
                              </div>
                                <div class="butcheck row mb-md-5">
                                    <div class="col">
                                      <button type="submit" name="" id="" class="btn btn-block btn-outline-primary btn-lg">PURCHASE ${{$total}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card border-0 ">
                            <div class="card-header card-2">
                                <p class="card-text text-muted mt-md-4 mb-2 space">YOUR ORDER <span class=" small text-muted ml-2 cursor-pointer">EDIT SHOPPING BAG</span> </p>
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
                                                <p class="mb-1"><b>179 SEK</b></p>
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
