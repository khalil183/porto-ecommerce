@extends('user.layouts.layout')
@section('user-content')
<main class="main">
    <section class="home-slider owl-carousel owl-theme owl-carousel-lazy text-uppercase nav-big bg-gray" data-owl-options="{
       'loop': false
       }">
       <div class="home-slide home-slide1 banner">
          <img class="owl-lazy slide-bg" src="assets/images/lazy.png" data-src="{{ asset('user/assets/images/slider/slide-1.jpg') }}" alt="slider image" width="1120" height="500"></img>
          <div class="container">
             <div class="banner-layer banner-layer-middle banner-layer-right">
                <h4 class="text-capitalize m-b-3">Totally Wireless High-Performance</h4>
                <h2 class="m-b-2">Select headphones</h2>
                <h3 class="m-b-2">30% Off</h3>
                <h5 class="d-inline-block pt-2 mb-1 pb-1 ls-n-20 align-middle">Starting AT
                   <b class="coupon-sale-text bg-secondary text-white d-inline-block align-sub">$<em class="align-middle">199</em>99</b>
                </h5>
                <a href="category.html" class="btn btn-dark">Shop Now!</a>
             </div>
             <!-- End .banner-layer -->
          </div>
          <!-- End .container -->
       </div>
       <!-- End .home-slide -->
       <div class="home-slide home-slide2 banner">
          <img class="owl-lazy slide-bg" src="assets/images/lazy.png" data-src="{{ asset('user/assets/images/slider/slide-2.jpg') }}" alt="slider image" width="1120" height="500"></img>
          <div class="container">
             <div class="banner-layer banner-layer-middle banner-layer-left">
                <h4 class="mb-0">Extra</h4>
                <h3 class="m-b-2">20% off</h3>
                <h3 class="m-b-3 heading-border">Accessories</h3>
                <h2 class="m-b-4">Drones on sale</h2>
                <a href="category.html" class="btn btn-block btn-dark">Shop All Sale</a>
             </div>
          </div>
          <!-- End .container -->
       </div>
       <!-- End .home-slide -->
    </section>
    <!-- End .home-slider -->
    <div class="info-boxes-container bg-gray">
       <div class="container py-3">
          <div class="info-boxes-slider owl-carousel owl-theme py-3" data-owl-options="{
             'dots': false,
             'margin': 20,
             'loop': false,
             'responsive': {
             '576': {
             'items': 2
             },
             '992': {
             'items': 3
             }
             }
             }">
             <div class="info-box info-box-icon-left">
                <i class="icon-shipping"></i>
                <div class="info-box-content">
                   <h4 class="pb-1">FREE SHIPPING & RETURN</h4>
                   <p>Free shipping on all orders over $99</p>
                </div>
                <!-- End .info-box-content -->
             </div>
             <!-- End .info-box -->
             <div class="info-box info-box-icon-left">
                <i class="icon-money"></i>
                <div class="info-box-content">
                   <h4 class="pb-1">MONEY BACK GUARANTEE</h4>
                   <p>100% money back guarantee</p>
                </div>
                <!-- End .info-box-content -->
             </div>
             <!-- End .info-box -->
             <div class="info-box info-box-icon-left">
                <i class="icon-support"></i>
                <div class="info-box-content">
                   <h4 class="pb-1">ONLINE SUPPORT 24/7</h4>
                   <p>Lorem ipsum dolor sit amet.</p>
                </div>
                <!-- End .info-box-content -->
             </div>
             <!-- End .info-box -->
          </div>
          <!-- End .info-boxes-slider -->
       </div>
       <!-- End .container -->
    </div>
    <!-- End .info-boxes-container -->
    <div class="container">
       <div class="product-widgets row pt-1 m-b-2 mb-6">
           @foreach ($categories as $category)
                <div class="col-md-4 col-sm-6 pb-5">
                    <h4 class="section-sub-title text-uppercase m-b-3">{{ $category->name }}</h4>
                    @foreach ($category->products->take(3) as $product)
                    <div class="product-default left-details product-widget mb-2">
                        <figure>
                        <a href="{{ route('product.details',$product->slug) }}">
                        <img src="{{ asset($product->image) }}" width="168" height="168">
                        </a>
                        </figure>
                        <div class="product-details">
                        <div class="category-list">
                            <a href="javascript:;" class="product-category">{{ $category->name }}</a>
                        </div>
                        <h2 class="product-title">
                            <a href="{{ route('product.details',$product->slug) }}">{{ $product->name }}</a>

                        </h2>
                        <div class="ratings-container">
                            <div class="product-ratings">
                                @if ($product->reviews->count()>0)
                                <span class="ratings" style="width:{{ ($product->reviews->sum('rating')/$product->reviews->count())*20 }}%"></span><!-- End .ratings -->
                                @else
                                    <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                @endif
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <!-- End .product-ratings -->
                        </div>
                        <!-- End .product-container -->
                        <div class="price-box">
                            {{-- <del class="old-price">$59.00</del> --}}
                            <span class="product-price">{{ $product->price }}Tk</span>
                        </div>
                        <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                    @endforeach

                </div>
          @endforeach
       </div>
       <!-- End .product-widgets -->
    </div>
    <!-- End .container -->
 </main>
 <!-- End .main -->
@endsection
