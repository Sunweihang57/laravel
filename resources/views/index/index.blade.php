@extends('layout.indexCommon')



@section('slider')

	<!-- slider -->
	<div class="slider">
		
		<ul class="slides">
			<li>
				<img src="{{ asset('index/img/slide1.jpg') }}" alt="">
				<div class="caption slider-content  center-align">
					<h2>WELCOME TO MSTORE</h2>
					<h4>Lorem ipsum dolor sit amet.</h4>
					<a href="" class="btn button-default">SHOP NOW</a>
				</div>
			</li>
			<li>
				<img src="{{ asset('index/img/slide2.jpg') }}" alt="">
				<div class="caption slider-content center-align">
					<h2>JACKETS BUSINESS</h2>
					<h4>Lorem ipsum dolor sit amet.</h4>
					<a href="" class="btn button-default">SHOP NOW</a>
				</div>
			</li>
			<li>
				<img src="{{ asset('index/img/slide3.jpg') }}" alt="">
				<div class="caption slider-content center-align">
					<h2>FASHION SHOP</h2>
					<h4>Lorem ipsum dolor sit amet.</h4>
					<a href="" class="btn button-default">SHOP NOW</a>
				</div>
			</li>
		</ul>
	</div>
	<!-- end slider -->

@endsection

@section('features')

	<!-- features -->
	<div class="features section">
		<div class="container">
			<div class="row">
				<div class="col s6">
					<div class="content">
						<div class="icon">
							<i class="fa fa-car"></i>
						</div>
						<h6>Free Shipping</h6>
						<p>Lorem ipsum dolor sit amet consectetur</p>
					</div>
				</div>
				<div class="col s6">
					<div class="content">
						<div class="icon">
							<i class="fa fa-dollar"></i>
						</div>
						<h6>Money Back</h6>
						<p>Lorem ipsum dolor sit amet consectetur</p>
					</div>
				</div>
			</div>
			<div class="row margin-bottom-0">
				<div class="col s6">
					<div class="content">
						<div class="icon">
							<i class="fa fa-lock"></i>
						</div>
						<h6>Secure Payment</h6>
						<p>Lorem ipsum dolor sit amet consectetur</p>
					</div>
				</div>
				<div class="col s6">
					<div class="content">
						<div class="icon">
							<i class="fa fa-support"></i>
						</div>
						<h6>24/7 Support</h6>
						<p>Lorem ipsum dolor sit amet consectetur</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end features -->

@endsection

@section('quote')

	<!-- quote -->
	<div class="section quote">
		<div class="container">
			<h4>FASHION UP TO 50% OFF</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid ducimus illo hic iure eveniet</p>
		</div>
	</div>
	<!-- end quote -->

@endsection

@section('product1')

	<!-- product -->
	<div class="section product">
		<div class="container">
			<div class="section-head">
				<h4>新品上架</h4>
				<div class="divider-top"></div>
				<div class="divider-bottom"></div>
			</div>

			@foreach ($goods as $v)
				<div class="row">

					@foreach ($v as $vv)
						<div class="col s6">
							<div class="content">
								<a href="{{ url('index/goods/product') }}?id={{ $vv['id'] }}"><img src="{{ asset($vv['goods_pic']) }}" alt=""></a>	
								<h6><a href="{{ url('index/goods/product') }}?id={{ $vv['id'] }}">{{ $vv['goods_name'] }}</a></h6>
								<div class="price">
									${{ $vv['goods_price'] }} <span>$28</span>
								</div>
								<a href="{{ url('index/goods/product') }}?id={{ $vv['id'] }}"><button class="btn button-default">加入购物车</button></a>
							</div>
						</div>
					@endforeach

				</div>
			@endforeach

		</div>
	</div>
	<!-- end product -->

@endsection

@section('promo')

	<!-- promo -->
	<div class="promo section">
		<div class="container">
			<div class="content">
				<h4>PRODUCT BUNDLE</h4>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
				<button class="btn button-default">SHOP NOW</button>
			</div>
		</div>
	</div>
	<!-- end promo -->

@endsection

@section('product2')

	<!-- product -->
	<div class="section product">
		<div class="container">
			<div class="section-head">
				<h4>TOP PRODUCT</h4>
				<div class="divider-top"></div>
				<div class="divider-bottom"></div>
			</div>
			<div class="row">
				<div class="col s6">
					<div class="content">
						<img src="{{ asset('index/img/product-new1.png') }}" alt="">
						<h6><a href="">Fashion Men's</a></h6>
						<div class="price">
							$20 <span>$28</span>
						</div>
						<button class="btn button-default">ADD TO CART</button>
					</div>
				</div>
				<div class="col s6">
					<div class="content">
						<img src="{{ asset('index/img/product-new2.png') }}" alt="">
						<h6><a href="">Fashion Men's</a></h6>
						<div class="price">
							$20 <span>$28</span>
						</div>
						<button class="btn button-default">ADD TO CART</button>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s6">
					<div class="content">
						<img src="{{ asset('index/img/product-new3.png') }}" alt="">
						<h6><a href="">Fashion Men's</a></h6>
						<div class="price">
							$20 <span>$28</span>
						</div>
						<button class="btn button-default">ADD TO CART</button>
					</div>
				</div>
				<div class="col s6">
					<div class="content">
						<img src="{{ asset('index/img/product-new4.png') }}" alt="">
						<h6><a href="">Fashion Men's</a></h6>
						<div class="price">
							$20 <span>$28</span>
						</div>
						<button class="btn button-default">ADD TO CART</button>
					</div>
				</div>
			</div>
			<div class="pagination-product">
				<ul>
					<li class="active">1</li>
					<li><a href="">2</a></li>
					<li><a href="">3</a></li>
					<li><a href="">4</a></li>
					<li><a href="">5</a></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- end product -->

@endsection
