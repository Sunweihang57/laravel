@extends('layout.indexCommon')


@section('content')

<!-- checkout -->
<div class="checkout pages section">
	<div class="container">
		<div class="pages-head">
			<h3>订单详情</h3>
		</div>
		<div class="checkout-content">
			<div class="row">
				<div class="col s12">
					<ul class="collapsible" data-collapsible="accordion">
						
						<li>
							<div class="collapsible-header active"><h5>1 - 订单号：{{ $oid }}</h5></div>
						</li>
						<li>
							<div class="collapsible-header"><h5>2 - 收货人信息</h5></div>
							<div class="collapsible-body">
								<div class="billing-information">
									<form action="" method="post">
										<div class="input-field">
											<h5>姓名*</h5>
											<input type="text" class="validate" name="r_name" required>
										</div>
										<div class="input-field">
											<h5>邮箱*</h5>
											<input type="email" class="validate" name="r_email" required>
										</div>
										<div class="input-field">
											<h5>手机号*</h5>
											<input type="number" class="validate" name="r_phone" required>
										</div>
										<div class="input-field">
											<h5>详细地址*</h5>
											<input type="text" class="validate" required>
										</div>
										<div class="input-field">
											<h5>城市*</h5>
											<input type="text" class="validate" required>
										</div>
										<div class="input-field">
											<h5>省份*</h5>
											<input type="text" class="validate" required>
										</div>
										<div class="input-field">
											<h5>邮编*</h5>
											<input type="number" class="validate" required>
										</div>
										<input type="submit" value="提交收货信息" class="btn button-default">
									</form>
								</div>
							</div>
						</li>
						
						
						<li>
							<div class="collapsible-header"><h5>3 - 支付方式</h5></div>
							<div class="collapsible-body">
								<div class="payment-mode">
									<div class="input-field">
										<input type="radio" class="with-gap" id="bank-transfer" name="payType" value="bank">
										<label for="bank-transfer"><span>银行卡</span></label>
									</div>
									<div class="input-field">
										<input type="radio" class="with-gap" id="cash-on-delivery" name="payType" value="wechat">
										<label for="cash-on-delivery"><span>微信</span></label>
									</div>
									<div class="input-field">
										<input type="radio" class="with-gap" id="online-payments" name="ali">
										<label for="online-payments"><span>支付宝</span></label>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="collapsible-header"><h5>4 - 订单详情</h5></div>
							<div class="collapsible-body">
								<div class="order-review">
									<div class="row">
										<div class="col s12">
											@foreach ($detail as $v)
											<div class="cart-details">
												<div class="col s5">
													<div class="cart-product">
														<h5>图片</h5>
													</div>
												</div>
												<div class="col s7">
													<div class="cart-product">
														<img src="{{ asset($v->goods_pic) }}" alt="">
													</div>
												</div>
											</div>
											<div class="divider"></div>
											<div class="cart-details">
												<div class="col s5">
													<div class="cart-product">
														<h5>名称</h5>
													</div>
												</div>
												<div class="col s7">
													<div class="cart-product">
														<a href="">{{ $v->goods_name }}</a>
													</div>
												</div>
											</div>
											<div class="divider"></div>
											<!-- <div class="cart-details">
												<div class="col s5">
													<div class="cart-product">
														<h5>Quantity</h5>
													</div>
												</div>
												<div class="col s7">
													<div class="cart-product">
														<input type="text" value="1">
													</div>
												</div>
											</div>											
											<div class="divider"></div> -->
											<div class="cart-details">
												<div class="col s5">
													<div class="cart-product">
														<h5>价格</h5>
													</div>
												</div>
												<div class="col s7">
													<div class="cart-product">
														<span>${{ $v->goods_price }}</span>
													</div>
												</div>
											</div>
											@endforeach
											<!-- <div class="cart-details">
												<div class="col s5">
													<div class="cart-product">
														<h5>小计</h5>
													</div>
												</div>
												<div class="col s7">
													<div class="cart-product">
														<span>$26.00</span>
													</div>
												</div>
											</div> -->
										</div>
									</div>
								</div>
								<div class="order-review final-price">
									<div class="row">
										<div class="col s12">
											<!-- <div class="cart-details">
												<div class="col s8">
													<div class="cart-product">
														<h5>合计</h5>
													</div>
												</div>
												<div class="col s4">
													<div class="cart-product">
														<span>$26.00</span>
													</div>
												</div>
											</div>
											<div class="cart-details">
												<div class="col s8">
													<div class="cart-product">
														<h5>邮费</h5>
													</div>
												</div>
												<div class="col s4">
													<div class="cart-product">
														<span>$5.00</span>
													</div>
												</div>
											</div> -->
											<div class="cart-details">
												<div class="col s8">
													<div class="cart-product">
														<h5>总价</h5>
													</div>
												</div>
												<div class="col s4">
													<div class="cart-product">
														<span>${{ $money }}</span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<form action="{{ url('index/order/pay') }}" method="post">
										@csrf
										<input type="hidden" name="oid" value="{{ $oid }}">
									<button type="submit" class="btn button-default button-fullwidth">确认支付</button> 
									</form>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end checkout -->

@endsection