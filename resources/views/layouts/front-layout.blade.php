<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>{{config('app.name')}} | Bookshop Responsive Bootstrap4 Template</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<link rel="shortcut icon" href="{{asset('frontned/images/favicon.ico')}}">
	<link rel="apple-touch-icon" href="{{asset('frontned/images/icon.png')}}">

	<!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet"> 

	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{asset('frontend/css/bootstrap_rtl.min.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/plugins.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/style_rtl.css')}}">

	<!-- Cusom css -->
   <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">
   <link rel="stylesheet" href="{{asset('css/all_rtl.min.css')}}">
   <style>
body{
	direction: rtl;
}

</style>

	<!-- Modernizer js -->
	<script src="{{asset('frontend/js/vendor/modernizr-3.5.0.min.js')}}"></script>
	<style>
.logo a img{
	margin-top: -44px;
}

</style>
	@stack('css')
</head>
<body>
	<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">
		<!-- Header -->
		<header id="wn__header" class="oth-page header__area header__absolute sticky__header">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-4 col-sm-4 col-7 col-lg-2">
						<div class="logo">
							<a href="{{route('home')}}">
								<img src="{{$setting->logo_url}}" alt="logo images">
							</a>
						</div>
					</div>
					<div class="col-lg-8 d-none d-lg-block">
						<nav class="mainmenu__nav">
							<ul class="meninmenu d-flex justify-content-start">
								<li class="drop with--one--item"><a href="{{route('home')}}">صفحة رئيسية</a></li>
								@foreach ($categories as $category)
								<li class="drop"><a href="{{route('front.category.show',$category->slug)}}">{{$category->name}}</a></li>
								@endforeach
								<li class="drop"><a href="#">Pages</a>
									<div class="megamenu dropdown">
										<ul class="item item01">
											<li><a href="{{route('front.aboutus')}}"> عنا</a></li>
											<li><a href="{{route('front.faqs')}}"> اسئلة شائعة</a></li>
										</ul>
									</div>
								</li>
								<li><a href="{{route('front.contactus')}}">طلب تواصل</a></li>
							</ul>
						</nav>
					</div>
					<div class="col-md-8 col-sm-8 col-5 col-lg-2">
						<ul class="header__sidebar__right d-flex justify-content-end align-items-center">
							<li class="shop_search"><a class="search__active" href="#"></a></li>
							<li class="wishlist"><a href="#"></a></li>
							
							<li class="setting__bar__icon"><a class="setting__active" href="#"></a>
								<div class="searchbar__content setting__block">
									<div class="content-inner">
									
										<div class="switcher-currency">
											<strong class="label switcher-label">
												<span>حسابي </span>
											</strong>
											<div class="switcher-options">
												<div class="switcher-currency-trigger">
													<div class="setting__menu">
														@if(empty($user))
														<span><a href="{{route('login')}}">تسجيل دخول</a></span>
														<span><a href="{{route('register')}}"> حساب جديد </a></span>
													@else
													<span><a href="{{route('admin.dashboard')}}">لوحة التحكم</a></span>
													<span>
														<form action="{{route('logout')}}" method="post">
															@csrf
															<button style="    border: none;
    background: none;
    text-align: left;
    display: block;
    color: #7d7b79;
    margin-left: -6px;">تسجيل الخروج</button>
														</form>
													</span>
												@endif	
												</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<!-- Start Mobile Menu -->
				<div class="row d-none">
					<div class="col-lg-12 d-none">
						<nav class="mobilemenu__nav">
							<ul class="meninmenu">
								<li><a href="{{route('home')}}">صفحة رئيسية</a></li>
								<li><a href="#">Pages</a>
									<ul>
										<li><a href="{{route('front.aboutus')}}"> عنا </a></li>
										</li>
										<li><a href="{{route('front.faqs')}}">اسئلة شائعة </a></li>
									</ul>
								</li>
								<li><a href="{{route('front.contactus')}}">طلب تواصل</a></li>
							</ul>
						</nav>
					</div>
				</div>
				<!-- End Mobile Menu -->
	            <div class="mobile-menu d-block d-lg-none">
	            </div>
	            <!-- Mobile Menu -->	
			</div>		
		</header>
		<!-- //Header -->
		<!-- Start Search Popup -->
		<div class="box-search-content search_active block-bg close__top">
			<form id="search_mini_form" class="minisearch" action="#">
				<div class="field__search">
					<input type="text" placeholder="Search entire store here...">
					<div class="action">
						<a href="#"><i class="zmdi zmdi-search"></i></a>
					</div>
				</div>
			</form>
			<div class="close__wrap">
				<span>close</span>
			</div>
		</div>
		<!-- End Search Popup -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">المدونة</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="{{route('home')}}">المدونة</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">مقالات</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
  {{$slot}}

		<!-- Footer Area -->
		<footer id="wn__footer" class="footer__area bg__cat--8 brown--color">
			<div class="footer-static-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="footer__widget footer__menu">
								<div class="ft__logo">
									<a href="{{route('home')}}">
										<img src="{{$setting->logo_url}}" alt="logo">
									</a>
									<p>{{$setting->description}}</p>
								</div>
								<div class="footer__content">
									<ul class="social__net social__net--2 d-flex justify-content-center">
										<li><a href="{{$setting->facebook}}" target="_blank"><i class="bi bi-facebook"></i></a></li>
										<li><a href="{{$setting->gmail}}" target="_blank"><i class="bi bi-google"></i></a></li>
										<li><a href="{{$setting->twiter}}" target="_blank"><i class="bi bi-twitter"></i></a></li>
										<li><a href="{{$setting->linked_in}}" target="_blank"><i class="bi bi-linkedin"></i></a></li>
										<li><a href="{{$setting->youtube}}" target="_blank"><i class="bi bi-youtube"></i></a></li>
									</ul>
									<ul class="mainmenu d-flex justify-content-center">
										<li><a href="{{route('home')}}" target="_blank">Trending</a></li>
										<li><a href="{{route('home')}}" target="_blank">Best Seller</a></li>
										<li><a href="{{route('home')}}" target="_blank">Wishlist</a></li>
										<li><a href="{{route('home')}}" target="_blank">Blog</a></li>
										<li><a href="{{route('home')}}" target="_blank">Contact</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="copyright__wrapper">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="copyright">
								<div class="copy__right__inner text-left">
									<p>Copyright <i class="fa fa-copyright"></i> <a href="www.wajeehayube.com">Wajeeh Ayube</a> All Rights Reserved</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="payment text-right">
								<img src="{{asset('frontend/images/icons/payment.png')}}" alt="" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- //Footer Area -->

	</div>
	<!-- //Main wrapper -->
	<!-- JS Files -->
	<script src="{{asset('frontend/js/vendor/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('frontend/js/popper.min.js')}}"></script>
	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('frontend/js/plugins.js')}}"></script>
	<script src="{{asset('frontend/js/active.js')}}"></script>
	@stack('scripts')

@include('sweetalert::alert')
</body>
</html>