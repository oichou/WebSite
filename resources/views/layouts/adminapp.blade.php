<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    @yield('extra-css')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <!-- <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet"> -->
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('theme-assets/css/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme-assets/vendors/css/charts/chartist.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN CHAMELEON  CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('theme-assets/css/app-lite.css') }}">
    <!-- END CHAMELEON  CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('theme-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('theme-assets/css/core/colors/palette-gradient.css')}}"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('theme-assets/css/pages/dashboard-ecommerce.css') }}">
</head>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">
  <!--  heaser-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
      <div class="navbar-wrapper">
        <div class="navbar-container content">
          <div class="collapse navbar-collapse show" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <li class="nav-item d-block d-md-none"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
              <li class="nav-item dropdown navbar-search"><a class="nav-link dropdown-toggle hide" data-toggle="dropdown" href="#"><i class="ficon ft-search"></i></a>
                <ul class="dropdown-menu">
                  <li class="arrow_box">
                    <form>
                      <div class="input-group search-box">
                        <div class="position-relative has-icon-right full-width">
                          <input class="form-control" id="search" type="text" placeholder="Search here...">
                          <div class="form-control-position navbar-search-close"><i class="ft-x">   </i></div>
                        </div>
                      </div>
                    </form>
                  </li>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav float-right">
              <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-mail">             </i></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <div class="arrow_box_right"><a class="dropdown-item" href="#"><i class="ft-book"></i> Read Mail</a><a class="dropdown-item" href="#"><i class="ft-bookmark"></i> Read Later</a><a class="dropdown-item" href="#"><i class="ft-check-square"></i> Mark all Read       </a></div>
                </div>
              </li>
              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="avatar avatar-online"><img src="theme-assets/images/portrait/small/parameters.png" alt="avatar"><i></i></span></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <div class="arrow_box_right"><a class="dropdown-item" href="{{ url('home') }}"><span class="avatar avatar-online"><span class="user-name text-bold-700 ml-1"> Auth::user()->first_name Auth::user()->last_name </span></span></a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ url('profile') }}"><i class="ft-user"></i> Edit Profile</a>
                    <!-- <a class="dropdown-item" href="#"><i class="ft-mail"></i> My Inbox</a><a class="dropdown-item" href="#"><i class="ft-check-square"></i> Task</a><a class="dropdown-item" href="#"><i class="ft-message-square"></i> Chats</a> -->
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();"><i class="ft-power"></i> Logout</a>
                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                       @csrf
                   </form>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->

      <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="theme-assets/images/backgrounds/02.jpg">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
              <a class="navbar-brand" href="index.html">
                <h3 class="brand-text">OUSSAFA</h3>
              </a>
            </li>
            <li class="nav-item d-md-none">
              <a class="nav-link close-navbar">
                <i class="ft-x"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="main-menu-content">
          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" active">
              <a href="{{route('admin.index')}}">
                <i class="ft-home"></i>
                <span class="menu-title" data-i18n="">Dashboard</span>
              </a>
            </li>
            <li class=" nav-item">
              <a href="charts.html">
                <i class="ft-pie-chart"></i>
                <span class="menu-title" data-i18n="">Charts</span>
              </a>
            </li>
            <li class=" nav-item">
              <a href="icons.html">
                <i class="ft-droplet"></i>
                <span class="menu-title" data-i18n="">Icons</span>
              </a>
            </li>
            <li class=" nav-item">
              <a href="cards.html">
                <i class="ft-layers"></i>
                <span class="menu-title" data-i18n="">Cards</span>
              </a>
            </li>
            <li class=" nav-item">
              <a href="buttons.html">
                <i class="ft-box"></i>
                <span class="menu-title" data-i18n="">Buttons</span>
              </a>
            </li>
            <li class=" nav-item">
              <a href="typography.html">
                <i class="ft-bold"></i>
                <span class="menu-title" data-i18n="">Typography</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="ft-credit-card"></i>
                <span class="menu-title">Tables</span>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route ('admin.showtable',['table'=>'User']) }}">
                      <i class="fas fa-user"></i>
                      <span class="menu-title">Users</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route ('admin.showtable',['table'=>'Product']) }}">
                      <i class="fas fa-laptop"></i>
                      <span class="menu-title">Products</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route ('admin.showtable',['table'=>'Order']) }}">
                      <i class="fas fa-cart-arrow-down"></i>
                      <span class="menu-title">Orders</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/ui-features/typography.html">
                      <i class="ft-bold"></i>
                      <span class="menu-title">XXXX</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class=" nav-item">
              <a href="form-elements.html">
                <i class="ft-layout"></i>
                <span class="menu-title" data-i18n="">Form Elements</span>
              </a>
            </li>
          </ul>
        </div>
        <div class="navigation-background"></div>
      </div>
      @yield('content')
      @yield('extra-js')
      <!-- ////////////////////////////////////////////////////////////////////////////-->
      <!-- BEGIN VENDOR JS-->
      <script src="{{ asset('theme-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
      <!-- BEGIN VENDOR JS-->
      <!-- BEGIN PAGE VENDOR JS-->
      <script src="{{ asset('theme-assets/vendors/js/charts/chartist.min.js') }}" type="text/javascript"></script>
      <!-- END PAGE VENDOR JS-->
      <!-- BEGIN CHAMELEON  JS-->
      <!-- <script src="theme-assets/js/core/app-menu-lite.js" type="text/javascript"></script> -->
      <!-- <script src="{{ asset('theme-assets/js/core/app-lite.js') }}" type="text/javascript"></script> -->
      <!-- END CHAMELEON  JS-->
      <!-- BEGIN PAGE LEVEL JS-->
      <script src="{{ asset('theme-assets/js/scripts/pages/dashboard-lite.js') }}" type="text/javascript"></script>
      <!-- END PAGE LEVEL JS-->
    <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js" data-auto-replace-svg="nest"></script></body>

</body>
</html>
