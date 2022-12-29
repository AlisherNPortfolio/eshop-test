@extends('layouts.main')
@php
    $sliders = [
        [
            'title' => "<span>E</span>-SHOPPER",
            'short_desc' => "Free E-Commerce Template",
            'description' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
            'url' => "/lorem-ipsum",
            "img1" => "resources/images/home/girl1.jpg",
            "img2" => "resources/images/home/pricing.png"
],
[
            'title' => "<span>E</span>-SHOPPER",
            'short_desc' => "100% Responsive Design",
            'description' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
            'url' => "/lorem-ipsum2",
            "img1" => "resources/images/home/girl2.jpg",
            "img2" => "resources/images/home/pricing.png"
],
[
            'title' => "<span>E</span>-SHOPPER",
            'short_desc' => "Free Ecommerce Template",
            'description' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
            'url' => "/lorem-ipsum3",
            "img1" => "resources/images/home/girl3.jpg",
            "img2" => "resources/images/home/pricing.png"
        ]
    ];
@endphp
@section('title', 'Home page')
@section('content')
	<x-home-slider :sliders="$sliders"></x-home-slider>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<x-categories :menu="$categoryMenu"></x-categories>

						<x-brands :data="$brands"></x-brands>

						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->

						<div class="shipping text-center"><!--shipping-->
							<img src="{{ asset('resources/images/home/shipping.jpg') }}" alt="" />
						</div><!--/shipping-->

					</div>
				</div>

				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						@foreach ($featuredProducts as $product)
                        <div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{ $product['photos'][0]['url'] }}" alt="" />
											<h2>${{ $product['price'] }}</h2>
											<p>{{ $product['translations'][0]['name'] }}</p>
											<a href="#" class="btn btn-default add-to-cart">
                                                <i class="fa fa-shopping-cart"></i>Add to cart
                                            </a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>${{ $product['price'] }}</h2>
												<p>{{ $product['translations'][0]['name'] }}</p>
												<a href="#" class="btn btn-default add-to-cart">
                                                    <i class="fa fa-shopping-cart"></i>Add to cart
                                                </a>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
                        @endforeach

					</div><!--features_items-->

					<x-recommended-categories :data="$recommendedCategories"></x-recommended-categories>

					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>

						<x-recommended-products :data="$recommendedProducts"></x-recommended-products>
					</div><!--/recommended_items-->

				</div>
			</div>
		</div>
	</section>
@endsection
