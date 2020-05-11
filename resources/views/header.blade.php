
@section('header')


<header id="header">
  <div class="container d-flex">

    <div class="logo mr-auto">
      <h1 class="text-light"><a href="{{ route('home') }}"><span>OUSSAFA</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
    </div>

    <nav class="nav-menu d-none d-lg-block">
      <ul>
        <li class="active"><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('products.index',['category'=>'accessorie']) }}">Accessoires</a></li>
        <li class="drop-down"><a>Categories</a>
          <ul>
            <li><a href="{{ route('products.index',['category'=>'Phone']) }}">Phones</a></li>
            <li><a href="{{ route('products.index',['category'=>'laptop']) }}">Laptops</a></li>
            <li><a href="{{ route('products.index',['category'=>'tablet']) }}">Tablets</a></li>
            <li><a href="{{ route('products.index',['category'=>'camera']) }}">Cameras</a></li>
            <li><a href="{{ route('products.index',['category'=>'Gaming']) }}">Gaming</a></li>
          </ul>
        </li>
        <li><a href="{{ route('offers') }}">Offers</a></li>
        <li><a href="#">Contact Us</a></li>
      </ul>
    </nav><!-- .nav-menu -->

    <div class="header_extra ml-auto">
      <div class="shopping_cart">
        <a href="{{route('cart.index')}}">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
               viewBox="0 0 489 489" style="enable-background:new 0 0 489 489;" xml:space="preserve">
            <g>
              <path d="M440.1,422.7l-28-315.3c-0.6-7-6.5-12.3-13.4-12.3h-57.6C340.3,42.5,297.3,0,244.5,0s-95.8,42.5-96.6,95.1H90.3
                c-7,0-12.8,5.3-13.4,12.3l-28,315.3c0,0.4-0.1,0.8-0.1,1.2c0,35.9,32.9,65.1,73.4,65.1h244.6c40.5,0,73.4-29.2,73.4-65.1
                C440.2,423.5,440.2,423.1,440.1,422.7z M244.5,27c37.9,0,68.8,30.4,69.6,68.1H174.9C175.7,57.4,206.6,27,244.5,27z M366.8,462
                H122.2c-25.4,0-46-16.8-46.4-37.5l26.8-302.3h45.2v41c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h139.3v41
                c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h45.2l26.9,302.3C412.8,445.2,392.1,462,366.8,462z"/>
            </g>
          </svg>
          <div>Cart <span class="badge" id="cart">{{ Session::has('cart') ? Session::get('cart')->total_product : 0}}</span></div>
        </a>
      </div>
      <div class="user_login">
        @guest
            <div class="nav-item">
                <a class="nav-link" href="{{ route('login') }}"><ion-icon name="person-circle-outline"></ion-icon></a>
            </div>
        @else
        <div class="nav-item ">
            <a id="navbarDropdown" class="nav-link dropdown-toggle dropbtn " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              <ion-icon name="person-circle-outline"></ion-icon>
                {{ Auth::user()->first_name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right dropdown_account" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('overview') }}">
                    Settings
                </a></li>
                @if(Auth::user()->is_admin == true)
                <li><a class="dropdown-item" href="{{ route('admin.index') }}">
                    Admin Panel
                </a></li>
                @endif
                <li><a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a></li>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    @endguest

  </div>
  </div>

  </div>
  <div class="search-container" style="width:450px;margin:auto;margin-top:-20px;">
    <form action="{{ route('search') }}" method="get">
      <input id="inp" type="text" placeholder="Search.." name="search" style="width:400px;margin:auto;">
      <button id="butto" type="submit"><i class="fa fa-search" ></i></button>
    </form>
  </div>
</header><!-- End Header -->
@endsection
