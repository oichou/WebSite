@extends('layouts.adminapp')
@section('extra-css')
<link rel="stylesheet" href="{{ asset('css/dashboard/table.css')}}">
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
    <h6 class="card-title card-padding pb-0">{{$table}}s Table</h6>
    <div class="table-responsive">
      @if($table === "Product")
      <a href="{{ route('newproduct') }}" class="btn btn-outline-primary btn-lg">ADD Product</a>
      @elseif($table === "User")
      <a href="#" class="btn btn-outline-primary btn-lg">ADD User</a>
      @else
      <a href="#" class="btn btn-outline-primary btn-lg">ADD Order</a>
      @endif
      <table class="table table-striped table-bordered table-hover">
        <thead class="thead-dark">
          <tr>
            <th>Modification</th>
            @foreach($columns as $th)
            <th>{{ $th }}</th>
            @endforeach
          </tr>
        </thead>
        <tbody>

          @if($table === 'Product')

              @forelse($items as $item)
                <tr scope="row">
                  <td>
                    <a href="{{ route ( 'admin.removefrom' ,[ 'table' => 'Product' , 'id' => $item->id ] ) }}"><i class="fa fa-trash"></i></a><br/>
                    <a href="{{ route ( 'updateproduct' ,[ 'id' => $item->id ] ) }} "><i class="fas fa-edit"></i></a><br/>
                  </td>
                  <td>{{$item->id}}</td>
                  <td><img class="avatar avatar-sm pull-up media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="/images/{{$item->path}}" alt="{{$item->name}}"></td>
                  <td>{{$item->name}}</td>
                  <td>{{$item->quantity}}</td>
                  <td>{{$item->category}}</td>
                  <td>{{$item->brand}}</td>
                  <td>description</td>
                  <td class="price" >${{$item->basic_price}}</td>
                  <td class="price" >${{$item->price}}</td>
                  <td >
                    <div class="switchToggle">
                      @if( $item->promo  == true)
                      <input class="promo" type="checkbox" checked="checked" id="{{$item->id}}" data-id="{{ $item->id }}" data-type="true">
                      @else
                      <input class="promo" type="checkbox" id="{{$item->id}}" data-id="{{ $item->id }}" data-type="false">
                      @endif
                      <label for="{{$item->id}}">Toggle</label>
                    </div>
                  </td>
                  <td class="percentage" >{{$item->promo_percentage}}%</td>
                  <td>{{$item->created_at}}</td>
                  <td>{{$item->updated_at}}</td>
                </tr>
              @empty
                No data base
              @endforelse

          @elseif($table === "User")

            @forelse ($items as $item)
              <tr scope="row">
                  <td>
                    <a href="{{ route ('admin.removefrom' ,['table' => 'User' , 'id' => $item->id ])}}"><i class="fa fa-trash"></i></a><br/>
                    <a href=""><i class="fas fa-edit"></i></a><br/>
                  </td>
                  <td>{{$item->id}}</td>
                  <td>{{$item->first_name}}</td>
                  <td>{{$item->last_name}}</td>
                  <td>{{$item->email}}</td>
                  <td>{{$item->username}}</td>
                  <td>{{$item->phone}}</td>
                  <td>{{$item->birth}}</td>
                  <td>{{$item->sexe}}</td>
                  <td>{{$item->adress_id}}</td>
                  <td>{{$item->salt}}</td>
                  <td>{{$item->password}}</td>
                  <td>
                    <div class="switchToggle">
                      @if( $item->is_admin  == true)
                      <input class="admin" type="checkbox" checked="checked" id="{{$item->id}}" data-id="{{ $item->id }}" data-type="true">
                      @else
                      <input class="admin" type="checkbox" id="{{$item->id}}" data-id="{{ $item->id }}" data-type="false">
                      @endif
                      <label for="{{$item->id}}">Toggle</label>
                    </div>
                  </td>
                  <td>{{$item->email_verified_at}}</td>
                  <td>{{$item->created_at}}</td>
                  <td>{{$item->updated_at}}</td>
                </tr>
            @empty
                No data base
            @endforelse

          @else

            @forelse ($items as $item)
                <tr scope="row">
                  <td>
                    <a href="{{ route ('admin.removefrom' , ['table' => 'Order' , 'id' => $item->id ])}}"><i class="fa fa-trash"></i></a><br/>
                    <a href="{{ route ( 'updateorder' ,       [ 'id' => $item->id ] ) }}"><i class="fas fa-edit"></i></a><br/>
                  </td>
            <td>{{$item->id}}</td>
            <td>{{$item->user_id}}</td>
            <td>${{$item->price}}</td>
            <td>{{$item->method}}</td>
            <td>{{$item->transaction_id}}</td>
            <td>{{$item->PayerID}}</td>

            @switch( $item->statut )

                @case( 'Received' )
                    <td class=" text-primary"><p class="statut btn btn-primary">{{$item->statut}}</p></td>
                    @break;
                @endcase

                @case( 'Echec' )
                    <td class=" text-danger"><p class="statut btn btn-danger">{{$item->statut}}</p></td>
                    @break;
                @endcase

                @case( 'Delivered' )
                    <td class=" text-success"><p class="statut btn btn-success">{{$item->statut}}</p></td>
                    @break;
                @endcase

                @case( 'Shipped' )
                    <td class=" text-info"><p class="statut btn btn-info">{{$item->statut}}</p></td>
                    @break;
                @endcasev

                @case( 'Delay' )
                    <td class=" text-warning"><p class="statut btn btn-warning">{{$item->statut}}</p></td>
                    @break;
                @endcase

                @case( 'Refund' )
                    <td class=" text-success"><p class="statut btn btn-success">{{$item->statut}}</p></td>
                    @break;
                @endcase

                @default
                    <td>no information</td>
                    @break;
                @endcase
            @endswitch
            <td>{{$item->date_order}}</td>
            <td>{{$item->date_delivery}}</td>
            <td>{{$item->created_at}}</td>
            <td>{{$item->updated_at}}</td>
            @empty
              No data base
            @endforelse
          @endif
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
