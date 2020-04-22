@extends('layouts.app')

@section('extra-css')
<!-- <style >
	.header ,.footer{
		position: fixed;
	}
</style> -->
@endsection
<!-- Header -->
@include('header')

@section('content')
<!-- Menu -->
<!-- ======= Hero Section ======= -->
<section id="hero">
	<div class="hero-container">
		<div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

			<ol class="carousel-indicators" id="hero-carousel-indicators">
				<li data-target="#heroCarousel" data-slide-to="0" class=""></li>
				<li data-target="#heroCarousel" data-slide-to="0" class=""></li>
				<li data-target="#heroCarousel" data-slide-to="0" class=""></li>
			</ol>

			<div class="carousel-inner" role="listbox">

				<!-- Slide 1 -->
				<div class="carousel-item active">
					<div class="carousel-background"><img src="images/brand_apple.jpg" alt=""></div>
					<div class="carousel-container">
						<div class="carousel-content">
							<h2 class="animated fadeInDown">Welcome to <span>Oussafa</span></h2>
							<p class="animated fadeInUp"></p>
							<a href="" class="btn-get-started animated fadeInUp scrollto">Get Started</a>
						</div>
					</div>
				</div>

				<!-- Slide 2 -->
				<div class="carousel-item">
					<div class="carousel-background"><img src="images/AZE1.jpg" alt=""></div>
					<div class="carousel-container">
						<div class="carousel-content">
							<h2 class="animated fadeInDown"></h2>
							<!-- <p class="animated fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p> -->
							<!-- <a href="#about" class="btn-get-started animated fadeInUp scrollto">Get Started</a> -->
						</div>
					</div>
				</div>

				<!-- Slide 3 -->
				<div class="carousel-item">
					<div class="carousel-background"><img src="images/alldevice.jpg" alt=""></div>
					<div class="carousel-container">
						<div class="carousel-content">
							<!-- <h2 class="animated fadeInDown">Sequi ea ut et est quaerat</h2>
							<p class="animated fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p> -->
							<!-- <a href="#about" class="btn-get-started animated fadeInUp scrollto">Get Started</a> -->
						</div>
					</div>
				</div>

			</div>

			<a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon icofont-thin-double-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>

			<a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
				<span class="carousel-control-next-icon icofont-thin-double-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>

		</div>
	</div>
</section><!-- End Hero -->

<section class="cta">
	<div class="container">

		<div class="text-center">
			<h3>Call To Action</h3>
			<p> Discover more of our products, dive in this new world where you get to choose what you wish</p>
			<a class="cta-btn" href="#">Call To Action</a>
		</div>

	</div>
</section><!-- End Cta Section -->

<!-- ======= More Services Section ======= -->
<section class="more-services section-bg">
	<div class="container">

		<div class="row">
			<div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-5 mb-lg-0">
				<div class="card">
					<img src="images/brand_apple.jpg" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title"><a href="">Apple Brand</a></h5>
						<p class="card-text"></p>
						<a href="#" class="btn">Explore more</a>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-5 mb-lg-0">
				<div class="card">
					<img src="images/brand_samsung.jpg" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title"><a href="">Sumsung Brand</a></h5>
						<p class="card-text"></p>
						<a href="#" class="btn">Explore more</a>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-5 mb-lg-0">
				<div class="card">
					<img src="images/brand_sony2.jpg" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title"><a href="">Sony Brand</a></h5>
						<p class="card-text"></p>
						<a href="#" class="btn">Explore more</a>
					</div>
				</div>
			</div>
		</div>

	</div>
