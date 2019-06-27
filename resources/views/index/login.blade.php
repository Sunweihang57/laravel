@extends('layout.indexCommon')


@section('content')

<!-- login -->
	<div class="pages section">
		<div class="container">
			<div class="pages-head">
				<h3>登录</h3>
			</div>
			<div class="login">
				<div class="row">
					<form class="col s12" action="{{ url('index/login/login_do') }}" method="post">@csrf
						<div class="input-field">
							<input type="text" class="validate" placeholder="请输入账号" required name="name">
						</div>
						<div class="input-field">
							<input type="password" class="validate" placeholder="请输入密码" required name="password">
						</div>
						<a href=""><h6>忘记密码 ?</h6></a>
						<input type="submit" value="确认登录" class="btn button-default">
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end login -->

@endsection