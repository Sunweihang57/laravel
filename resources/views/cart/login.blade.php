<h3>登录</h3>
<form action="{{ url('loginDo') }}" method="post">
	@csrf
	账号：<input type="text" name="c_user"><br>
	密码： <input type="password" name="c_pwd"><br>
	<input type="submit" value="登录">
</form>