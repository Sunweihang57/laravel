@extends('layout.indexCommon')


@section('content')

	<!-- register -->
	<div class="pages section">
		<div class="container">
			<div class="pages-head">
				<h3>用户注册</h3>
			</div>
			<div class="register">
				<div class="row">
					<form class="col s12" action="{{ url('index/login/save') }}" method="post">@csrf
						<div class="input-field">
							<input type="text" class="validate" placeholder="请输入用户名" required name="name">
						</div>
						<!-- <div class="input-field">
							<input type="email" placeholder="请输入邮箱" class="validate" required>
						</div> -->
						<div class="input-field">
							<input type="password" placeholder="请输入密码" class="validate" required name="password">
						</div>
						<!-- <div class="input-field">
							<input type="password" placeholder="请输入确认密码" class="validate" required name="repassword">
						</div> -->
						<div> <button class="btn button-default" type="submit">确认注册</button> </div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end register -->

@endsection