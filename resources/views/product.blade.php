@extends('layouts.app')
<!-- Header -->
@section('extra-css')
<style >


h1, h2, h3, h4, h5, h6{
  margin: 0;
  padding: 0;
  border: 0;
}

h1{
  font-size: 130%;
}

h2{
  color: #aaa;
  font-size: 18px;
  font-weight: 400;
}


p{
  font-size: 12px;
  line-height: 1.5;
}


.product{
  background-color: #eee;
  border-bottom: 1px solid #ddd;
  clear: both;
  padding: 0px 10% 70px 10%;
}

.group:after {
  content: "";
  display: table;
  clear: both;
}

.row{
  width: 100%;
  padding-top: 50px;
  padding-bottom: 50px;
}
.container-product{
  padding-top: 50px;
}
.col-1-2{
  width: 50%;
  height: 100%;
  float: left;
}

.product-image{
  /*border: 1px dotted #aaa;*/
}

/* .product-image .bg{
  background-image: url('/images/{{ $product->path }}');
  background-size: cover;
  background-position: center top;
  width: 100%;
  min-height: 420px;
} */

.product-image .indicator{
  text-align:center;
}

.product-image .dot{
  background-color: #aaa;
  border-radius: 50%;
  cursor: pointer;
  display: inline-block;
  margin-right: 5px;
  width: 5px;
  height: 5px;
  -webkit-transition: all 400ms ease;
  transition: all 400ms ease;
}

.dot:hover{
  background-color: #444;
}

.product-info{
  padding: 0px 8%;
}

.product-info h1{
  margin-bottom: 5px;
}

.product-info h2{
  margin-bottom: 50px;
}

.product-info .select-dropdown{
  display: inline-block;
  margin-right: 10px;
  position: relative;
  width: auto;
  float: left;
}

.product-info select{
  cursor: pointer;
  margin-bottom: 20px;
  padding: 12px 92px 12px 15px;
  background-color: #fff;
  border: none;
  border-radius: 2px;
  color: #aaa;
  font-size: 12px;
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
}

select:active, select:focus {
  outline: none;
  box-shadow: none;
}

.select-dropdown:after {
    content: " ";
  cursor: pointer;
    position: absolute;
    top: 30%;
  right: 10%;
    width: 0;
    height: 0;
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    border-top: 5px solid #aaa;
  }

.product-info a.add-btn{
  background-color: #444;
  border-radius: 2px;
  color: #eee;
  display: inline-block;
  font-size: 14px;
  margin-bottom: 30px;
  padding: 15px 100px;
  text-align: center;
  text-decoration: none;
  -webkit-transition: all 400ms ease;
  transition: all 400ms ease;
}

a.add-btn:hover{
  background-color: #555;
}

.product-info p{
  margin-bottom: 30px;
}

.product-info p a{
  border-bottom: 1px dotted #444;
  color: #444;
  font-weight: 700;
  text-decoration: none;
  -webkit-transition: all 400ms ease;
  transition: all 400ms ease;
}

.product-info p a:hover{
  opacity: .7;
}

.product-info ul{
  font-size: 12px;
  padding: 0;
  margin-bottom: 50px;
}

.product-info li{
  list-style-type: none;
  margin-bottom: 5px;
}

.product-info li::before{
  content:"\2022";
  margin-right: 20px;
}


.product-info a.share-link{
  color: #aaa;
  font-size: 11px;
  margin-right: 30px;
  text-decoration: none;
}

.product-info a.share-link:hover{
  border-bottom: 2px solid #aaa;
}

footer{
	background-color: #212121;
	clear: both;
	width: 100%;
	padding: 20px 10% 10px 10%;
	text-align: center;
	vertical-align: middle;
}

footer img{
	display: inline-block;
	height: 20px;
	width: auto;
	margin-bottom: 10px;
	margin-right: 10px;
	vertical-align: middle;
}

footer h3{
  color: #bbb;
  font-size: 12px;
  font-weight: 700;
	display: inline-block;
	height: 20px;
  letter-spacing: .8px;
	margin-bottom: 0px;
  text-transform: uppercase;
	vertical-align: middle;
}
h2{
  color: black;
  padding-top: 20px;
  font-weight: bold;
  font-weight: 900;
}
.instock{
  color: green;
}
.outofstock{
  color: red;
}
.availability{
  padding-top: 10px;
}
</style>
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
      @if($product->quantity > 1)
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
    <h2> You might also like </h2>
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
                  <div class="price">{{ $mal->price }}</div>
              </div>
              <ul class="social">
                  <li><a href="{{ route('products.show',['id'=>$mal->id]) }}" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                  <!-- <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li> -->
                  <li>
                    <a href="{{ route('cart.addProduct',['product'=>$mal]) }}" data-tip="Add to Cart" onclick="parentNode.submit()"><i class="fa fa-shopping-cart"></i></a>
                </li>
              </ul>
          </div>
      </div>
      @empty
        <div class="col-md-3 col-sm-8">
          it s our only product wich category: {{$product->category}}!!
        </div>
      @endforelse
  </div>
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
                <div class="price">{{ $mab->price }}</div>
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
