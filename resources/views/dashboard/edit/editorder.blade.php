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
    <h1>Edit Order</h1>
    <div class="login-dark container">
      <form method="POST" action="{{route ('updateorder',['id' => $order->id])}}" enctype="multipart/form-data">
        @csrf


          <div class="form-group">
            <input type="number" readonly  class="nan form-control readonly"  autofocus data-name="price" name="price" value="{{ $order->price }}" autofocus />
            <input id="price" type='number' class="nan next form-control @error('price') is-invalid @enderror"  autocomplete="price" placeholder="Order Price" autofocus/>

            @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <input readonly type="text" class="form-control readonly"  value="{{ $order->method }}" autofocus data-name="method" name="method">
            <input id="method" type="text" class="next form-control @error('method') is-invalid @enderror"  autocomplete="method" placeholder="Method used" autofocus>

            @error('method')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <input autofocus readonly class="form-control readonly" value="{{ $order->transaction_id }}"   autofocus data-name="transaction_id" name="transaction_id">
            <input id="transaction_id" type="text" class="next form-control @error('transaction_id') is-invalid @enderror"  autocomplete="transaction_id" placeholder="Transaction ID" autofocus>

            @error('transaction_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <input readonly type="text" class="form-control readonly" value="{{ $order->PayerID }}"  autocomplete="PayerID" placeholder="{{ $order->PayerID}}" autofocus data-name="PayerID" name="PayerID">
            <input id="PayerID" type="text" class="next form-control @error('PayerID') is-invalid @enderror"  autocomplete="PayerID" placeholder="Payer ID" autofocus>

            @error('PayerID')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>


          <div class="form-group">
            <!-- <input id="category" type="select" class="next form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" placeholder="Product Name" autofocus> -->
            <select id="statut" class="next form-control @error('statut') is-invalid @enderror" name="statut" value="{{ $order->statut}}"  autocomplete="statut"  autofocus>
              <option value="Received">Received</option>
              <option value="Echec">Echec</option>
              <option value="Delivered">Delivered</option>
              <option value="Shipped">Shipped</option>
              <option value="Delay">Delay</option>
              <option value="Refund">Refund</option>
            </select>

            @error('statut')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <input readonly type="text" class="form-control readonly" value="{{ $order->date_order }}"  autocomplete="date_order" placeholder="{{ $order->date_order}}" autofocus data-name="date_order" name="date_order">
            <input id="date_order" type="text" class="next form-control @error('date_order') is-invalid @enderror"  autocomplete="date_order" placeholder="Day of order" autofocus>

            @error('date_order')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <input readonly type="text" class="form-control readonly" value="{{ $order->date_delivery }}"  autocomplete="date_delivery" placeholder="{{ $order->date_delivery}}" autofocus data-name="date_delivery" name="date_delivery">
            <input id="date_delivery" type="text" class="next form-control @error('date_delivery') is-invalid @enderror"  autocomplete="date_delivery" placeholder="Day of delivery" autofocus>

            @error('date_delivery')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
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
