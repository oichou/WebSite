@extends('layouts.app')

@section('extra-css')
<link href="{{ asset('css/offers.css') }}" rel="stylesheet">

@endsection

<!-- Header -->
@include('header')


@section('content')

<div id='content'>

	<div class="container products-section">
		<div class="sidebar">

   <form id="filprod" method="get" action="{{ route('offers')}}">

      <h3>Categories</h3>
      <ul>
        @foreach($categories as $category)
        <li>
          <label class="categ"> {{$category}}
            <input id="cat" type="checkbox" name="category[]" value="{{$category}}">
            <span class="checkmark"></span>
          </label>
        </li>
        @endforeach
      </ul>

      <h3>Brands</h3>
      <ul>
        @foreach($brands as $brand)
        <li>
          <label class="categ"> {{$brand}}
            <input type="checkbox" name="brand[]" value="{{$brand}}">
            <span class="checkmark"></span>
          </label>
        </li>
        @endforeach
      </ul>
      <h3>Right In This Moment</h3>
      <ul>
        @foreach($promos as $prom)
        @if($prom !== 0)
        <li>
          <label class="categ"><div class="promo">-{{ $prom }}%</div>
            <input type="checkbox" name="promotion[]" value="{{$prom}}">
            <span class="checkmark"></span>
          </label>
        </li>
        @endif
        @endforeach
      </ul>
      <!-- <h3>By Price</h3> -->
      <!-- <ul> -->
        <!-- <li>
          <label class="categ"> Low to high
            <input type="checkbox" name="price[]">
            <span class="checkmark"></span>
          </label>
        </li>
        <li>
          <label class="categ"> High to low
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
        </li> -->
      <!-- </ul> -->
      <button type="submit" class="btn btn-dark rounded-pill py-2 btn-block" style="width:150px">Search</button>
    </form>
    </div> <!-- end sidebar -->
    <div class="">

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
                    <div class="price">$ {{ $product->price }}</div>
                </div>
                <ul class="social">
                    <li><a href="{{ route('products.show',['id'=>$product->id]) }}" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                    <!-- <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li> -->
                    <li>
                      <a href="{{ route('cart.addProduct',['product'=>$product]) }}" data-tip="Add to Cart" onclick="parentNode.submit()"><i class="fa fa-shopping-cart"></i></a>
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

</div>
@endsection

@section('extra-js')
<!-- <script>
$(document).ready(
    function()
    {
        $("input:checkbox").change(
            function()
            {
                  alert('checked')
                    $("#filprod").submit();
            }
        )
    }
);
</script> -->

@endsection

<!-- Footer -->
@include('footer')
