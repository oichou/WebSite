@extends('layouts.app')
<!-- Header -->
@section('title')
<title>{{ $product->name }}</title>
@endsection

@section('extra-css')
<link href="{{ asset('css/product.css') }}" rel="stylesheet">
@endsection

@include('header')

@section('content')
<!-- <div class="product group"> -->
<div class="container container-product">
  <div class="col-1-2 product-image">
    <div class="bg"></div>
    <div class="indicator">
      		<div class="carousel slide" id="main-carousel" data-ride="carousel">
      <ol class="carousel-indicators">
				<li data-target="#main-carousel" data-slide-to="0" class="active"></li>
				<li data-target="#main-carousel" data-slide-to="1"></li>
				<li data-target="#main-carousel" data-slide-to="2"></li>
			</ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block img-fluid" src="/images/{{$product->path}}" alt="{{$product->name}}">
        </div>
      @foreach($images as $image)
          <div class="carousel-item">
          <img class="d-block img-fluid" src="/images/{{$image}}" alt="{{$product->name}}">
          </div>
      @endforeach
      </div>
      <!-- /.carousel-inner -->
      <a href="#main-carousel" class="carousel-control-prev" data-slide="prev">
				<span class="carousel-control-prev-icon"></span>
				<span class="sr-only" aria-hidden="true">Prev</span>
			</a>
			<a href="#main-carousel" class="carousel-control-next" data-slide="next">
				<span class="carousel-control-next-icon"></span>
				<span class="sr-only" aria-hidden="true">Next</span>
			</a>
    </div>
    </div>
  </div>
  <div class="col-1-2 product-info">
    <h1>{{ $product->name }}</h1>
    @if($product->quantity > 1)
    <h1 class="availability">Availability: <span class="instock">In stock <i class="fa fa-check-circle-o"></i></span></h1>
    @else
    <h1 class="availability">Availability: <span class="outofstock">out of stock <i class="fa fa-times-circle-o"></i></span></h1>
    @endif
    <h2>${{ $product->price }}</h2>
    <br>
      @if($product->quantity >= 1)
        <a href="{{ route('cart.addProduct',['product'=>$product]) }}" class="add-btn"> Add To Cart <i class="fa fa-cart-plus"></i></a>
      @else
        <a href="" class="add-btn"> Not available <i class="fa fa-times"></i></a>
      @endif

    <p>{{ $product->description }}</p>

    <ul>
      <li>Product's category : {{ $product->category }}</li>
      <li>Product's brand :{{ $product->brand }}</li>
      <li>Product's quantity : {{ $product->quantity }}</li>
      @if($product->promo == true)
        <li>Discount : {{ $product->promo_percentage }}%</li>
      @endif
    </ul>

    <a href="" class="share-link">Tweet</a>
    <a href="" class="share-link">Like</a>
    <a href="" class="share-link">Pin</a>
    <a href="" class="share-link">Email</a>
  </div>
  <!-- <div class="ymal"> -->
    <h2 class="ymal"> You might also like </h2>
  <div class="row">
      @forelse($mightAlsoLike as $mal)
      <div class="col-md-3 col-sm-8">
          <div class="product-grid6">
              <div class="product-image6">
                  <a href="{{ route('products.show',['id'=>$mal->id]) }}">
                      <img class="pic-1" src="/images/{{ $mal->path }}" alt="{{ $mal->path }}">
                  </a>
              </div>
              <div class="product-content">
                  <h3 class="title"><a href="{{ route('products.show',['id'=>$mal->id]) }}">{{ $mal->name }}</a></h3>
                  <div class="price">${{ $mal->price }}</div>
              </div>
              <ul class="social">
                  <li>
                    <a href="{{ route('products.show',['id'=>$mal->id]) }}" data-tip="Quick View"><i class="fa fa-search"></i></a>
                  </li>
                  @if($mal->quantity > 0)
                  <li>
                    <a href="{{ route('cart.addProduct',['product'=>$mal]) }}" data-tip="Add to Cart" onclick="parentNode.submit()"><i class="fa fa-shopping-cart"></i></a>
                  </li>
                  @endif
              </ul>
          </div>
      </div>
      @empty
        <div class="col-md-3 col-sm-8">
          it s our only product wich category: {{$product->category}}!!
        </div>
      @endforelse
  </div>
<!-- </div> -->
  <h2> what you may buy with this product </h2>
<div class="row">
    @forelse($mightAlsoBuy as $mab)
    <div class="col-md-3 col-sm-8">
        <div class="product-grid6">
            <div class="product-image6">
                <a href="{{ route('products.show',['id'=>$mab->id]) }}">
                    <img class="pic-1" src="/images/{{ $mab->path }}" alt="{{ $mab->path }}">
                </a>
            </div>
            <div class="product-content">
                <h3 class="title"><a href="{{ route('products.show',['id'=>$mab->id]) }}">{{ $mab->name }}</a></h3>
                <div class="price">${{ $mab->price }}</div>
            </div>
            <ul class="social">
                <li>
                  <a href="{{ route('products.show',['id'=>$mab->id]) }}" data-tip="Quick View"><i class="fa fa-search"></i></a>
                </li>
                <!-- <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li> -->
                @if($mab->quantity>0)
                  <li>
                    <a href="{{ route('cart.addProduct',['product'=>$product]) }}" data-tip="Add to Cart" onclick="parentNode.submit()"><i class="fa fa-shopping-cart"></i></a>
                  </li>
                @endif
            </ul>
        </div>
    </div>
    @empty
      <div class="col-md-3 col-sm-8">
        Your are going to be our first client to buy this Product hope you like it!!
      </div>
    @endforelse
</div>

  </div>
@endsection
<!-- Footer -->
@include('footer')
