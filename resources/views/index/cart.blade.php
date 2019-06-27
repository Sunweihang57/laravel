@extends('layout.indexCommon')


@section('content')

	<div class="cart section">
		<div class="container">
			<div class="pages-head">
				<h3>购物车</h3>
			</div>
			<div class="content">

				@foreach($info as $v)
				<div class="cart-1">
					<div class="row">
						<div class="col s5">
							<h5>图片</h5>
						</div>
						<div class="col s7">
							<img src="{{ asset($v->goods_pic) }}" alt="">
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>商品名称</h5>
						</div>
						<div class="col s7">
							<h5>{{ $v->goods_name }}</h5>
						</div>
					</div>
					<!-- <div class="row">
						<div class="col s5">
							<h5>Quantity</h5>
						</div>
						<div class="col s7">
							<input value="1" type="text">
						</div>
					</div> -->
					<div class="row">
						<div class="col s5">
							<h5>价格</h5>
						</div>
						<div class="col s7">
							<h5>{{ $v->goods_price }}</h5>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>操作</h5>
						</div>
						<div class="col s7">
							<a href="{{ url('index/cart/del') }}?id={{ $v->id }}"><h5><i class="fa fa-trash"></i></h5></a>
						</div>
					</div>
				</div>
				<div class="divider"></div>
				@endforeach

			</div>
			<div class="total">
				<!-- <div class="row">
					<div class="col s7">
						<h5>Fashion Men's</h5>
					</div>
					<div class="col s5">
						<h5>$21.00</h5>
					</div>
				</div>
				<div class="row">
					<div class="col s7">
						<h5>Fashion Men's</h5>
					</div>
					<div class="col s5">
						<h5>$20.00</h5>
					</div>
				</div> -->
				<div class="row">
					<div class="col s7">
						<h6>总价</h6>
					</div>
					<div class="col s5">
						<h6>{{ $total }}</h6>
					</div>
				</div>
			</div>
			<a href="{{ url('index/order/order') }}?money={{ $total }}"><button class="btn button-default">确认结算</button></a>
		</div>
	</div>
	<!-- end cart -->

@endsection