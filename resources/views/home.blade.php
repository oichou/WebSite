@extends('layouts.app')

@section('extra-css')
<style >
	#header{
		position: fixed;
	}
	.carousel-image{
		width: 100%;
	}
	.catbrand{
		float:  center;
    width:  100%;
    height: 350px;
    /* background-size: cover; */
	}
</style>
@endsection
<!-- Header -->
@include('header')

@section('content')
<!-- Menu -->

<!-- ======= Hero Section ======= -->
<section id="hero">
	<div class="hero-container">
		<div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

			<!-- <ol class="carousel-indicators" id="hero-carousel-indicators">
				<li data-target="#heroCarousel" data-slide-to="0" class=""></li>
				<li data-target="#heroCarousel" data-slide-to="0" class=""></li>
				<li data-target="#heroCarousel" data-slide-to="0" class=""></li>
			</ol> -->

			<div class="carousel-inner" role="listbox">

				<!-- Slide 1 -->
				<div class="carousel-item active">
					<div class="carousel-background"><img class="carousel-image" src="images/cat_gaming.jpg" alt=""></div>
					<div class="carousel-container">
						<div class="carousel-content">
							<h2 class="animated fadeInDown">Welcome to OUSSAFA</h2>
							<p class="animated fadeInUp"><b>Go up and never stop</b></p>
							<a href="#about" class="btn-get-started animated fadeInUp scrollto">Get Started</a>
						</div>
					</div>
				</div>

				<!-- Slide 2 -->
				<div class="carousel-item">
					<div class="carousel-background"><img class="carousel-image" src="images/alldevice.jpg" alt=""></div>
					<div class="carousel-container">
						<div class="carousel-content">
							<h2 class="animated fadeInDown"></h2>
							<p class="animated fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
							<a href="#about" class="btn-get-started animated fadeInUp scrollto">Get Started</a>
						</div>
					</div>
				</div>

				<!-- Slide 3 -->
				<div class="carousel-item">
					<div class="carousel-background"><img class="carousel-image" src="images/alldevice.jpg" alt=""></div>
					<div class="carousel-container">
						<div class="carousel-content">
							<h2 class="animated fadeInDown">Sequi ea ut et est quaerat</h2>
							<p class="animated fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
							<a href="#about" class="btn-get-started animated fadeInUp scrollto">Get Started</a>
						</div>
					</div>
				</div>

			</div>

			<a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
				<i class="fa fa-backward"></i>
				<!-- <span class="sr-only">Previodddddus</span> -->
			</a>

			<a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
				<i class="fa fa-forward"></i>
				<!-- <span class="sr-only">Next</span> -->
			</a>

		</div>
	</div>
</section>
<!-- End Hero -->

<!--  Cta Section -->
<section class="cta">
	<div class="container">

		<div class="text-center">
			<h3>Different brands</h3>
			<!-- <p> Discover more of our products, dive in this new world where you get to choose what you wish</p> -->
			<a class="cta-btn" href="{{ route('products.index') }}">See all brands</a>
		</div>

	</div>
</section>
<!-- End Cta Section -->

<!-- ======= More Services Section ======= -->
<section class="more-services section-bg">
	<div class="container">
		<h1 style="color:black;"><strong>Brand</strong></h1>

		<div class="row">

			<div class="col-lg-3 col-md-6 d-flex align-items-stretch mb-5 mb-lg-1">
				<div class="card">
					<img class="catbrand" src="images/brand_apple.jpg" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title"><a href="{{ route('products.index',['brand'=>'apple']) }}">Apple</a></h5>
						<p class="card-text"></p>
						<a href="{{ route('products.index',['brand'=>'apple']) }}" class="btn">Explore more</a>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 d-flex align-items-stretch mb-5 mb-lg-0">
				<div class="card">
					<img class="catbrand" src="images/brand_samsung.jpg" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title"><a href="{{ route('products.index',['brand'=>'samsung']) }}">Sumsung</a></h5>
						<p class="card-text"></p>
						<a href="{{ route('products.index',['brand'=>'samsung']) }}" class="btn">Explore more</a>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 d-flex align-items-stretch mb-5 mb-lg-0">
				<div class="card">
					<img class="catbrand" src="images/brand_sony2.jpg" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title"><a href="{{ route('products.index',['brand'=>'sony']) }}">Sony</a></h5>
						<p class="card-text"></p>
						<a href="{{ route('products.index',['brand'=>'sony']) }}" class="btn">Explore more</a>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 d-flex align-items-stretch mb-5 mb-lg-0">
				<div class="card">
					<img class="catbrand" src="images/brand_sony2.jpg" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title"><a href="{{ route('products.index',['brand'=>'sony']) }}">Sony</a></h5>
						<p class="card-text"></p>
						<a href="{{ route('products.index',['brand'=>'sony']) }}" class="btn">Explore more</a>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>
