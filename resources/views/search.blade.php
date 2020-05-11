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
          <a href="#">Low to high</a>
        </li>
        <li>
          <a href="#">High to low</a>
        </li>
      </ul>
    </div> <!-- end sidebar -->
    <div class="">

      <h2 style="margin-bottom:30px;color:black;">
        Researches found about : <span style="color:blue;font-style:oblique;">{{ request()->input('search')}}</span>
      </h2>

  <div class="row">
    @forelse ($articles as $art)
        <div class="col-md-4 col-sm-8">
            <div class="product-grid6">
                <div class="product-image6">
                    <a href="{{ route('products.show',['id'=>$art->id]) }}">
                        <img class="pic-1" src="images/{{ $art->path }}" alt="product">
                    </a>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="{{ route('products.show',['id'=>$art->id]) }}">{{ $art->name }}</a></h3>
                    <div class="price">$ {{ $art->price }}</div>
                </div>
                <ul class="social">
                    <li><a href="{{ route('products.show',['id'=>$art->id]) }}" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                    <!-- <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li> -->
                    <li>
                      <a href="{{ route('cart.addProduct',['product'=>$art]) }}" data-tip="Add to Cart" onclick="parentNode.submit()"><i class="fa fa-shopping-cart"></i></a>
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

@include('footer')
