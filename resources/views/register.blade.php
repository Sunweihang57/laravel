<!DOCTYPE html>
<html>
<head>
	<title>用户注册</title>
</head>
<body>
	<form action="{{url('register_do')}}" method="post">
		@csrf
		<p>
			用户名： <input type="text" name="name">
		</p>
		<p>
			密码：  <input type="password" name="password">
		</p>
		<p>
			确认密码： <input type="password" name="confirm_password">
		</p>
		<p>
			<input type="submit" value="注册">
		</p>
	</form>
</body>
</html>