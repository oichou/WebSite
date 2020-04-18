@extends('layouts.adminapp')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard/admin.css')}}">
@endsection
@section('content')

<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
    </div>
    <div class="content-body">
        <!-- Chart -->
      <div class="row match-height">
        <div class="col-12">
            <div class="">
                <div id="gradient-line-chart1" class="height-250 GradientlineShadow1"></div>
            </div>
        </div>
      </div>
      <!-- Chart -->
      <!-- eCommerce statistic -->
      <div class="row align-items-center">
        <div class="chart col-xl-3 col-lg-6 col-md-12">
            <div class="pull-up  bg-white">
                <!-- <div class="card-content ecom-card2 height-180"> -->
                  <div class="mdc-card info-card info-card--success">
                    <div class="card-inner">
                      <h5 class="card-title info text-muted">Total user</h5>
                      <h5 class="font-weight-light pb-2 mb-1 border-bottom">{{$total_user}} Users</h5>
                      <!-- <p class="tx-12 text-muted">48% target reached</p> -->
                      <div class="card-icon-wrapper">
                        <i class="material-icons">user</i>
                      </div>
                    </div>
                  <!-- </div> -->
                </div>
            </div>
        </div>
        <div class="chart2 col-xl-3 col-lg-6 col-md-12">
            <div class=" pull-up  bg-white">
                <!-- <div class="card-content ecom-card2 height-180"> -->
                  <div class="mdc-card info-card info-card--success">
                    <div class="card-inner">
                      <h5 class="card-title info text-muted">Total Product</h5>
                      <h5 class="font-weight-light pb-2 mb-1 border-bottom">{{ $total_product }} Product</h5>
                      <!-- <p class="tx-12 text-muted">48% target reached</p> -->
                      <div class="card-icon-wrapper">
                        <i class="material-icons">Prod</i>
                      </div>
                    </div>
                  <!-- </div> -->
                </div>
            </div>
        </div>

        <div class="chart col-xl-3 col-lg-6 col-md-12">
            <div class=" pull-up  bg-white">
                <!-- <div class="card-content ecom-card2 height-180"> -->
                  <div class="mdc-card info-card info-card--success">
                    <div class="card-inner">
                      <h5 class="card-title info text-muted">Total orders</h5>
                      <h5 class="font-weight-light pb-2 mb-1 border-bottom">{{$total_order}} Order</h5>
                      <!-- <p class="tx-12 text-muted">48% target reached</p> -->
                      <div class="card-icon-wrapper">
                        <i class="material-icons">order</i>
                      </div>
                    </div>
                  <!-- </div> -->
                </div>
            </div>
        </div>

        <div class="chart col-xl-3 col-lg-6 col-md-12">
            <div class=" pull-up  bg-white">
                <!-- <div class="card-content ecom-card2 height-180"> -->
                  <div class="mdc-card info-card info-card--success">
                    <div class="card-inner">
                      <h5 class="card-title info text-muted">Total income</h5>
                      <h5 class="font-weight-light pb-2 mb-1 border-bottom">${{ $total_income }}</h5>
                      <!-- <p class="tx-12 text-muted">48% target reached</p> -->
                      <div class="card-icon-wrapper">
                        <i class="material-icons">$</i>
                      </div>
                    </div>
                  <!-- </div> -->
                </div>
            </div>
        </div>

      </div>
      <!--/ eCommerce statistic -->

      <!-- Statistics -->
      <!-- <div class="container"> -->

      <div class="row match-height row-eq-height">
        <div class="col-xl-8 col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="heading-multiple-thumbnails">Multiple Thumbnail</h4>
                        <a class="heading-elements-toggle">
                            <i class="la la-ellipsis-v font-medium-3"></i>
                        </a>
                        <!-- <div class="heading-elements">
                            <span class="avatar">
                                <img src="theme-assets/images/portrait/small/avatar-s-2.png" alt="avatar">
                            </span>
                            <span class="avatar">
                                <img src="theme-assets/images/portrait/small/avatar-s-3.png" alt="avatar">
                            </span>
                            <span class="avatar">
                                <img src="theme-assets/images/portrait/small/avatar-s-4.png" alt="avatar">
                            </span>
                        </div> -->
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                          <table class="table table-striped table-hover">
                            <thead>
                                <th>User</th>
                                <th>Price</th>
                                <th>Nb Product</th>
                                <th>Created at</th>
                            </thead>
                            <tbody>
                              @foreach($big_numbers as $bn)
                              <tr>
                                <td>{{$bn->first_name}} {{$bn->last_name}}</td>
                                <td>{{$bn->price}}</td>
                                <td>a faiire plus tard</td>
                                <td>{{$bn->date_order}}</td>
                              </tr>
                              @endforeach

                            </tbody>
                          </table>
                            <!-- <h4 class="card-title">Content title</h4>
                            <p class="card-text">Jelly beans sugar plum cheesecake cookie oat cake soufflé.Tootsie roll bonbon liquorice tiramisu pie powder.Donut sweet
                                roll marzipan pastry cookie cake tootsie roll oat cake cookie.Jelly beans sugar plum cheesecake cookie oat cake soufflé. Tart lollipop carrot cake sugar plum. </p>
                            <p class="card-text">Sweet roll marzipan pastry halvah. Cake bear claw sweet. Tootsie roll pie marshmallow lollipop chupa chups donut fruitcake
                                cake.Jelly beans sugar plum cheesecake cookie oat cake soufflé. Tart lollipop carrot cake sugar plum. Marshmallow
                                wafer tiramisu jelly beans.</p> -->
                        </div>
                    </div>
                </div>
        </div>

        <div class="col-xl-4 col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Recent Buyers</h4>
                    <a class="heading-elements-toggle">
                        <i class="fa fa-ellipsis-v font-medium-3"></i>
                    </a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li>
                                <a data-action="reload">
                                    <i class="ft-rotate-cw"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <div id="recent-buyers" class="media-list">
                      @foreach ($recent_order as $ro)
                        <a href="#" class="media border-0">
                            <!-- <div class="media-left pr-1">
                                <span class="avatar avatar-md avatar-online">
                                    <img class="media-object rounded-circle" src="theme-assets/images/portrait/small/avatar-s-7.png" alt="Generic placeholder image">
                                    <i></i>
                                </span>
                            </div> -->
                            <div class="media-body w-100">
                                <span class="list-group-item-heading">{{$ro->first_name}} {{$ro->last_name}}

                                </span>
                                <ul class="list-unstyled users-list m-0 float-right">
                                    <li data-toggle="tooltip" data-popup="tooltip-custom"  class="avatar avatar-sm pull-up">
                                        <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="images/{{$ro->path}}"
                                            alt="Avatar">
                                    </li>
                                </ul>
                                <p class="list-group-item-text mb-0">
                                    <span class="blue-grey lighten-2 font-small-3"> Order N : {{$ro->id}}</span>
                                </p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
      </div>
    <!-- </div> -->
      <!--/ Statistics -->
    </div>
  </div>
</div>
@endsection
