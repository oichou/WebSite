@extends('layouts.app')
<!-- Header -->
@include('header')

@section('content')
	<div class="menu menu_mm trans_300">
		<div class="menu_container menu_mm">
			<div class="page_menu_content">

				<div class="page_menu_search menu_mm">
					<form action="#">
						<input type="search" required="required" class="page_menu_search_input menu_mm" placeholder="Search for products...">
					</form>
				</div>
				<ul class="page_menu_nav menu_mm">
					<li class="page_menu_item has-children menu_mm">
						<a href="index.html">Home<i class="fa fa-angle-down"></i></a>
						<ul class="page_menu_selection menu_mm">
							<li class="page_menu_item menu_mm"><a href="categories.html">Categories<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="product.html">Product<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="cart.html">Cart<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="checkout.html">Checkout<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="contact.html">Contact<i class="fa fa-angle-down"></i></a></li>
						</ul>
					</li>
					<li class="page_menu_item has-children menu_mm">
						<a href="categories.html">Categories<i class="fa fa-angle-down"></i></a>
						<ul class="page_menu_selection menu_mm">
							<li class="page_menu_item menu_mm"><a href="categories.html">Category<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="categories.html">Category<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="categories.html">Category<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="categories.html">Category<i class="fa fa-angle-down"></i></a></li>
						</ul>
					</li>
					<li class="page_menu_item menu_mm"><a href="index.html">Accessories<i class="fa fa-angle-down"></i></a></li>
					<li class="page_menu_item menu_mm"><a href="#">Offers<i class="fa fa-angle-down"></i></a></li>
					<li class="page_menu_item menu_mm"><a href="contact.html">Contact<i class="fa fa-angle-down"></i></a></li>
				</ul>
			</div>
		</div>

		<div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>

		<div class="menu_social">
			<ul>
				<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
			</ul>
		</div>
	</div>

	<!-- Home -->

	<div class="home">
		<div class="home_slider_container">

			<!-- Home Slider -->
			<div class="owl-carousel owl-theme home_slider">

        <!-- Slider Item -->
        <div class="owl-item home_slider_item">
          <div class="home_slider_background" style="background-image:url({{URL::to('/')}}/images/alldevice.jpg)"></div>
          <div class="home_slider_content_container">
            <div class="container">
              <div class="row">
                <div class="col">
                  <div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
                    <div class="home_slider_title">All what you need, we have it .</div>
                    <!-- <div class="home_slider_subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.</div> -->
                    <div class="button button_light home_button"><a href="#">Shop Now</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

				<!-- Slider Item -->
				<div class="owl-item home_slider_item">
					<div class="home_slider_background" style="background-image:url({{URL::to('/')}}/images/macpro2.jpg)"></div>
					<div class="home_slider_content_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
										<div class="home_slider_title">The new Macbook is here!!</div>
										<div class="home_slider_subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.</div>
										<div class="button button_light home_button"><a href="#">Shop Now</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<!-- Slider Item -->
				<div class="owl-item home_slider_item">
					<div class="home_slider_background" style="background-image:url({{URL::to('/')}}/images/home_slider_1.jpg)"></div>
					<div class="home_slider_content_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
										<div class="home_slider_title">A new Online Shop experience.</div>
										<div class="home_slider_subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.</div>
										<div class="button button_light home_button"><a href="#">Shop Now</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

			<!-- Home Slider Dots -->

			<div class="home_slider_dots_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_slider_dots">
								<ul id="home_slider_custom_dots" class="home_slider_custom_dots">
									<li class="home_slider_custom_dot active">01.</li>
									<li class="home_slider_custom_dot">02.</li>
									<li class="home_slider_custom_dot">03.</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

  <!-- category -->


  	<div class="categories" > <div >Category</div>
      <div class="categories-container d-flex flex-lg-row flex-column align-items-start justify-content-between">
        <div class="category">
          <a id ="" href="#">
            <div class="category-background" style="background-image:url({{URL::to('/')}}/images/cat_phones.jpg)"></div>
            <div class="category-title">Phones</div>
          </a>
        </div>
        <div class="category">
          <a id ="" href="#">
            <div class="category-background" style="background-image:url({{URL::to('/')}}/images/cat_computers.jpg)"></div>
            <div class="category-title">Computers</div>
          </a>
        </div>
        <div class="category">
          <a id ="" href="#">
            <div class="category-background" style="background-image:url({{URL::to('/')}}/images/gaming.jpg)"></div>
            <div class="category-title">Gaming</div>
          </a>
        </div>
        <div class="category">
          <a id ="" href="#">
            <div class="category-background" style="background-image:url({{URL::to('/')}}/images/cat_other.jpg)"></div>
            <div class="category-title">Other</div>
          </a>
        </div>
      </div>
    </div>


	<!-- brand -->

  <div class="brands"> <p>Brand</p>
    <div class="brands-container d-flex flex-lg-row flex-column align-items-start justify-content-between">
      <div class="brand">
        <a id ="" href="#">
          <div class="brand-background" style="background-image:url({{URL::to('/')}}/images/brand_apple2.jpg)"></div>
          <div class="brand-title">apple</div>
        </a>
      </div>
      <div class="brand">
        <a id ="" href="#">
          <div class="brand-background" style="background-image:url({{URL::to('/')}}/images/brand_samsung.jpg)"></div>
          <div class="brand-title">Samsung</div>
        </a>
      </div>
      <div class="brand">
        <a id ="" href="#">
          <div class="brand-background" style="background-image:url({{URL::to('/')}}/images/brand_sony2.jpg)"></div>
          <div class="brand-title">Sony</div>
        </a>
      </div>
    </div>
  </div>

	<!-- Latest -->