</section><!-- End More Services Section -->

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
					<li data-filter=".filter-app">App</li>
					<li data-filter=".filter-card">Card</li>
					<li data-filter=".filter-web">Web</li>
				</ul>
			</div>
		</div>

		<div class="row portfolio-container">

			<div class="col-lg-4 col-md-6 portfolio-item filter-app">
				<div class="portfolio-wrap">
					<img src="images/macpro2.jpg" class="img-fluid" alt="">
					<div class="portfolio-info">
						<h4>App 1</h4>
						<p>App</p>
					</div>
					<div class="portfolio-links">
						<a href="images/macpro2.jpg" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="bx bx-plus"></i></a>
						<a href="#" title="More Details"><i class="bx bx-link"></i></a>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 portfolio-item filter-web">
				<div class="portfolio-wrap">
					<img src="images/macpro2.jpg" class="img-fluid" alt="">
					<div class="portfolio-info">
						<h4>Web 3</h4>
						<p>Web</p>
					</div>
					<div class="portfolio-links">
						<a href="images/macpro2.jpg" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="bx bx-plus"></i></a>
						<a href="#" title="More Details"><i class="bx bx-link"></i></a>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 portfolio-item filter-app">
				<div class="portfolio-wrap">
					<img src="images/macpro2.jpg" class="img-fluid" alt="">
					<div class="portfolio-info">
						<h4>App 2</h4>
						<p>App</p>
					</div>
					<div class="portfolio-links">
						<a href="images/macpro2.jpg" data-gall="portfolioGallery" class="venobox" title="App 2"><i class="bx bx-plus"></i></a>
						<a href="#" title="More Details"><i class="bx bx-link"></i></a>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 portfolio-item filter-card">
				<div class="portfolio-wrap">
					<img src="images/macpro2.jpg" class="img-fluid" alt="">
					<div class="portfolio-info">
						<h4>Card 2</h4>
						<p>Card</p>
					</div>
					<div class="portfolio-links">
						<a href="images/macpro2.jpg" data-gall="portfolioGallery" class="venobox" title="Card 2"><i class="bx bx-plus"></i></a>
						<a href="#" title="More Details"><i class="bx bx-link"></i></a>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 portfolio-item filter-web">
				<div class="portfolio-wrap">
					<img src="images/macpro2.jpg" class="img-fluid" alt="">
					<div class="portfolio-info">
						<h4>Web 2</h4>
						<p>Web</p>
					</div>
					<div class="portfolio-links">
						<a href="images/macpro2.jpg" data-gall="portfolioGallery" class="venobox" title="Web 2"><i class="bx bx-plus"></i></a>
						<a href="#" title="More Details"><i class="bx bx-link"></i></a>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 portfolio-item filter-app">
				<div class="portfolio-wrap">
					<img src="images/macpro2.jpg" class="img-fluid" alt="">
					<div class="portfolio-info">
						<h4>App 3</h4>
						<p>App</p>
					</div>
					<div class="portfolio-links">
						<a href="images/macpro2.jpg" data-gall="portfolioGallery" class="venobox" title="App 3"><i class="bx bx-plus"></i></a>
						<a href="#" title="More Details"><i class="bx bx-link"></i></a>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 portfolio-item filter-card">
				<div class="portfolio-wrap">
					<img src="images/macpro2.jpg" class="img-fluid" alt="">
					<div class="portfolio-info">
						<h4>Card 1</h4>
						<p>Card</p>
					</div>
					<div class="portfolio-links">
						<a href="images/macpro2.jpg" data-gall="portfolioGallery" class="venobox" title="Card 1"><i class="bx bx-plus"></i></a>
						<a href="#" title="More Details"><i class="bx bx-link"></i></a>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 portfolio-item filter-card">
				<div class="portfolio-wrap">
					<img src="images/macpro2.jpg" class="img-fluid" alt="">
					<div class="portfolio-info">
						<h4>Card 3</h4>
						<p>Card</p>
					</div>
					<div class="portfolio-links">
						<a href="images/macpro2.jpg" data-gall="portfolioGallery" class="venobox" title="Card 3"><i class="bx bx-plus"></i></a>
						<a href="#" title="More Details"><i class="bx bx-link"></i></a>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 portfolio-item filter-web">
				<div class="portfolio-wrap">
					<img src="images/macpro2.jpg" class="img-fluid" alt="">
					<div class="portfolio-info">
						<h4>Web 3</h4>
						<p>Web</p>
					</div>
					<div class="portfolio-links">
						<a href="images/macpro2.jpg" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="bx bx-plus"></i></a>
						<a href="#" title="More Details"><i class="bx bx-link"></i></a>
					</div>
				</div>
			</div>

		</div>

	</div>
</section><!-- End Our Portfolio Section -->



@endsection

<!-- footer -->
@include('footer')
