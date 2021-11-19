<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
	<title>{{config('app.name')}} | Home</title>
	<meta charset="utf-8">
	<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<![endif]-->
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{ asset('css/animations.css')}}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.css')}}">
	<link rel="stylesheet" href="{{ asset('css/main.css')}}" class="color-switcher-link">
	<script src="{{ asset('js/vendor/modernizr-2.6.2.min.js')}}"></script>

	{{-- <!--[if lt IE 9]>
		<script src="{{ asset('js/vendor/html5shiv.min.js')}}"></script>
		<script src="{{ asset('js/vendor/respond.min.js')}}"></script>
		<script src="{{ asset('js/vendor/jquery-1.12.4.min.js')}}"></script>
	<![endif]--> --}}

</head>

<body>
	<!--[if lt IE 9]>
		<div class="bg-danger text-center">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" class="color-main">upgrade your browser</a> to improve your experience.</div>
	<![endif]-->

	{{-- <div class="preloader">
		<div class="preloader_image"></div>
	</div> --}}

	<!-- wrappers for visual page editor and boxed version of template -->
	<div id="canvas">
		<div id="box_wrapper">

			<!-- template sections -->

			<!--topline section visible only on small screens|-->
			<div class="header_absolute s-pb-30">
				<header class="page_header ds">
					<div class="container-fluid">
						<div class="row align-items-center">
							<div class="col-xl-2 col-lg-3 col-11">
								<a href="{{ url('/')}}" class="logo text-center">
									<img src="{{ asset('images/peacelogo.png')}}" alt="">
								</a>
							</div>
							<div class="col-xl-8 col-lg-6 col-1 text-sm-center">
								<!-- main nav start -->
								<nav class="top-nav">
									<ul class="nav sf-menu">
										<li>
											<a href="#box_wrapper">Home</a>
										</li>
										<li>
												<a href="#about">About</a>
											</li>
	
											<li>
												<a href="#services">Services</a>
											</li>
	
											
	
											<!-- contacts -->
											<li>
												<a href="#contact">Contact Us</a>
											</li>
											

									</ul>
								</nav>
								<!-- eof main nav -->
							</div>
							<div class="col-xl-2 col-lg-3 text-lg-left text-xl-right d-none d-lg-block">
								<div class="header_phone">
									<h6>
										<span>1-800</span>-123-4567
									</h6>
								</div>
							</div>
							
						</div>
					</div>
					<!-- header toggler -->
					<span class="toggle_menu">
						<span></span>
					</span>
				</header>
			</div>
			<span class="toggle_menu_side header-slide">
				<span></span>
			</span>




			<section class="page_slider main_slider corner-bottom static">
					<div class="flexslider" data-nav="true" data-dots="false">
						<div class="ds text-left">
							<span class="flexslider-overlay"></span>
							<span class="embed-responsive embed-responsive-16by9">
									
							</span>
							<div class="container">
								<div class="row">
									<div class="col-12 itro_slider">
										<div class="intro_layers_wrapper">
											<div class="intro_layers">
												<div class="intro_layer animate" data-animation="fadeInDown">
													<h2 class="text-uppercase intro_featured_word">
														Peace
													</h2>
												</div>
												<div class="intro_layer animate" data-animation="fadeInUp">
													<h2 class="text-uppercase intro_featured_word name">
														Mass Transit
													</h2>
												</div>
												<div class="intro_layer animate" data-animation="fadeIn">
													<p class="text-uppercase intro_after_featured_word">In God we trust</p>
												</div>
												<div class="intro_layer page-bottom animate" data-animation="pullDown">
													<a class="btn btn-maincolor" href="{{ route('register') }}"> Book a Trip</a>
												</div>
												<div class="intro_layer page-bottom animate" data-animation="pullDown">
													<a class="btn btn-success" href="{{ route('login') }}"> Send Cargo </a>
												</div>
											</div>
											
											
										</div>
										<!-- eof .intro_layers_wrapper -->
									</div>
									<!-- eof .col-* -->
								</div>
								<!-- eof .row -->
							</div>
							<!-- eof .container -->
						</div>
					</div>
					<!-- eof flexslider -->
				</section>
	
	





			<div class="divider-10 d-block d-sm-none"></div>
			<section class="s-pt-30 s-pt-lg-50 s-pt-xl-25 ls about-home" id="about">
				<div class="divider-5 d-none d-xl-block"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
							<div class="main-content text-center">
								<div class="img-wrap text-center">
									<img src="img/vertical_line.png" alt="">
									<div class="divider-35"></div>
								</div>
								<h5>
									Who We Are
								</h5>
								<p>
									PMT is a Trusted Name in Transportation for 20 Years and counting. PMT provides transportation services for intercity/interstate
									 travelers in Nigeria.PMT customers can enjoy air conditioned vehicles and light entertainment. Peace Mass Transit Ltd 
									 offers you the unique service to hire a bus that will take you to anywhere in Nigeria, following your desired journey plan,
									  schedule and duration at a very affordable price. PMT also provides haulage services for businesses and individuals looking 
									  to transport large goods and services or materials within and around Nigerian cities.
								</p>
								<div class="divider-30"></div>
								<div class="img-wrap text-center">
									<img src="img/vertical_line.png" alt="">
								</div>
								
								
								
							</div>
						</div>
					</div>
				</div>
				<div class="divider-10 d-block d-sm-none"></div>
			</section>

			<section class="s-pt-30 s-pb-3 service-item2 ls animate" id="services" data-animation="fadeInUp">
				<div class="container">
					<div class="row c-mb-50 c-mb-md-60">
						<div class="d-none d-lg-block divider-20"></div>
						<div class="col-12 col-md-6 col-lg-4">
							<div class="vertical-item text-center">
								<div class="item-media">
									<img src="images/service/delivery-man.png" alt="">
								</div>
								<div class="item-content">
									<h6>
										<a href="service-single1.html">PMT - Logistics</a>
									</h6>

									<p>
										Send and recieve your parcels safely and quickly
									</p>

								</div>
							</div>
						</div>
						<!-- .col-* -->
						<div class="col-12 col-md-6 col-lg-4">
							<div class="vertical-item text-center">
								<div class="item-media">
									<img src="{{ asset('images/service/transportation.png')}}" alt="">
								</div>
								<div class="item-content">
									<h6>
										<a href="service-single1.html">PMT - Transportation</a>
									</h6>

									<p>
										Book and create reservation for your travel here.
									</p>

								</div>
							</div>
						</div>
						<!-- .col-* -->
						<div class="col-12 col-md-6 col-lg-4">
							<div class="vertical-item text-center">
								<div class="item-media">
									<img src="{{ asset('images/service/ecommerce.png')}}" alt="">
								</div>
								<div class="item-content">
									<h6>
										<a href="service-single1.html"> PMT - Ecommerce</a>
									</h6>

									<p>
										Buy and Sell goods, products and services
									</p>
								</div>
							</div>
						</div>
						<!-- .col-* -->
						
						
						
						
					</div>
					
				</div>
			</section>


			


			

			<section class="s-pt-130 s-pt-md-50 ls text-section">
				<div class="divider-30"></div>
				<div class="container">
					<div class="row">
						<div class="text-center col-md-12 justify-content-center text-block">
							<img src="{{ asset('img/vertical_line.png')}}" alt="">
							<div class="divider-35"></div>
							<div class="content">
								<h1>
									Lets Take you
									<br> To your destination
								</h1>
								<p>
									We’ll help to reach your destination safe and sound
								</p>
								<div class="divider-30"></div>
							</div>
							<img src="{{ asset('img/vertical_line.png')}}" alt="">
							<div>
								<div class="divider-40"></div>
								<a href="#" class="btn btn-outline-maincolor"> Book Us!</a>
								<div class="divider-30"></div>
							</div>
							<div class="img-wrap overflow-visible">
								<img src="img/vertical_line.png" alt="">
								<div class="divider-5 d-none d-xl-block"></div>
							</div>
						</div>

					</div>
				</div>
			</section>

			<section class="s-pt-50 s-pb-100 s-pt-md-30 s-pb-xl-75 ls ms teaser-contact-icon main-icon s-parallax" id="contact">
				<div class="corner corner-inverse"></div>
				<div class="text-center img-wrap col-md-12">
					<img src="img/dark_line_short.png" alt="">
				</div>
				<div class="container">
					<div class="divider-10 d-none d-xl-block"></div>
					<div class="row c-mb-25 c-mt-25 c-mb-lg-0 c-mt-lg-0">
						<div class="col-lg-4 text-center">
							<div class="border-icon">
								<div class="teaser-icon">
									<img src="{{ asset('images/icon1.png')}}" alt="">
								</div>
							</div>
							<h6>
								Call Us
							</h6>
							<p>
								<strong>New Accounts:</strong> 1-800-123-4567
								<br>
								<strong>Support:</strong> 1-800-123-4569
							</p>
						</div>
						<div class="col-lg-4 text-center">
							<div class="border-icon">
								<div class="teaser-icon">
									<img src="{{ asset('images/icon3.png')}}" alt="">
								</div>
							</div>
							<h6>
								Write Us
							</h6>
							<p>
								example@example.com
								<br> example@example.com
							</p>
						</div>
						<div class="col-lg-4 text-center">
							<div class="border-icon">
								<div class="teaser-icon">
									<img src="images/icon2.png" alt="">
								</div>
							</div>
							<h6>
								Visit Us
							</h6>
							<p>
								2231 Sycamore Lake Road
								<br> Green Bay, WI 54304
							</p>
						</div>
					</div>
					<div class="divider-30 d-none d-lg-block"></div>
					<div class="text-center img-wrap col-md-12 layout-2">
						<img src="{{ asset('img/dark_line_short.png')}}" alt="">
					</div>
				</div>
				<div class="divider-10"></div>
			</section>


			<footer class="page_footer corner-footer ls ms s-pt-30 s-pb-0 s-pb-lg-10 s-pb-xl-50 c-gutter-60 ">

				<div class="container">
					<div class="container">
						<div class="row">
							<div class="divider-20 d-none d-xl-block"></div>
							<div class="col-md-12 mt-4 text-center animate" data-animation="fadeInUp">
								<img class="margin-negative" src="images/peacefooter.png" alt="">
								<div class="widget widget_social_buttons">
									<a href="http://www.facebook.com/#" class="fa fa-facebook color-icon" title="facebook"></a>
									<a href="http://www.twitter.com/#" class="fa fa-twitter color-icon" title="twitter"></a>
									<a href="http://www.plus.google.com/#" class="fa fa-google color-icon" title="google"></a>
									<a href="http://www.youtube.com/#" class="fa fa-youtube-play color-icon" title="youtube-play"></a>
									<a href="http://www.linkedin.com/#" class="fa fa-linkedin color-icon" title="linkedin"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</footer>


			<section class="page_copyright light-copy ds s-py-20 s-py-lg-5  copyright">
				<div class="container">
					<div class="row align-items-center">
						<div class="divider-20 d-none d-lg-block"></div>
						<div class="col-md-12 text-center">
							<p>&copy; Copyright
								<span class="copyright_year">2021</span> All Rights Reserved</p>
						</div>
						<div class="divider-20 d-none d-lg-block"></div>
					</div>
				</div>
			</section>


		</div>
		<!-- eof #box_wrapper -->
	</div>
	<!-- eof #canvas -->


	<script src="{{ asset('js/compressed.js')}}"></script>
	<script src="{{ asset('js/main.js')}}"></script>


</body>

</html>