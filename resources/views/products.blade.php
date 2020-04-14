@extends('layouts.app')


<!-- Header -->
@include('header')

@section('content')
<div class="container products-section">
  <div class="sidebar">

      <h3>By Category</h3>
      <ul>
        @foreach($categories as $category)
        <li>
          <a href="{{ route('products.index',['category'=>$category]) }}"> {{ $category }} </a>
        </li>
        @endforeach
      </ul>

      <h3>By Brand</h3>
      <ul>
        @foreach($brands as $brand)
        <li>
          <a href="{{ route('products.index',['brand'=>$brand]) }}"> {{ $brand }} </a>
        </li>
        @endforeach
      </ul>
      <h3>By Price</h3>
      <ul>
        <li>
          <a href="#">hello</a>
        </li>
        <li>
          <a href="#">hello</a>
        </li>
      </ul>
    </div> <!-- end sidebar -->
    <div class="">
      <!-- <div class="products-header">
        <h1 class="stylish-heading">categoryName }}</h1>
        <div>
            <strong>Price: </strong>
              <a href="#">Low to High</a>
              <a href="#">High to Low</a>
        </div>
    </div> -->
  <div class="row">
    @forelse ($products as $product)
        <div class="col-md-4 col-sm-8">
            <div class="product-grid6">
                <div class="product-image6">
                    <a href="{{ route('products.show',['id'=>$product->id]) }}">
                        <img class="pic-1" src="images/{{ $product->path }}" alt="product">
                    </a>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="{{ route('products.show',['id'=>$product->id]) }}">{{ $product->name }}</a></h3>
                    <div class="price">{{ $product->price }}</div>
                </div>
                <ul class="social">
                    <li><a href="{{ route('products.show',['id'=>$product->id]) }}" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                    <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                    <li>
                      <!-- <form action="{{ route('cart.addProduct',['product'=>$product]) }}" method="POST"> -->
                      <!-- @csrf -->
                      <a href="{{ route('cart.addProduct',['product'=>$product]) }}" data-tip="Add to Cart" onclick="parentNode.submit()"><i class="fa fa-shopping-cart"></i></a>
                      <!-- <button type="submit" name="button">Add to Cart</button> -->
                    <!-- </form> -->
                  </li>
                </ul>
            </div>
        </div>
        @empty
        <div class="">
          No product buddy
        </div>
        @endforelse
      </div>
</div>
</div>
@endsection

<!-- Footer -->
@include('footer')
