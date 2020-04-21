@extends('layouts.adminapp')
@section('extra-css')
<style>
  input.next{
    display: none;
  }
  textarea.next{
    display: none;
  }

</style>
<link rel="stylesheet" href="{{ asset('css/dashboard/table.css')}}">
@endsection
@section('content')
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row"></div>
    <div class="content-body">
<div class="page-wrapper mdc-toolbar-fixed-adjust">
  <main class="content-wrapper">
    <h1>Edit product</h1>
    <div class="login-dark container">
      <form method="POST" action="{{route ('editproduct',['id' => $product->id])}}" enctype="multipart/form-data">
        @csrf
          <div class="form-group">
            Product Name:
            <input readonly type="text" class="form-control readonly" value="{{ $product->name }}" autofocus data-name="name" name="name">
            <input id="name" type="text" class="next form-control @error('name') is-invalid @enderror"    autocomplete="name" placeholder="Product Name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <textarea  readonly cols="40" rows="5" class="form-control readonly"  autofocus data-name="description" name="description">{{ $product->description }}</textarea>
            <textarea id="description" cols="40" rows="5" class="next form-control @error('description') is-invalid @enderror"  autocomplete="description" placeholder="Description" autofocus></textarea>

            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <input readonly type="number" class="form-control readonly"  value="{{ $product->quantity }}" autofocus data-name="quantity" name="quantity">
            <input id="quantity" type="number" class="next form-control @error('quantity') is-invalid @enderror"  autocomplete="quantity" placeholder="Quantity" autofocus>

            @error('quantity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <input readonly class="form-control readonly" value="{{ $product->basic_price }}"   autofocus data-name="basic_price" name="basic_price">
            <input id="basic_price" type="number" class="next form-control @error('basic_price') is-invalid @enderror"  autocomplete="basic_price" placeholder="Officiel price" autofocus>

            @error('basic_price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <input readonly type="number" class="form-control readonly" value="{{ $product->price }}"  autocomplete="price" placeholder="{{ $product->price}}" autofocus data-name="price" name="price">
            <input id="price" type="number" class="next form-control @error('price') is-invalid @enderror"  autocomplete="price" placeholder="Price" autofocus>

            @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <div class="switchToggle">
            <input class="next form-control @error('promo') is-invalid @enderror admin" type="checkbox" id="promo" name="promo"/>
            <label for="promo"></label>
          </div>
            @error('promo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <input readonly class="form-control readonly" value="{{$product->promo_percentage }}"   autofocus data-name="promo_percentage" name="promo_percentage">
            <input id="promo_percentage" type="number" class="next form-control @error('promo_percentage') is-invalid @enderror"  autocomplete="promo_percentage" placeholder="Promo Percentage" autofocus>

            @error('promo_percentage')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <!-- <input id="category" type="select" class="next form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" placeholder="Product Name" autofocus> -->
            <select id="category" class="next form-control @error('category') is-invalid @enderror" name="category" value="{{ $product->category}}"  autocomplete="category"  autofocus>
              <option value="computer">Computer</option>
              <option value="phone">Phone</option>
              <option value="camera">Camera</option>
              <option value="tablet">Tablet</option>
              <option value="accessory">Accessory</option>
            </select>

            @error('category')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <!-- <input id="category" type="select" class="next form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" placeholder="Product Name" autofocus> -->
            <select id="brand" class="next form-control @error('brand') is-invalid @enderror" name="brand" value="{{$product->brand}}"  autocomplete="brand"  autofocus>
              <option value="apple">Apple</option>
              <option value="samsung">Samsung</option>
              <option value="Sony">Sony</option>
              <option value="other">Other</option>
            </select>

            @error('brand')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <img class="avatar avatar-sm pull-up media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="/images/{{$product->path}}" alt="{{$product->name}}">
          </div>
          @foreach ($photo as $photo)
              <div class="form-group">
                <img class="avatar avatar-sm pull-up media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="/images/{{$photo->path}}" alt="{{$product->name}}">
              </div>
          @endforeach
          <div class="form-group">
          <button type="submit" class="btn-outline-info btn-lg">Submit</button>
          <button type="reset"  class="btn-outline-danger btn-lg">Reset</button>
        </div>
  </main>
  </div>
  </div>
  </div>
  </div>
  @endsection
  @section('extra-js')
  <script defer src="{{ asset('js/editproduct.js') }}"></script>
  @endsection