<!-- End More Services Section -->

<!--  Cta Section -->
<section class="cta">
	<div class="container">

		<div class="text-center">
			<h3>Different categories</h3>
			<!-- <p> Discover more of our products, dive in this new world where you get to choose what you wish</p> -->
			<a class="cta-btn" href="{{ route('products.index') }}">See all categories</a>
		</div>

	</div>
</section>
<!-- End Cta Section -->

<!-- ======= More Services Section ======= -->
<section class="more-services section-bg">
	<div class="container">
		<h1 style="color:black;"><strong>Category</strong></h1>
		<div class="row">
			<div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-5 mb-lg-0">
				<div class="card">
					<img class="catbrand" src="images/cat_phones.jpg" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title"><a href="{{ route('products.index',['category'=>'phone']) }}">Phones</a></h5>
						<p class="card-text"></p>
						<a href="{{ route('products.index',['category'=>'phone']) }}" class="btn">Explore more</a>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-5 mb-lg-0">
				<div class="card">
					<img class="catbrand" src="images/cat_computers.jpg" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title"><a href="{{ route('products.index',['category'=>'laptop']) }}">Laptops</a></h5>
						<p class="card-text"></p>
						<a href="{{ route('products.index',['category'=>'laptop']) }}" class="btn">Explore more</a>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-5 mb-lg-0">
				<div class="card">
					<img class="catbrand" src="images/cat_other.jpg" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title"><a href="{{ route('products.index',['category'=>'accessory']) }}">Other</a></h5>
						<p class="card-text"></p>
						<a href="{{ route('products.index',['category'=>'accessory']) }}" class="btn">Explore more</a>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>
<!-- End More Services Section -->

<!-- ======= Our Portfolio Section ======= -->
<section id="portfolio" class="portfolio section-bg">
	<div class="container">

		<div class="section-title">
			<h2>Our Portfolio</h2>
			<p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
		</div>

		<div class="row">
			<div class="col-lg-12 d-flex justify-content-center">
				<ul id="portfolio-flters">
					<li data-filter="*" class="filter-active">All</li>
					<li data-filter=".filter-phone">Phone</li>
					<li data-filter=".filter-laptop">Laptop</li>
					<li data-filter=".filter-web">Web</li>
				</ul>
			</div>
		</div>

		<div class="row portfolio-container">
			@foreach($products as $product)
					<div class="col-lg-4 col-md-6 portfolio-item filter-card">
						<div class="portfolio-wrap">
							<img src="images/{{ $product->path }}" class="img-fluid" alt="{{ $product->name }}">
							<div class="portfolio-info">
								<h4>{{ $product->name }}</h4>
								<p>{{ $product->category }}</p>
							</div>
							<div class="portfolio-links">
								<a href="images/{{ $product->path }}" data-gall="portfolioGallery" class="venobox" title="Card 3"><i class="fa fa-search-plus"></i></a>
								<a href="{{ route('products.show',['id'=>$product->id]) }}" title="More Details"><i class="fa fa-heart-o"></i></a>
							</div>
						</div>
					</div>
			@endforeach



		</div>

	</div>
</section>
<!-- End Our Portfolio Section -->



@endsection

<!-- footer -->
@include('footer')