<div class="latest"> New Product

</div>
<div class="products">
  <div class="container">
    <div class="row">
      <div class="col">

        <div class="product_grid">

          <!-- Product -->
          <div class="product">
            <div class="product_image"><img src="images/product_1.jpg" alt=""></div>
            <div class="product_extra product_new"><a href="categories.html">New</a></div>
            <div class="product_content">
              <div class="product_title"><a href="product.html">Smart Phone</a></div>
              <div class="product_price">$670</div>
            </div>
          </div>

          <!-- Product -->
          <div class="product">
            <div class="product_image"><img src="images/product_2.jpg" alt=""></div>
            <div class="product_extra product_sale"><a href="categories.html">Sale</a></div>
            <div class="product_content">
              <div class="product_title"><a href="product.html">Smart Phone</a></div>
              <div class="product_price">$670</div>
            </div>
          </div>

          <!-- Product -->
          <div class="product">
            <div class="product_image"><img src="images/product_3.jpg" alt=""></div>
            <div class="product_content">
              <div class="product_title"><a href="product.html">Smart Phone</a></div>
              <div class="product_price">$670</div>
            </div>
          </div>

          <!-- Product -->
          <div class="product">
            <div class="product_image"><img src="images/product_4.jpg" alt=""></div>
            <div class="product_content">
              <div class="product_title"><a href="product.html">Smart Phone</a></div>
              <div class="product_price">$670</div>
            </div>
          </div>


      </div>
    </div>
  </div>
</div>
</div>

	<!-- Icon Boxes -->

	<div class="icon_boxes">
		<div class="container">
			<div class="row icon_box_row">

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="{{URL::to('/')}}/images/icon_1.svg" alt=""></div>
						<div class="icon_box_title">Free Shipping Worldwide</div>
						<!-- <div class="icon_box_text">
							<p>For all the.</p>
						</div> -->
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="{{URL::to('/')}}/images/icon_2.svg" alt=""></div>
						<div class="icon_box_title">Free Returns</div>
						<!-- <div class="icon_box_text"> -->
							<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
						</div> -->
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="{{URL::to('/')}}/images/icon_3.svg" alt=""></div>
						<div class="icon_box_title">24h Fast Support</div>
						<!-- <div class="icon_box_text">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
						</div> -->
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_border"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="newsletter_content text-center">
						<div class="newsletter_title">Subscribe to our newsletter</div>
						<div class="newsletter_text"><p>Get 15% Discount on your first order.</p></div>
						<div class="newsletter_form_container">
							<form action="#" id="newsletter_form" class="newsletter_form">
								<input type="email" class="newsletter_input" required="required">
								<button class="newsletter_button trans_200"><span>Subscribe</span></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
<!-- Footer -->
@include('footer')
