@extends('layouts.adminapp')
@section('extra-css')
<link rel="stylesheet" href="{{ asset('css/dashboard/table.css')}}">
@endsection
@section('content')
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <h1>Add new user</h1>
      <div class="login-dark container">
        <form method="POST" action="{{route ('newuser')}}" enctype="multipart/form-data">
          @csrf
            <div class="form-group">
              Product Name:
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Product Name" autofocus>

              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <textarea id="description" name="description" cols="40" rows="5" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" placeholder="Description" autofocus></textarea>

              @error('description')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" required autocomplete="quantity" placeholder="Quantity" autofocus>

              @error('quantity')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <input id="basic_price" type="number" class="form-control @error('basic_price') is-invalid @enderror" name="basic_price" value="{{ old('basic_price') }}" required autocomplete="basic_price" placeholder="Officiel price" autofocus>

              @error('basic_price')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" placeholder="Price" autofocus>

              @error('price')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <div class="switchToggle">
              <input class="form-control @error('promo') is-invalid @enderror admin" type="checkbox" id="promo" name="promo"/>
              <label for="promo"></label>
            </div>
              @error('promo')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <input id="promo_percentage" type="number" class="form-control @error('promo_percentage') is-invalid @enderror" name="promo_percentage" value="{{ old('promo_percentage') }}" required autocomplete="promo_percentage" placeholder="Promo Percentage" autofocus>

              @error('promo_percentage')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <!-- <input id="category" type="select" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Product Name" autofocus> -->
              <select id="category" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" required autocomplete="category"  autofocus>
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
              <!-- <input id="category" type="select" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Product Name" autofocus> -->
              <select id="brand" class="form-control @error('brand') is-invalid @enderror" name="brand" value="{{ old('brand') }}" required autocomplete="brand"  autofocus>
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
                Select image to upload:
                <input type="file" name="photo1" >
            </div>
            <div class="form-group">
                Select image to upload:
                <input type="file" name="photo2" >
            </div>
            <div class="form-group">
                Select image to upload:
                <input type="file" name="photo3" >
            </div>
            <div class="form-group">
            <button type="submit" class="btn-outline-info btn-lg">Submit</button>
            <button type="reset"  class="btn-outline-danger btn-lg">Reset</button>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('extra-js')

@endsection
