@extends('layout.indexCommon')


@section('content')

	<!-- shop single -->
	<div class="pages section">
		<div class="container">
			<div class="shop-single">
				<img src="{{ asset($info->goods_pic) }}" alt="">
				<h5>{{ $info->goods_name }}</h5>
				<div class="price">${{ $info->goods_price }} <span>$28</span></div>
				<!-- <p>商品描述</p> -->
				<a href="{{ url('index/cart/create') }}?id={{ $info->id }}"><button type="button" class="btn button-default">添加购物车</button></a>
			</div>
			<div class="review">
					<h5>1 评论</h5>
					<div class="review-details">
						<div class="row">
							<div class="col s3">
								<img src="img/user-comment.jpg" alt="" class="responsive-img">
							</div>
							<div class="col s9">
								<div class="review-title">
									<span><strong>“评论人”</strong> | Juni 5, 2016 at 9:24 am | <a href="">回复</a></span>
								</div>
								<p>“描述内容”</p>
							</div>
						</div>
					</div>
				</div>	
				<div class="review-form">
					<div class="review-head">
						<h5>提交评论</h5>
					</div>
					<div class="row">
						<form class="col s12 form-details">
							<div class="input-field">
								<input type="text" required class="validate" placeholder="姓名">
							</div>
							<div class="input-field">
								<input type="email" class="validate" placeholder="邮箱" required>
							</div>
							<div class="input-field">
								<input type="text" class="validate" placeholder="标题&所属分组" required>
							</div>
							<div class="input-field">
								<textarea name="textarea-message" id="textarea1" cols="30" rows="10" class="materialize-textarea" class="validate" placeholder="评论内容"></textarea>
							</div>
							<div class="form-button">
								<div class="btn button-default">确认提交</div>
							</div>
						</form>
					</div>
				</div>
		</div>
	</div>
	<!-- end shop single -->

@endsection