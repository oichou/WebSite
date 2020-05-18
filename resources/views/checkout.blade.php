@extends('layouts.app')

@section('title')
<title>Chekout time</title>
@endsection

@section('extra-css')
<script src="https://js.stripe.com/v2/"></script>
<script src="https://js.stripe.com/v3/"></script>
<link href="{{ asset('css/checkout.css') }}" rel="stylesheet">

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
                                                  <input  name="expires" id="expire"  class=" @error('expires') is-invalid @enderror card__info"  placeholder="10/25" data-stripe='expire' required autofocus />
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

                                				</div>

                                			</div>
                                		</div>
                                	</div>
                                </section>
                                <div class="butcheck row mb-md-5">
                                    <div class="col">
                                      <button value="cc" type="submit" name="method" id="purchase" class="btn btn-block btn-outline-primary btn-lg">PURCHASE ${{$total}}</button>
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
