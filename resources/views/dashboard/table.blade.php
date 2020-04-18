@extends('layouts.adminapp')
@section('extra-css')
<style>

.outerDivFull { margin:50px; }

.switchToggle input[type=checkbox]{height: 0; width: 0; visibility: hidden; position: absolute; }
.switchToggle label {cursor: pointer; text-indent: -9999px; width: 70px; max-width: 70px; height: 30px; background: #d1d1d1; display: block; border-radius: 100px; position: relative; }
.switchToggle label:after {content: ''; position: absolute; top: 2px; left: 2px; width: 26px; height: 26px; background: #fff; border-radius: 90px; transition: 0.3s; }
.switchToggle input:checked + label, .switchToggle input:checked + input + label  {background: #3e98d3; }
.switchToggle input + label:before, .switchToggle input + input + label:before {content: 'No'; position: absolute; top: 5px; left: 35px; width: 26px; height: 26px; border-radius: 90px; transition: 0.3s; text-indent: 0; color: #fff; }
.switchToggle input:checked + label:before, .switchToggle input:checked + input + label:before {content: 'Yes'; position: absolute; top: 5px; left: 10px; width: 26px; height: 26px; border-radius: 90px; transition: 0.3s; text-indent: 0; color: #fff; }
.switchToggle input:checked + label:after, .switchToggle input:checked + input + label:after {left: calc(100% - 2px); transform: translateX(-100%); }
.switchToggle label:active:after {width: 60px; }
.toggle-switchArea { margin: 10px 0 10px 0; }
</style>
@endsection
@section('content')
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row"></div>
    <div class="content-body">
<div class="page-wrapper mdc-toolbar-fixed-adjust">
  <main class="content-wrapper">
    <div class="mdc-layout-grid">
<div class="mdc-layout-grid__inner">
<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
  <div class="mdc-card p-0">
    <h6 class="card-title card-padding pb-0">Products Table</h6>
    <div class="table-responsive">
      <table class="table table-striped table-bordered">
        <thead class="thead-dark">
          <tr>
            @foreach($columns as $th)
            <th>{{ $th }}</th>
            @endforeach
          </tr>
        </thead>
        <tbody>
          @forelse($products as $product)
            <tr scope="row">
              <td>{{$product->id}}</td>
              <td><img class="avatar avatar-sm pull-up media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="images/{{$product->path}}" alt="{{$product->name}}"></td>
              <td>{{$product->name}}</td>
              <td>{{$product->quantity}}</td>
              <td>{{$product->category}}</td>
              <td>{{$product->brand}}</td>
              <td>description</td>
              <td class="price" >${{$product->basic_price}}</td>
              <td class="price" >${{$product->price}}</td>
              <td >
                <div class="switchToggle">
                  @if( $product->promo  == true)
                  <input class="promo" type="checkbox" checked="checked" id="{{$product->id}}" data-id="{{ $product->id }}" data-type="true">
                  @else
                  <input class="promo" type="checkbox" id="{{$product->id}}" data-id="{{ $product->id }}" data-type="false">
                  @endif
                <label for="{{$product->id}}">Toggle</label>
                </div>
              </td>
              <td class="percentage" >{{$product->promo_percentage}}%</td>
              <td>{{$product->created_at}}</td>
              <td>{{$product->updated_at}}</td>
            </tr>
            @empty
            empty
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>
</main>
</div>
</div>
</div>
</div>
@endsection
@section('extra-js')
<script defer src="{{ asset('js/table.js') }}"></script>
@endsection
