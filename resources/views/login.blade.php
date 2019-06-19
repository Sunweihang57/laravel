<!DOCTYPE html>
<html>
<head>
	<title>用户登录</title>
</head>
<body>
	<form action="{{url('/login_do')}}" method="post">
		@csrf
		<table border="1" width="400" align="center">
			<caption><h3>登录页面</h3></caption>
			<tr>
				<td>用户名</td>
				<td>
					<input type="text" name="name">
				</td>
			</tr>
			<tr>
				<td>登录密码</td>
				<td>
					<input type="password" name="password">
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" value="登录">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>