
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from portotheme.com/html/porto_ecommerce/demo_9/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 May 2021 15:59:21 GMT -->
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Porto E-Commerce</title>

	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="Porto - Bootstrap eCommerce Template">
	<meta name="author" content="SW-THEMES">

	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="{{ asset('user/assets/images/icons/favicon.ico') }}">

	<script type="text/javascript">
		WebFontConfig = {
			google: { families: [ 'Open+Sans:300,400,600,700,800','Poppins:300,400,500,600,700,800' ] }
		};
		(function(d) {
			var wf = d.createElement('script'), s = d.scripts[0];
			wf.src = 'assets/js/webfont.js';
			wf.async = true;
			s.parentNode.insertBefore(wf, s);
		})(document);
	</script>

	<!-- Plugins CSS File -->
	<link rel="stylesheet" href="{{ asset('user/assets/css/bootstrap.min.css') }}">

	<!-- Main CSS File -->
	<link rel="stylesheet" href="{{ asset('user/assets/css/style.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('user/assets/vendor/fontawesome-free/css/all.min.css') }}">


    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
</head>
<body>
	<div class="page-wrapper">
		<div class="top-notice text-white bg-primary">
			<div class="container text-center">
				<h5 class="d-inline-block mb-0">Get Up to <b>40% OFF</b> New-Season Styles </h5>
				<small>* Limited time only.</small>
				<button title="Close (Esc)" type="button" class="mfp-close">×</button>
			</div><!-- End .container -->
		</div><!-- End .top-notice -->

		<header class="header">
			<div class="header-top">
				<div class="container">
					<div class="header-left header-dropdowns">
						<div class="header-dropdown">
							<a href="#" class="pl-0"><img src="{{ asset('user/assets/images/flags/en.png') }}" alt="England flag">ENG</a>
							<div class="header-menu">
								<ul>
									<li><a href="#"><img src="{{ asset('user/assets/images/flags/en.png') }}" alt="England flag">ENG</a></li>
									<li><a href="#"><img src="{{ asset('user/assets/images/flags/fr.png') }}" alt="France flag">FRA</a></li>
								</ul>
							</div><!-- End .header-menu -->
						</div><!-- End .header-dropown -->

						<div class="header-dropdown ml-4">
							<a href="#">USD</a>
							<div class="header-menu">
								<ul>
									<li><a href="#">EUR</a></li>
									<li><a href="#">USD</a></li>
								</ul>
							</div><!-- End .header-menu -->
						</div><!-- End .header-dropown -->
					</div><!-- End .header-left -->

					<div class="header-right">
						<p class="top-message text-uppercase d-none d-sm-block mr-4">Free returns. Standard shipping orders $99+</p>

						<span class="separator"></span>

						<div class="header-dropdown dropdown-expanded mx-2 px-1">
							<a href="#">Links</a>
							<div class="header-menu">
								<ul>
									<li><a href="about.html">About </a></li>
									<li><a href="#">Our Stores</a></li>
									<li><a href="blog.html">Blog</a></li>
									<li><a href="contact.html">Contact</a></li>
									<li><a href="#" class="login-link">Log In</a></li>
								</ul>
							</div><!-- End .header-menu -->
						</div><!-- End .header-dropown -->

						<span class="separator"></span>

						<div class="social-icons">
							<a href="#" class="social-icon social-facebook icon-facebook" target="_blank"></a>
							<a href="#" class="social-icon social-twitter icon-twitter" target="_blank"></a>
							<a href="#" class="social-icon social-instagram icon-instagram" target="_blank"></a>
						</div><!-- End .social-icons -->
					</div><!-- End .header-right -->
				</div><!-- End .container -->
			</div><!-- End .header-top -->

			<div class="header-middle">
				<div class="container">
					<div class="header-left w-lg-max ml-auto ml-lg-0">
						<div class="header-icon header-search header-search-inline header-search-category">
							<a href="#" class="search-toggle" role="button"><i class="icon-search-3"></i></a>
							<form action="#" method="get">
								<div class="header-search-wrapper">
									<input type="search" class="form-control" name="q" id="q" placeholder="Search..." required>
									<div class="select-custom body-text">
										<select id="cat" name="cat">
											<option value="">All Categories</option>
											<option value="4">Fashion</option>

										</select>
									</div><!-- End .select-custom -->
									<button class="btn icon-search-3 p-0" type="submit"></button>
								</div><!-- End .header-search-wrapper -->
							</form>
						</div><!-- End .header-search -->
					</div><!-- End .header-left -->

					<div class="header-center order-first order-lg-0 ml-0 ml-lg-auto">
						<button class="mobile-menu-toggler" type="button">
							<i class="icon-menu"></i>
						</button>
						<a href="{{ url('/') }}" class="logo">
							<img src="{{ asset('user/assets/images/logo.png') }}" alt="Porto Logo">
						</a>
					</div><!-- End .header-center -->

					<div class="header-right w-lg-max ml-0 ml-lg-auto">
						<div class="header-contact d-none d-lg-flex align-items-center ml-auto pr-xl-4 mr-4">
							<i class="icon-phone-2"></i>
							<h6 class="pt-1 line-height-1 pr-2">Call us now<a href="tel:#" class="d-block text-dark pt-1 font1">+123 5678 890</a></h6>
						</div><!-- End .header-contact -->

						<a href="{{ route('user.profile') }}" class="header-icon "><i class="icon-user-2"></i></a>

						<a href="{{ route('user.wishlist') }}" class="header-icon pl-1 pr-2"><i class="icon-wishlist-2"></i></a>

                        <a href="{{ route('cart') }}" class="header-icon pl-1 pr-2"><i class="icon-shopping-cart"></i><span class="cart-count badge-circle">{{ Cart::count() }}</span></a>

					</div><!-- End .header-right -->
				</div><!-- End .container -->
			</div><!-- End .header-middle -->

			<div class="header-bottom sticky-header d-none d-lg-block" data-sticky-options="{
				'move': [
					{
						'item': '.logo',
						'position': 'start',
						'clone': false
					},
					{
						'item': '.header-search',
						'position': 'end',
						'clone': false
					},
					{
						'item': '.header-icon:not(.header-search)',
						'position': 'end',
						'clone': false
					},
					{
						'item': '.cart-dropdown',
						'position': 'end',
						'clone': false
					}
				],
				'moveTo': '.container',
				'changes': [
					{
						'item': '.header-search',
						'removeClass': 'header-search-inline',
						'addClass': 'header-search-popup ml-auto'
					},
					{
						'item': '.main-nav li.custom',
						'removeClass': 'd-xl-block'
					}
				]
			}">
				<div class="container">
					<nav class="main-nav d-flex w-lg-max justify-content-center">
						<ul class="menu">
							<li class="active">
								<a href="index-2.html">Home</a>
							</li>
							<li>
								<a href="category.html">Categories</a>
								<div class="megamenu megamenu-fixed-width megamenu-3cols">
									<div class="row">
										<div class="col-lg-4">
											<a href="#" class="nolink">VARIATION 1</a>
											<ul class="submenu">
												<li><a href="category.html">Fullwidth Banner</a></li>
											</ul>
										</div>
										<div class="col-lg-4">
											<a href="#" class="nolink">VARIATION 2</a>
											<ul class="submenu">
												<li><a href="category-list.html">List Types</a></li>
											</ul>
										</div>
										<div class="col-lg-4 p-0" style="background: #f4f4f4 no-repeat center 82%/cover url('assets/images/menu-banner.jpg')"></div>
									</div>
								</div><!-- End .megamenu -->
							</li>
							<li>
								<a href="product.html">Products</a>
								<div class="megamenu megamenu-fixed-width">
									<div class="row">
										<div class="col-lg-3">
											<a href="#" class="nolink">Variations 1</a>
											<ul class="submenu">
												<li><a href="product.html">Horizontal Thumbs</a></li>
												<li><a href="product-full-width.html">Vertical Thumbnails</a></li>
												<li><a href="product.html">Inner Zoom</a></li>
												<li><a href="product-addcart-sticky.html">Addtocart Sticky</a></li>
												<li><a href="product-sidebar-left.html">Accordion Tabs</a></li>
											</ul>
										</div><!-- End .col-lg-4 -->
										<div class="col-lg-3">
											<a href="#" class="nolink">Variations 2</a>
											<ul class="submenu">
												<li><a href="product-sticky-tab.html">Sticky Tabs</a></li>
												<li><a href="product-simple.html">Simple Product</a></li>
												<li><a href="product-sidebar-left.html">With Left Sidebar</a></li>
											</ul>
										</div><!-- End .col-lg-4 -->
										<div class="col-lg-3">
											<a href="#" class="nolink">Product Layout Types</a>
											<ul class="submenu">
												<li><a href="product.html">Default Layout</a></li>
												<li><a href="product-extended-layout.html">Extended Layout</a></li>
												<li><a href="product-full-width.html">Full Width Layout</a></li>
												<li><a href="product-grid-layout.html">Grid Images Layout</a></li>
												<li><a href="product-sticky-both.html">Sticky Both Side Info</a></li>
												<li><a href="product-sticky-info.html">Sticky Right Side Info</a></li>
											</ul>
										</div><!-- End .col-lg-4 -->

										<div class="col-lg-3 p-0">
											<img src="assets/images/menu-bg.png" alt="Menu banner" class="product-promo">
										</div><!-- End .col-lg-4 -->
									</div><!-- End .row -->
								</div><!-- End .megamenu -->
							</li>
							<li>
								<a href="#">Pages</a>
								<ul>
									<li><a href="cart.html">Shopping Cart</a></li>
									<li><a href="#">Checkout</a>
										<ul>
											<li><a href="checkout-shipping.html">Checkout Shipping</a></li>
											<li><a href="checkout-shipping-2.html">Checkout Shipping 2</a></li>
											<li><a href="checkout-review.html">Checkout Review</a></li>
										</ul>
									</li>
									<li><a href="#">Dashboard</a>
										<ul>
											<li><a href="dashboard.html">Dashboard</a></li>
											<li><a href="my-account.html">My Account</a></li>
										</ul>
									</li>
									<li><a href="about.html">About Us</a></li>
									<li><a href="#">Blog</a>
										<ul>
											<li><a href="blog.html">Blog</a></li>
											<li><a href="single.html">Blog Post</a></li>
										</ul>
									</li>
									<li><a href="contact.html">Contact Us</a></li>
									<li><a href="#" class="login-link">Login</a></li>
									<li><a href="forgot-password.html">Forgot Password</a></li>
								</ul>
							</li>
							<li><a href="blog.html">Blog</a></li>
							<li><a href="about.html">About Us</a></li>
							<li class="d-none d-xl-block custom"><a href="#">Special Offer!</a></li>
							<li class="d-none d-xl-block custom"><a href="https://1.envato.market/DdLk5" target="_blank">Buy Porto!</a></li>
						</ul>
					</nav>
				</div><!-- End .container -->
			</div><!-- End .header-bottom -->
		</header><!-- End .header -->
